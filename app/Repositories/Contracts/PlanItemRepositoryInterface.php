<?php
namespace App\Repositories\Contracts;

interface PlanItemRepositoryInterface extends RepositoryInterface
{
    public function getByPlanId($id);
}
