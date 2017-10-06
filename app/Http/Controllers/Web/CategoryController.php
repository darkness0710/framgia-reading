<?php

namespace App\Http\Controllers\Web;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Repositories\Contracts\CategoryRepositoryInterface as CategoryRepository;
use App\Repositories\Contracts\UserRepositoryInterface as UserRepository;

class CategoryController extends Controller
{
    private $bookRepository;
    private $categoryRepository;
    
    public function __construct(
        UserRepository $userRepository,
        CategoryRepository $categoryRepository
    ) {
        $this->userRepository = $userRepository;
        $this->categoryRepository = $categoryRepository;
    }

    public function indexDashboard(Request $request)
    {
        $user = $this->userRepository->user();
        $book = $this->bookRepository->paginate(10);

        return view('admins.books.index', compact('user', 'books'));
    }
}
