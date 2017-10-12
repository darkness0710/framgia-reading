<?php

namespace App\Http\Controllers\Web;

use App\Repositories\Contracts\ReviewRepositoryInterface as ReviewRepository;
use App\Repositories\Contracts\UserRepositoryInterface as UserRepository;
use App\Repositories\Contracts\BookRepositoryInterface as BookRepository;
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
        BookRepository $bookRepository
    ){
        $this->reviewRepository = $reviewRepository;
        $this->userRepository = $userRepository;
        $this->bookRepository = $bookRepository;
    }

    public function reviewBook(Request $request)
    {
        $book_id = $request->target_id;
        $user = $this->userRepository->user();
        $data = $request->all();
        $data = array_add($data, 'user_id', $user->id);
        $totalRate = $this->reviewRepository->setReview($data, $book_id, 'Book');
        $this->bookRepository->setRate($book_id, $totalRate);
        $reviewNumber = $this->reviewRepository->getReviewNumber($request->target_id, 'Book');

        return response()->json([
            'status' => 'success',
            'data' => [
                'rate' => $totalRate,
                'reviewNumber' => $reviewNumber,
            ],
            'message' => 'Review Created Successfully!',
        ]);
    }
}
