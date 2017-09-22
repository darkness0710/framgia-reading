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
}
