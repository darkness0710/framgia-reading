<?php
namespace App\Repositories\Contracts;

interface BookRepositoryInterface extends RepositoryInterface
{
    public function getBookBySearch($keyword);

    public function getAllBook($select = ['*'], $paginate = 12);

    public function getAllBookByFilter($category, $title, $sort, 
        $select = ['*'], $paginate = 12);
}
