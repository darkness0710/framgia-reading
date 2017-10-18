<?php
namespace App\Repositories\Contracts;

interface CategoryRepositoryInterface extends RepositoryInterface
{
    public function getAllCategory($select = ['*']);

    public function countCategory($select = ['*']);

    public function adminSearchData($request, $paginate);
}
