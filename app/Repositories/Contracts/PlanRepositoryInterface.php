<?php
namespace App\Repositories\Contracts;

interface PlanRepositoryInterface extends RepositoryInterface
{
    public function getPlanById($id, $with = [], $select = ['*']);

    public function getPlanByTop($with = [], $select = ['*'], $limit);

    public function getAllPlan($with = [],$select = ['*'], $paginate = 12);

    public function getAllPlanByFilter($subject, $title, $sort,
        $with = [], $select = ['*'], $paginate = 12);

    public function getPlanBySearch($keyword, $with = [], $limit = 3);

    public function searchData($select = ['*'], $with = [], $input, $paginate = 9);
}
