<?php
namespace App\Repositories\Contracts;

interface ReviewRepositoryInterface extends RepositoryInterface
{
    public function getReviews($id, $with = [], $select = ['*']);
}
