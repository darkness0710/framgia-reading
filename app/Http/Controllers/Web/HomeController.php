<?php

namespace App\Http\Controllers\Web;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Repositories\Contracts\BookRepositoryInterface as BookRepository;
use App\Repositories\Contracts\SubjectRepositoryInterface as SubjectRepository;
use App\Models\Book;

class HomeController extends Controller
{   
    private $bookRepository;
    private $subjectRepository;

    public function __construct(
        BookRepository $bookRepository,
        SubjectRepository $subjectRepository
    ) {
        $this->bookRepository = $bookRepository;
        $this->subjectRepository = $subjectRepository;
    }

    public function index()
    {
        $subjects = $this->subjectRepository->getSubjectByTrending();
        
        return view('home', compact('subjects'));
    }

    public function searchData(Request $request)
    {
        $search = strtolower(str_replace(' ', '', $request->keyword));
        $books = $this->bookRepository->getBookBySearch($search);
        $html = view('layouts._sections._search')->with('books', $books)->render();

        return Response(['html' => $html]);
    }
}
