<?php
namespace App\Repositories\Eloquent;

use App\Models\Plan;
use App\Models\Review;
use App\Repositories\Contracts\PlanRepositoryInterface;

class PlanRepository extends Repository implements PlanRepositoryInterface
{
    /**
     * @return mixed
     */
    public function model()
    {
        return Plan::class;
    }

    public function getPlanById($id, $with = [], $select = ['*'])
    {
        $results = Plan::select($select)
            ->whereId($id)
            ->with($with)
            ->first(); 

        return $results;
    }

    public function getPlanByTop($with = [], $select = ['*'], $limit)
    {
        $plans = Plan::select($select)
            ->with($with)
            ->limit($limit)
            ->get(); 

        foreach($plans as $plan) {
            $plan->reviews_count = Review::where('reviewable_id', '=', $plan->id)
                ->where('reviewable_type', '=', 'Plan')->count();
        }

        return $plans;
    }

    public function getAllPlan($with = [], $select = ['*'], $paginate = 12)
    {
        $plans = Plan::select($select)
            ->with($with)->paginate($paginate); 

        foreach($plans as $plan) {
            $plan->reviews_count = Review::where('reviewable_id', '=', $plan->id)
                ->where('reviewable_type', '=', 'Plan')->count();
        }
      
        return $plans;
    }

    public function getAllPlanByFilter($subject, $title, $sort,
        $with = [], $select = ['*'], $paginate = 12) {
            $plans = Plan::select($select)->orderBy($sort, 'DESC')
                ->with($with)->whereHas('subject', function($query) use ($subject) {
                    $query->where('title', $subject);
                })->whereLike('title', $title)->paginate($paginate);

            foreach($plans as $plan) {
                $plan->reviews_count = Review::where('reviewable_id', '=', $plan->id)
                    ->where('reviewable_type', '=', 'Plan')->count();
            }

            return $plans;
    }

    public function getPlanBySearch($keyword, $with = [], $limit = 3) {
        $plans = Plan::whereLike('title', $keyword)
            ->with($with)
            ->orderBy('created_at', 'DESC')
            ->limit($limit)
            ->get();

        return $plans;
    }
}
