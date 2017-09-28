<?php
namespace App\Repositories\Eloquent;

use App\Models\Book;
use App\Models\Review;
use App\Models\Category;
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

    public function getBookBySearch($keyword)
    {
        $result = Book::whereLike('title', $keyword)
            ->orderBy('created_at', 'DESC')
            ->limit(5)
            ->get();

        return $result;
    }

    public function getAllBook($select = ['*'], $paginate = 12)
    {
        $books = Book::select($select)
            ->paginate($paginate); 

        foreach($books as $book) {
            $book->reviews_count = Review::where('reviewable_id', '=', $book->id)
                ->where('reviewable_type', '=', 'Book')->count();
        }
      
        return $books;
    }

    public function getAllBookByFilter($category, $title, $sort,
        $with = [], $select = ['*'], $paginate = 12) {
            $books = Book::select($select)->orderBy($sort, 'DESC')
                ->whereHas('categories', function($query) use ($category) {
                    $query->where('title', $category);
                })->whereLike('title', $title)->paginate($paginate);

            foreach($books as $book) {
                $book->reviews_count = Review::where('reviewable_id', '=', $book->id)
                    ->where('reviewable_type', '=', 'Book')->count();
            }
      
            return $books;
    }
}
