<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Requests\CreateBookRequest;
use App\Http\Controllers\Controller;
use Carbon;
use App\Models\Book;
use App\Repositories\Contracts\UserRepositoryInterface as UserRepository;
use App\Repositories\Contracts\BookRepositoryInterface as BookRepository;
use App\Repositories\Contracts\SubjectRepositoryInterface as SubjectRepository;

class BookController extends Controller
{
    private $userRepository;
    private $bookRepository;
    private $subjectRepository;

    public function __construct(
        BookRepository $bookRepository,
        UserRepository $userRepository,
        SubjectRepository $subjectRepository
    )
    {
        $this->bookRepository = $bookRepository;
        $this->userRepository = $userRepository;
        $this->subjectRepository = $subjectRepository;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreateBookRequest $request)
    {
        $data = $request->except('_token');
        $cover = config('custom.avatar.default');
        if (array_has($data, 'cover')) {
            $coverFile = $data['cover'];
            $cover = $data['title'] . '.' . config('app.name') . '.' . $coverFile->getClientOriginalExtension();
            upload_file($coverFile, config('custom.avatar.url'), $cover);
        }

        $year = date('Y/m/d', strtotime($data['year']));
        $book = $this->bookRepository->create([
            'title' => $data['title'],
            'description' => $data['description'],
            'author' => $data['author'],
            'cover' => $cover,
            'status' => $data['status'],
            'publisher' => $data['publisher'],
            'pages' => $data['pages'],
            'summary' => $data['summary'],
            'speak' => $data['language'],
            'year' => $year,
            'rate' => 0,
        ]);

        $book->categories()->syncWithoutDetaching([$data['category']]);

        return response()->json([
            'book' => $book,
            'messages' => trans('admin-books.book_created_success'),
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id, $book_id)
    {
        $book = $this->bookRepository->getBookWithOptions($book_id, ['categories'])->first();
        $html = view('admins.books._bookDetails')->with('book', $book)->render();

        return response()->json([
            'html' => $html,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
