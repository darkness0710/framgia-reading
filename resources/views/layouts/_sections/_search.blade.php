@if (!$books->isEmpty())
    <li class="header-title"><b>{{ trans('view.books') }}</b></li>
    @foreach ($books as $book)
        <li>
            <a href="{{ route('book.show', $book->id) }}">
                <img src = "{{ $book->cover }}" title = "{{ $book->title }}" id="header-image">
                <span class="header-search" id="header-search">{{ $book->title }}</span>
            </a>
        </li>
       {{--  <li class="header-search"></li> --}}
    @endforeach
    <li class="divider"></li>
@endif
