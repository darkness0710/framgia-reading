<?php

namespace App\Http\Controllers\Web;

use App\Repositories\Contracts\PlanRepositoryInterface as PlanRepository;
use App\Repositories\Contracts\UserRepositoryInterface as UserRepository;
use App\Repositories\Contracts\SubjectRepositoryInterface as SubjectRepository;
use App\Repositories\Contracts\PlanItemRepositoryInterface as PlanItemRepository;
use App\Repositories\Contracts\UserPlanItemRepositoryInterface as UserPlanItemRepository;
use App\Repositories\Contracts\UserPlanRepositoryInterface as UserPlanRepository;
use App\Repositories\Contracts\BookRepositoryInterface as BookRepository;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Carbon;
use App\Models\UserPlan;

class UserPlanController extends Controller
{
    private $planRepository;
    private $userRepository;
    private $subjectRepository;
    private $planItemRepository;
    private $bookRepository;
    private $userPlanItemRepository;
    private $userPlanRepository;

    public function __construct(
        PlanRepository $planRepository,
        UserRepository $userRepository,
        SubjectRepository $subjectRepository,
        PlanItemRepository $planItemRepository,
        BookRepository $bookRepository,
        UserPlanItemRepository $userPlanItemRepository,
        UserPlanRepository $userPlanRepository
    ) {
        $this->planRepository = $planRepository;
        $this->userRepository = $userRepository;
        $this->subjectRepository = $subjectRepository;
        $this->planItemRepository = $planItemRepository;
        $this->bookRepository = $bookRepository;
        $this->userPlanItemRepository = $userPlanItemRepository;
        $this->userPlanRepository = $userPlanRepository;
    }

    public function showForkForm($id)
    {
        $plan = $this->planRepository->find($id);
        $planItems = $this->planItemRepository
            ->getByPlanId($id)->with(['book'])->get();

        return view('userPlans.fork')->with([
            'plan' => $plan,
            'items' => $planItems,
            'forked' => count(UserPlan::where('plan_id', $id)->get()),
        ]);
    }

    public function fork(Request $request, $id)
    {
        $user = $this->userRepository->user();
        $forked = $this->userPlanRepository->checkForked($user->id, $id)->first();

        if ($forked == null) {
            $plan = $this->planRepository->find($id);
            $planItems = $this->planItemRepository->getByPlanId($id)->get();
            $forkedPlan = $this->userPlanRepository->create([
                'assign_id' => $this->userRepository->user()->id,
                'plan_id' => $id,
                'status' => 'new',
                'start_date' => Carbon\Carbon::parse($request['plan_start_date'])->format('Y-m-d H:i:s'),
                'due_date' => Carbon\Carbon::parse($request['plan_due_date'])->format('Y-m-d H:i:s'),
            ]);

            foreach ($planItems as $key => $planItem) {
                $item = [];
                $start_date = Carbon\Carbon::parse($request['start_date_' . $key])->format('Y-m-d H:i:s');
                $due_date = Carbon\Carbon::parse($request['due_date_' . $key])->format('Y-m-d H:i:s');
                $item = array_add($item, 'user_plan_id', $forkedPlan->id);
                $item = array_add($item, 'book_id', $planItem->book_id);
                $item = array_add($item, 'status', $request['status_' . $key]);
                $item = array_add($item, 'start_date', $start_date);
                $item = array_add($item, 'due_date', $due_date);
                $item = array_add($item, 'note', $request['note_' . $key] != null ?: '');
                $item = array_add($item, 'duration', $planItem->duration);
                $this->userPlanItemRepository->create($item);
            }

        } else {
            $forkedPlan = $forked;
        }


        return redirect()->route('forked-plan', [
            'id' => $user->id,
            'plan_id' => $forkedPlan->id,
        ]);
    }

    public function show($user_id, $userPlan_id)
    {
        $forkedPlan = $this->userPlanRepository->findPlanForked($user_id, $userPlan_id);

        if(empty($forkedPlan)) {
            return redirect()->route('error');
        }

        $originalPlan = $forkedPlan->plan;
        $items = $this->userPlanItemRepository->findAllBy('user_plan_id', $forkedPlan->id);

        return view('userPlans.show')->with([
            'forkedPlan' => $forkedPlan,
            'originalPlan' => $originalPlan,
            'items' => $items,
        ]);
    }
}
