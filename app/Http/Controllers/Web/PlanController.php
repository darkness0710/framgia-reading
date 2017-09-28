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

    public function index(Request $request)
    {
        $plans = $this->planRepository
            ->getAllPlan(['user'] ,['*'], 12);
        
        if($request->ajax()) {
           $html = view('plans._resultPlan')->with('plans', $plans)->render();

           return Response(['html' => $html]);
        }

        return view('plans.index', compact('plans'));
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

        $plans = $this->planRepository->getAllPlanByFilter($input['subject'], 
            $input['title'], $input['sort'], ['user', 'subject'], ['*'], 12);
        $plans->appends([
            'subject' => $input['subject'],
            'sort' => $input['sort'],
            'title' => $input['title']
        ]);
        $html = view('plans._resultPlan')->with('plans', $plans)->render();

        return Response(['html' => $html]);

    }
}
