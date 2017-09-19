<?php

namespace App\Http\Controllers\Web;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Repositories\Contracts\BookRepositoryInterface as BookRepository;
use App\Models\Book;

class BookController extends Controller
{
    private $bookRepository;

    public function __construct(BookRepository $bookRepository)
    {
        $this->bookRepository = $bookRepository;
    }

    public function show($id)
    {
        $book = $this->bookRepository->find($id);

        return view('books.show', compact('book'));
    }
}
