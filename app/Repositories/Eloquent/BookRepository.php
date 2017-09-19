<?php
namespace App\Repositories\Eloquent;

use App\Models\Book;
use App\Repositories\Contracts\BookRepositoryInterface;

class BookRepository extends Repository implements BookRepositoryInterface
{
    /**
     * @return mixed
     */
    public function model()
    {
        return Book::class;
    }
}
