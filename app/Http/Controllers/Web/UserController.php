<?php

namespace App\Http\Controllers\Web;

use Illuminate\Http\Request;
use App\Repositories\Eloquent\UserRepository;
use App\Http\Controllers\Controller;

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
}
