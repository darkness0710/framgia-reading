<?php
namespace App\Repositories\Contracts;

interface PlanRepositoryInterface extends RepositoryInterface
{
    public function getPlanById($id, $with = [], $select = ['*']);
    public function getPlanByTop($with = [], $select = ['*'], $limit);
}
