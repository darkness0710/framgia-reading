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
}
