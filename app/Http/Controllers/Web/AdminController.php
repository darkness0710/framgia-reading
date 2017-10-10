<?php

namespace App\Http\Controllers\Web;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Repositories\Contracts\UserRepositoryInterface as UserRepository;
use App\Repositories\Contracts\BookRepositoryInterface as BookRepository;
use App\Repositories\Contracts\CategoryRepositoryInterface as CategoryRepository;
use App\Repositories\Contracts\SubjectRepositoryInterface as SubjectRepository;
use App\Models\User;

class AdminController extends Controller
{
    private $userRepository;
    private $bookRepository;
    private $categoryRepository;
    private $subjectRepository;

    public function __construct(
        UserRepository $userRepository,
        BookRepository $bookRepository,
        CategoryRepository $categoryRepository,
        SubjectRepository $subjectRepository
    ) {
        $this->userRepository = $userRepository;
        $this->bookRepository = $bookRepository;
        $this->categoryRepository = $categoryRepository;
        $this->subjectRepository = $subjectRepository;
    }

    public function index()
    {
        $user = $this->userRepository->user();
        $count_user = $this->userRepository->countUser('id');
        $count_subject = $this->subjectRepository->countSubject('id');
        $count_category = $this->categoryRepository->countCategory('id');
        $count_book = $this->bookRepository->countBook('id');

        return view('admins.index', 
            compact('user', 'count_user', 'count_subject', 'count_category', 'count_book'));
    }
}
