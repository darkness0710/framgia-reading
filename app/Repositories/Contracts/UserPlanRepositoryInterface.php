<?php
namespace App\Repositories\Contracts;

interface UserPlanRepositoryInterface extends RepositoryInterface
{
    public function getByAssignId($id);
    
    public function checkForked($user_id, $plan_id);

    public function getPlanForked($id, $paginate);
}
