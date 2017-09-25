<?php

namespace App\Http\Controllers\Web;

use Illuminate\Http\Request;
use App\Repositories\Eloquent\UserRepository;
use App\Http\Controllers\Controller;
use Auth;
use Redirect;
use Hash;

class UserController extends Controller
{
    private $userRepository;

    public function __construct(UserRepository $userRepository)
    {
        $this->userRepository = $userRepository;
    }

    public function dashboard($id)
    {
        $user = $this->userRepository->user();
        $readBooks = $user->userPlanItems()->where('status', 'done')->get();
        
        return view('users.details.components.dashboard')->with([
            'user' => $user,
            'books' => $readBooks,
        ]);
    }

    public function editProfile($id)
    {
        $user = $this->userRepository->user();
        $readBooks = $user->userPlanItems()->where('status', 'done')->get();

        return view('users.details.components.edit_profile')->with([
            'user' => $user,
            'books' => $readBooks,
        ]);
    }

    public function updateProfile($id)
    {
        try {
            $input = array_except(request()->all(), 'avatar');
            if (request()->hasFile('avatar')) {
                $this->userRepository->updateAvatar($id, request()->avatar);
            }

            $this->userRepository->updateProfile($id, $input);

            return response()->json([
                'update' => 'success',
            ], 200);
        } catch (Exception $e) {
            return response()->json([
                'update' => 'fail',
            ], 400);
        }
    }

    public function editPassword($id)
    {
        $user = $this->userRepository->find($id);
        $readBooks = $user->userPlanItems()->where('status', 'done')->get();
        if ($id != Auth::user()->id) {
            return false;
        }

        return view('users.details.components.update_password')->with([
            'user' => $user,
            'books' => $readBooks,
        ]);
    }

    public function updatePassword($id)
    {
        $user = $this->userRepository->find($id);
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

        $this->userRepository->updatePassword($id, $data['new_password']);
        return Redirect::back()->with([
            'status' => 'success',
            'message' => 'Password Changed Successfully!',
        ]);
    }
}
