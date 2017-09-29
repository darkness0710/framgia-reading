@if (!$books->isEmpty())
    <li class="header-title"><b>{{ trans('view.books') }}</b></li>
    @foreach ($books as $book)
        <li>
            <a href="{{ route('book.show', $book->id) }}">
                <img src = "{{ $book->cover }}" title = "{{ $book->title }}" id="header-image">
                <span class="header-search" id="header-search"> {{ $book->title }}</span>
            </a>
        </li>
       {{--  <li class="header-search"></li> --}}
    @endforeach
    <li class="divider"></li>
@endif

@if (!$plans->isEmpty())
    <li class="header-title"><b>Plans</b></li>
    @foreach ($plans as $plan)
        <li>
            <a href="{{ route('plan.show', $book->id) }}">
                <img src = "{{ $plan->user->avatar }}" title = "{{ $plan->title }}" id="header-image">
                <span class="header-search2" id="header-search2">
                    @ {{ $plan->user->name }}
                    <p class="ml-50">{{ $plan->title }}</p>
                </span>
            </a>
        </li>
       {{--  <li class="header-search"></li> --}}
    @endforeach
    <li class="divider"></li>
@endif
