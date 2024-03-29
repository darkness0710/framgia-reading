<?php

namespace App\Http\Controllers\Web;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Repositories\Contracts\BookRepositoryInterface as BookRepository;
use App\Repositories\Contracts\SubjectRepositoryInterface as SubjectRepository;
use App\Repositories\Contracts\PlanRepositoryInterface as PlanRepository;
use App\Models\Book;
use App\Models\Plan;

class HomeController extends Controller
{
    private $bookRepository;
    private $subjectRepository;

    public function __construct(
        BookRepository $bookRepository,
        SubjectRepository $subjectRepository,
        PlanRepository $planRepository
    ) {
        $this->bookRepository = $bookRepository;
        $this->subjectRepository = $subjectRepository;
        $this->planRepository = $planRepository;
    }

    public function index()
    {
        $subjects = $this->subjectRepository
            ->getSubjectByTrending(['*'], ['plans'], 6);
        $plans = $this->planRepository
            ->getPlanByTop(['user', 'subject'], ['*'], 6);

        return view('home', compact('subjects', 'plans'));
    }

    public function searchData(Request $request)
    {
        $search = strtolower($request->keyword);
        $search = preg_replace('!\s+!', ' ', $search);
        $books = $this->bookRepository->getBookBySearch($search, 3);
        $plans = $this->planRepository->getPlanBySearch($search, ['user'], 3);
        $html = view('layouts._sections._search', compact('books', 'plans'))->render();

        return Response(['html' => $html]);
    }

    public function errorPage()
    {
        return view('error');
    }
}
