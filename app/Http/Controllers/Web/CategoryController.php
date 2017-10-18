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
        $categories = $this->categoryRepository->paginate(10);

        return view('admins.categories.index', compact('user', 'categories'));
    }

    public function adminSearchData(Request $request)
    {
        if(!$request->ajax()) {
            return redirect()->route('error');;
        }

        $user = $this->userRepository->user();
        $categories = $this->categoryRepository->adminSearchData($request, 10);
        $html = view('admins.categories._category', compact('categories', 'user'))->render();

        return Response(['html' => $html]);    
    }
}
