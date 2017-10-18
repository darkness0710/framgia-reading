<?php
namespace App\Repositories\Eloquent;

use App\Models\UserPlan;
use App\Repositories\Contracts\UserPlanRepositoryInterface;

class UserPlanRepository extends Repository implements UserPlanRepositoryInterface
{
    /**
     * @return mixed
     */
    public function model()
    {
        return UserPlan::class;
    }

    public function checkForked($user_id, $plan_id)
    {
        return $this->model
            ->where('assign_id', $user_id)
            ->where('plan_id', $plan_id);
    }

    public function getByAssignId($id)
    {
        return $this->model->where('assign_id', $id);
    }

    public function getPlanForked($id, $paginate) 
    {
        $userPlans = UserPlan::where('assign_id', $id)
            ->with('plan', 'plan.user')
            ->paginate($paginate);
            
        return $userPlans;
    }

    public function findPlanForked($user_id, $userPlan_id)
    {
        $userPlans = UserPlan::where('assign_id', $user_id)
            ->where('id', $userPlan_id)
            ->first();

        return $userPlans;
    }
}
