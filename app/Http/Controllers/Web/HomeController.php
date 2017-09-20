<?php

namespace App\Http\Controllers\Web;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Repositories\Contracts\BookRepositoryInterface as BookRepository;
use App\Models\Book;

class HomeController extends Controller
{   
    private $bookRepository;

    public function __construct(BookRepository $bookRepository)
    {
        $this->bookRepository = $bookRepository;
    }

    public function index()
    {
        return view('home');
    }

    public function searchData(Request $request)
    {
        $search = strtolower(str_replace(' ', '', $request->keyword));
        $books = $this->bookRepository->getBookBySearch($search);
        $html = view('layouts._sections._search')->with('books', $books)->render();

        return Response(['html' => $html]);
    }
}
