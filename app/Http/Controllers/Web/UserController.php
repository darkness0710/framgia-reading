<?php

namespace App\Http\Controllers\Web;

use Illuminate\Http\Request;
use App\Repositories\Eloquent\UserRepository;
use App\Http\Controllers\Controller;
use Auth;
use Redirect;
use App\Models\UserPlan;
use Hash;

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

    public function showPlans($id)
    {
        $user = $this->userRepository->user();
        $plans = $this->userRepository
            ->userPlansDone(config('custom.plan.pagination'));
        $followers = $this->userRepository->getFollowers($id)->count();

        return view('users.details.plans')->with([
            'user' => $user,
            'plans' => $plans,
            'followers' => $followers,
        ]);
    }
}
