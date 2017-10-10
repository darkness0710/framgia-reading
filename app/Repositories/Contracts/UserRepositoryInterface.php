<?php

namespace App\Repositories\Contracts;

interface UserRepositoryInterface extends RepositoryInterface
{
    public function getUserByPlan($id, $with = [], $select = ['*'], $withCount = []);

    public function countUser($select = ['*']);

    public function getData($select = ['*'], $withCount = []);

    public function searchData($select = ['*'], $withCount = [], $input);
}
