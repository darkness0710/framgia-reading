<?php
namespace App\Repositories\Contracts;

interface BookRepositoryInterface extends RepositoryInterface
{
    public function getBookBySearch($keyword);

    public function getAllBook($select = ['*'], $paginate = 12);
}
