<?php

namespace App\Http\Controllers\Web;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Repositories\Contracts\BookRepositoryInterface as BookRepository;
use App\Models\Book;
use App\Models\Cart;
use Response;
use Session;

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
}
