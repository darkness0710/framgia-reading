<?php

namespace App\Http\Controllers\Web;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Repositories\Contracts\BookRepositoryInterface as BookRepository;
use App\Repositories\Contracts\CategoryRepositoryInterface as CategoryRepository;
use App\Repositories\Contracts\ReviewRepositoryInterface as ReviewRepository;
use App\Repositories\Contracts\UserRepositoryInterface as UserRepository;
use App\Models\Book;
use App\Models\Cart;
use App\Models\Category;
use Response;
use Session;

class BookController extends Controller
{
    private $bookRepository;
    private $categoryRepository;
    private $reviewRepository;
    private $userRepository;

    public function __construct(
        BookRepository $bookRepository,
        CategoryRepository $categoryRepository,
        ReviewRepository $reviewRepository,
        UserRepository $userRepository
    ) {
        $this->bookRepository = $bookRepository;
        $this->categoryRepository = $categoryRepository;
        $this->reviewRepository = $reviewRepository;
         $this->userRepository = $userRepository;
    }

    public function index(Request $request)
    {
        $books = $this->bookRepository
            ->getAllBook(['*'], 12);
        $sorts = ['Title', 'Rate'];
        $categories = $this->categoryRepository->getAllCategory(['title']);

        if($request->ajax()) {
            $html = view('books._resultBook')->with('books', $books)->render();

            return Response(['html' => $html]);
        }

        return view('books.index', compact('books', 'sorts', 'categories'));
    }

    public function show($id)
    {
        $book = $this->bookRepository->find($id);
        $reviews = $this->reviewRepository
            ->getReviews($id, ['comments', 'user'], ['*']);
        $totalReview = $this->reviewRepository->getReviewNumber($id, 'Book');

        return view('books.show', compact('book', 'reviews'))->with('totalReview', $totalReview);
    }

    public function getAddToCart(Request $request, $id)
    {
        if($request->ajax()) {
            $book = $this->bookRepository->find($id);
            $oldCart = Session::has('cart') ? Session::get('cart') : null;
            $cart = new Cart($oldCart);

            if($cart->items) {
                foreach($cart->items as $product) {
                    if($product['item']['id'] == $id) {
                        return Response::json(array(
                        'code'      =>  404,
                        'message'   =>  'Book already in cart!'
                        ), 404);
                    }
                }
            }

            $cart->add($book, $book->id);
            $request->session()->put('cart', $cart);
            $html = view('carts.show', compact('cart'))->render();

            return Response(['html' => $html]);
        }
    }

    public function getRemoveToCart(Request $request,$id) {
        if($request->ajax()) {
            $oldCart = Session::has('cart') ? Session::get('cart') : null;
            $cart = new Cart($oldCart);
            $cart->removeItem($id);

            if (count($cart->items) > 0) {
                Session::put('cart', $cart);
            } else {
                Session::forget('cart');
            }

            $html = view('carts.show', compact('cart'))->render();

            return Response(['html' => $html]);
        }
    }

    public function searchData(Request $request)
    {
        if($request->ajax()) {
            $input = $request->all();
            if($input['title'] == null) {
                $input['title'] = "";
            }

            $books = $this->bookRepository->getAllBookByFilter($input['subject'],
                $input['title'], $input['sort'], ['*'], 12);
            $books->appends([
                'subject' => $input['subject'],
                'sort' => $input['sort'],
                'title' => $input['title']
            ]);
            $html = view('books._resultBook')->with('books', $books)->render();

            return Response(['html' => $html]);
        }
    }

    public function searchByTitle(Request $request)
    {
        if ($request->ajax()) {
            $title = $request->title;
            $books = $this->bookRepository->getBookBySearch($title, 5);

            return Response(['books' => $books]);
        }
    }

    public function indexDashboard(Request $request)
    {
        $user = $this->userRepository->user();
        $books = $this->bookRepository->paginate(10);
        $allCategories = $this->categoryRepository->all();
        $categories = [];

        foreach($allCategories as $category) {
            $categories = array_add($categories, $category->id, $category->title);
        }

        if($request->ajax()) {
           $html = view('admins.books._book', compact('user', 'books'))->render();

           return Response(['html' => $html]);
        }

        return view('admins.books.index', compact('user', 'books', 'categories'));
    }

    public function adminSearchData(Request $request)
    {
        if(!$request->ajax()) {
            return redirect()->route('error');
        }

        $user = $this->userRepository->user();
        $books = $this->bookRepository->adminSearchData($request, 10);
        $html = view('admins.books._book', compact('books', 'user'))->render();

        return Response(['html' => $html]);    
    }

    public function destroy($user_id, $book_id)
    {
        $books = Book::withCount('categories')->get();
      
        if($books) {
            return redirect()->back()->with('status', 'Can not delete books because include categories!');
        }

        $this->bookRepository->find($book_id)->delete();

        return redirect()->route('admin.book', $user_id);
    }
}
