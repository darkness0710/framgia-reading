<?php

namespace App\Http\Controllers\Web;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Repositories\Contracts\PlanRepositoryInterface as PlanRepository;
use App\Repositories\Contracts\ReviewRepositoryInterface as ReviewRepository;
use App\Repositories\Contracts\UserRepositoryInterface as UserRepository;
use App\Repositories\Contracts\SubjectRepositoryInterface as SubjectRepository;
use App\Repositories\Contracts\PlanItemRepositoryInterface as PlanItemRepository;
use App\Repositories\Contracts\BookRepositoryInterface as BookRepository;
use App\Models\Plan;
use App\Models\Book;

class PlanController extends Controller
{
    private $planRepository;

    public function __construct(
        PlanRepository $planRepository,
        ReviewRepository $reviewRepository,
        UserRepository $userRepository,
        SubjectRepository $subjectRepository,
        PlanItemRepository $planItemRepository,
        BookRepository $bookRepository
    ) {
        $this->planRepository = $planRepository;
        $this->reviewRepository = $reviewRepository;
        $this->userRepository = $userRepository;
        $this->subjectRepository = $subjectRepository;
        $this->planItemRepository = $planItemRepository;
        $this->bookRepository = $bookRepository;
    }

    public function index(Request $request)
    {   
        $sorts = ['Name', 'Rate'];
        $subjects = $this->subjectRepository->getName(['id', 'title']);
        $plans = $this->planRepository
            ->getAllPlan(['user'] ,['*'], 9);

        if($request->ajax()) {
           $html = view('plans._resultPlan')->with('plans', $plans)->render();

           return Response(['html' => $html]);
        }

        return view('plans.index', compact('plans', 'sorts', 'subjects'));
    }

    public function show($id)
    {
        $plan = $this->planRepository
            ->getPlanById($id, ['planItems', 'planItems.book'], ['*']);
        $reviewPlans = $this->reviewRepository
            ->getReviews($id, ['comments.review.user', 'user'], ['*']);
        $user = $this->userRepository
            ->getUserByPlan($plan->user->id, [''], ['name'], ['plans', 'reviews']);
        $totalReviews = $reviewPlans->count();

        return view('plans.show', compact('plan', 'reviewPlans', 'user', 'totalReviews'));
    }

    public function searchData(Request $request)
    {
        $input = $request->all();
        
        if($input['title'] == null) {
            $input['title'] = "";
        }

        if($input['subject'] == null) {
            $input['subject'] = "";
        }

        $plans = $this->planRepository->searchData(['*'], ['user', 'subject'], $input, 9);
        $plans->appends($input);

        $html = view('plans._resultPlan')->with('plans', $plans)->render();

        return Response(['html' => $html]);
    }

    public function create()
    {
        $subjects = $this->subjectRepository->all();
        return view('plans.create')->with([
            'subjects' => $subjects,
        ]);
    }

    public function store(Request $request)
    {
        $user = $this->userRepository->user();
        $data = [];
        $data = array_add($data, 'title', $request->title);
        $data = array_add($data, 'subject_id', $request->subject);
        $data = array_add($data, 'description', $request->description);
        $data = array_add($data, 'summary', $request->summary);
        $data = array_add($data, 'user_id', $user->id);
        $data = array_add($data, 'rate', 0);

        $planItemsData = $request->except([
            '_token',
            'title',
            'subject',
            'description',
            'summary',
        ]);
        $itemNum = count($planItemsData) / 3;
        $plan = $this->planRepository->create($data);
        $planItems = [];

        for ($index=0; $index < $itemNum; $index++) {
            if ($planItemsData['note_' . ($index + 1)] != null) {
                $book = $this->bookRepository
                    ->getByTitle($planItemsData['bname_' . ($index + 1)])->first();

                $planItem = $this->planItemRepository->create([
                    'note' => $planItemsData['note_' . ($index + 1)],
                    'plan_id' => $plan->id,
                    'book_id' => $book->id,
                    'duration' => $planItemsData['duration_' . ($index + 1)],
                    'summary' => '',
                ]);
                array_push($planItems, $planItem);
            }
        }

        return redirect()->route('plan.show', ['id' => $plan->id]);
    }

    public function indexDashboard(Request $request)
    {
        $user = $this->userRepository->user();
        $plans = $this->planRepository->paginate(10);

        return view('admins.plans.index', compact('user', 'plans'));
    }
}
