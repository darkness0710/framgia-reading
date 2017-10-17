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
                ->whereLike('reviewable_type', 'Plan')->count();
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

    public function searchData($select = ['*'], $with = [], $input, $paginate = 9)
    {
        $input['title'] = preg_replace('!\s+!', ' ', $input['title']);
        $subject = $input['subject'];

        switch ($input['sort']) {
            case 'Name':
                $input['sort'] = 'title';
                break;
            case 'Rate':
                $input['sort'] = 'rate';
                break;
        }

        if($input['subject'] == '') {
            $plans = Plan::select($select)->orderBy($input['sort'], 'DESC')
                ->with($with)->whereLike('title', $input['title'])->paginate($paginate);
        } else {
            $plans = Plan::select($select)->orderBy($input['sort'], 'DESC')
                ->with($with)->whereHas('subject', function($query) use ($subject) {
                    $query->where('title', $subject);
                })->whereLike('title', $input['title'])->paginate($paginate);
        }

        foreach($plans as $plan) {
            $plan->reviews_count = Review::where('reviewable_id', '=', $plan->id)
                ->where('reviewable_type', '=', 'Plan')->count();
        }

        return $plans;
    }

    public function findPlanBySubject($condition, $id, $paginate = 9)
    {
        $plans = Plan::where($condition, $id)->paginate($paginate);

        return $plans;
    }


    public function setRate($id, $value)
    {
        $plan = $this->findBy('id', $id);
        $plan->rate = $value;
        $plan->save();
    }

    public function findPlansOwned($user_id, $with = [], $paginate = 10)
    {
        $plans = Plan::where('user_id', $user_id)->with($with)->paginate($paginate);

        return $plans;
    }
}
