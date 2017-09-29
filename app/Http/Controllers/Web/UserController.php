<?php

namespace App\Http\Controllers\Web;

use Illuminate\Http\Request;
use App\Repositories\Eloquent\UserRepository;
use App\Http\Controllers\Controller;
use Auth;
use Redirect;
use App\Models\UserPlan;
use Hash;
use View;
use Lava;

class UserController extends Controller
{
    private $userRepository;

    public function __construct(UserRepository $userRepository)
    {
        $this->userRepository = $userRepository;
    }

    public function dashboard()
    {
        $user = $this->userRepository->user();
        $readBooks = $user->userPlanItems()->where('status', 'done')->get();

        return view('users.details.components.dashboard')->with([
            'user' => $user,
            'books' => $readBooks,
            'id' => $user->id,
        ]);
    }

    public function editProfile()
    {
        $user = $this->userRepository->user();

        return view('users.details.components.edit_profile')->with([
            'user' => $user,
            'id' => $user->id,
        ]);
    }

    public function updateProfile()
    {
        try {
            $input = array_except(request()->all(), 'avatar');
            if (request()->hasFile('avatar')) {
                $this->userRepository->updateAvatar(request()->avatar);
            }

            $this->userRepository->updateProfile($input);

            return response()->json([
                'update' => 'success',
            ], 200);
        } catch (Exception $e) {
            return response()->json([
                'update' => 'fail',
            ], 400);
        }
    }

    public function editPassword()
    {
        $user = $this->userRepository->user();

        return view('users.details.components.update_password')->with([
            'user' => $user,
            'id' => $user->id,
        ]);
    }

    public function updatePassword()
    {
        $user = $this->userRepository->user();
        $data = array_except(request()->all(), '_token');

        if (!Hash::check($data['current_password'], $user->password)) {
            return Redirect::back()->with([
                'status' => 'fail',
                'message' => 'Passowrd did not match!',
            ]);
        }

        if ($data['new_password'] != $data['confirm_password']) {
            return Redirect::back()->with([
                'status' => 'fail',
                'message' => 'Passowrd did not match!',
            ]);
        }

        $this->userRepository->updatePassword($data['new_password']);
        return Redirect::back()->with([
            'status' => 'success',
            'message' => 'Password Changed Successfully!',
        ]);
    }

    public function showPlans(Request $request, $id)
    {
        $user = $this->userRepository->find($id);
        $plans = $this->userRepository
            ->userPlansDone($user, config('custom.plan.pagination'), true);
        $followers = $this->userRepository->getFollowers($id);

        if ($request->ajax()) {
            return response()->json([
                'pagination' => [
                    'total'        => $plans->total(),
                    'per_page'     => $plans->perPage(),
                    'current_page' => $plans->currentPage(),
                    'last_page'    => $plans->lastPage(),
                    'from'         => $plans->firstItem(),
                    'to'           => $plans->lastItem()
                ],
                'data' => $plans,
            ]);
        }

        $subjectTendency = $this->makePieChart($plans);

        return view('users.details.plans')->with([
            'user' => $user,
            'plans' => $plans,
            'followers' => $followers,
            'id' => $id,
            'subjectTendency' => $subjectTendency,
        ]);
    }

    public function profile($id)
    {
        $user = $this->userRepository->find($id);
        $plans = $this->userRepository->userPlansDone($user)->get();
        $user = $user->first();
        $followers = $user->followers()->get();
        $following = $user->following()->get();
        $subjectTendency = $this->makePieChart($plans);

        return view('users.details.profile')->with([
            'user' => $user,
            'plans' => $plans,
            'followers' => $followers,
            'following' => $following,
            'id' => $id,
            'subjectTendency' => $subjectTendency,
        ]);
    }

    private function makePieChart($plans = [])
    {
        $subjects = [];
        foreach ($plans as $plan) {
            $subject = $plan->plan->subject;
            if ($subject != null) {
                if (array_has($subjects, $subject->title)) {
                    $subjects[$subject->title] = $subjects[$subject->title] + 1;
                } else {
                    $subjects[$subject->title] = 0;
                }
            }
        }

        $dataTable = Lava::DataTable();
        $dataTable->addStringColumn('title');
        $dataTable->addNumberColumn('number');

        foreach ($subjects as $key => $subject) {
            $dataTable->addRow([$key, $subject]);
        }

         return Lava::PieChart('Subject Tendency', $dataTable);
    }
}
