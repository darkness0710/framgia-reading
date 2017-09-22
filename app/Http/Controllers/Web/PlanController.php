<?php

namespace App\Http\Controllers\Web;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Repositories\Contracts\PlanRepositoryInterface as PlanRepository;
use App\Repositories\Contracts\ReviewRepositoryInterface as ReviewRepository;
use App\Repositories\Contracts\UserRepositoryInterface as UserRepository;
use App\Models\Plan;

class PlanController extends Controller
{
    private $planRepository;

    public function __construct(
        PlanRepository $planRepository,
        ReviewRepository $reviewRepository,
        UserRepository $userRepository
    ) {
        $this->planRepository = $planRepository;
        $this->reviewRepository = $reviewRepository;
        $this->userRepository = $userRepository;
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
}
