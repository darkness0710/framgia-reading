<?php

namespace App\Http\Controllers\Web;

use App\Repositories\Contracts\ReviewRepositoryInterface as ReviewRepository;
use App\Repositories\Contracts\UserRepositoryInterface as UserRepository;
use App\Repositories\Contracts\BookRepositoryInterface as BookRepository;
use App\Repositories\Contracts\PlanRepositoryInterface as PlanRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ReviewController extends Controller
{
    private $reviewRepository;
    private $userRepository;
    private $bookRepository;

    public function __construct(
        ReviewRepository $reviewRepository,
        UserRepository $userRepository,
        BookRepository $bookRepository,
        PlanRepository $planRepository
    ){
        $this->reviewRepository = $reviewRepository;
        $this->userRepository = $userRepository;
        $this->bookRepository = $bookRepository;
        $this->planRepository = $planRepository;
    }

    public function reviewBook(Request $request)
    {
        $book_id = $request->target_id;
        $user = $this->userRepository->user();
        $data = $request->all();
        $data = array_add($data, 'user_id', $user->id);
        $result = $this->reviewRepository->setReview($data, $book_id, 'Book');

        return response()->json([
            'status' => 'success',
            'data' => $result,
            'message' => 'Review Created Successfully!',
        ]);
    }

    public function reviewPlan(Request $request)
    {
        $plan_id = $request->target_id;
        $user = $this->userRepository->user();
        $data = $request->all();
        $data = array_add($data, 'user_id', $user->id);
        $result = $this->reviewRepository->setReview($data, $plan_id, 'plan');

        return response()->json([
            'status' => 'success',
            'data' => $result,
            'user' => $user,
            'message' => 'Review Created Successfully!',
        ]);
    }
}
