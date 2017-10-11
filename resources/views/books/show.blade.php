@extends('layouts.master')

@section('styles')
    {{ Html::style('css/star-rating-svg.css') }}
@endsection

@push('scripts')
    {{ Html::script('js/jquery.star-rating-svg.js') }}
    {{ Html::script('js/show_book_review.js') }}
@endpush

@section('title', $book->title)

@section('content')
@include('books.review-modal')

<div class="container mt-10">
    <div class="row">
        <div class="col-md-4">
            <div id="sidebar-sticky" class="col-md-4 mt-20">
                <aside class="sidebar-wrapper with-box-shadow fix-image">
                    <img src="{{ $book->cover }}" alt="Mountain View" class="img-fit">
                </aside>
            </div>
        </div>
        <div class="col-md-8" id="book-pre">
            <div>
                <div id="book-name">
                    <span class="pl-sm" id="highligh-size">{{ $book->title }}</span>
                </div>
                <div class="mt-5">
                    <span><i class="ti-user text-primary mr-5"></i> {{ trans('view.author') }}: </span>
                    <span class="pl-sm" id="highligh">{{ $book->author }}</span>
                </div>
                <div class="mt-5">
                    <span><i class="ti-flag-alt-2 text-primary mr-5"></i> {{ trans('view.publisher') }}: </span>
                    <span class="pl-sm" id="highligh">{{ $book->publisher }}</span>
                </div>
                <div class="mt-5">
                    <span><i class="ti-wand text-primary mr-5"></i> {{ trans('view.categories') }}: </span>
                    <span class="pl-sm" id="highligh"></span>
                </div>
                <div class="mt-5">
                    <span><i class="ti-bookmark text-primary mr-5"></i> {{ trans('view.summary') }}: </span>
                    <span>{{ $book->summary }}</span>
                </div>

                <div class="ml-10 ml-0-xs mb-10 mt-20" id="addBookToCart">
                    <a href="{{ route('book.addToCart', $book->id) }}"
                        class="btn btn-primary btn-border">
                        <i class="ti-heart"> {{ trans('view.add_favourite') }}</i>
                    </a>
                </div>
            </div>
        </div>
        <div class="col-md-12">
            <div id="exTab1">
                <ul  id="nav-pills" class="nav nav-pills">
                    <li class="active">
                        <a  href="#1a" data-toggle="tab">{{ trans('view.introduction') }}</a>
                    </li>
                    <li>
                        <a href="#2a" data-toggle="tab">{{ trans('view.details') }}</a>
                    </li>
                    <li>
                        <a href="#3a" data-toggle="tab">{{ trans('view.reviews') }}</a>
                    </li>
                </ul>
                <div class="tab-content clearfix">
                    <div class="tab-pane active" id="1a">
                        <div class="col-xs-12 mt-20">
                            <p>{{ $book->description }}</p>
                        </div>
                    </div>
                    <div class="tab-pane" id="2a">
                        <div class="col-xs-12 col-sm-7 col-md-8 mt-20">
                            <ul class="featured-list-with-h">
                                <li>
                                    <div class="row">
                                        <div class="col-xs-12 col-sm-12 col-md-6">
                                            <span><i class="ti-book text-primary mr-5"></i> {{ trans('view.bookName') }}</span>
                                        </div>
                                        <div class="col-xs-12 col-sm-12 col-md-6 mt-sm">
                                            <span class="pl-sm" id="highligh">{{ $book->title }}</span>
                                        </div>
                                    </div>
                                </li>
                                <li>
                                    <div class="row">
                                        <div class="col-xs-12 col-sm-12 col-md-6">
                                            <span><i class="ti-user text-primary mr-5"></i> {{ trans('view.author') }}</span>
                                        </div>
                                        <div class="col-xs-12 col-sm-12 col-md-6 mt-sm">
                                            <span class="pl-sm" id="highligh">{{ $book->author }}</span>
                                        </div>
                                    </div>
                                </li>
                                <li>
                                    <div class="row">
                                        <div class="col-xs-12 col-sm-12 col-md-6">
                                            <span><i class="ti-flag-alt-2 text-primary mr-5"></i> {{ trans('view.publisher') }}</span>
                                        </div>
                                        <div class="col-xs-12 col-sm-12 col-md-6 mt-sm">
                                            <span class="pl-sm" id="highligh">{{ $book->publisher }}</span>
                                        </div>
                                    </div>
                                </li>
                                <li>
                                    <div class="row">
                                        <div class="col-xs-12 col-sm-12 col-md-6">
                                            <span><i class="ti-file text-primary mr-5"></i> {{ trans('view.pages') }}</span>
                                        </div>
                                        <div class="col-xs-12 col-sm-12 col-md-6 mt-sm">
                                            <span class="pl-sm" id="highligh">{{ $book->pages }}</span>
                                        </div>
                                    </div>
                                </li>
                                <li>
                                    <div class="row">
                                        <div class="col-xs-12 col-sm-12 col-md-6">
                                            <span><i class="ti-flag-alt text-primary mr-5"></i> {{ trans('view.speak') }}</span>
                                        </div>
                                        <div class="col-xs-12 col-sm-12 col-md-6 mt-sm">
                                            <span class="pl-sm" id="highligh">{{ $book->speak }}</span>
                                        </div>
                                    </div>
                                </li>
                                <li>
                                    <div class="row">
                                        <div class="col-xs-12 col-sm-12 col-md-6">
                                            <span><i class="ti-calendar text-primary mr-5"></i> {{ trans('view.year') }}</span>
                                        </div>
                                        <div class="col-xs-12 col-sm-12 col-md-6 mt-sm">
                                            <span class="pl-sm" id="highligh">{{ $book->year }}</span>
                                        </div>
                                    </div>
                                </li>
                            </ul>
                            <div>
                            </div>
                        </div>
                    </div>
                    <div class="tab-pane" id="3a">
                        <div class="col-md-10">
                            @if (Auth::check())
                                <input type="hidden" id="user_login" value="{{ Auth::user()->id }}">
                            @endif
                            <div class="tab-inner mb-20">
                                <h3 class="section-title">{{ trans('view.reviews') }}</h3>
                                <div class="review-wrapper">
                                    <div class="review-header">
                                        <div class="GridLex-gap-30">
                                            <div class="GridLex-grid-noGutter-equalHeight GridLex-grid-middle">
                                                <div class="GridLex-col-9_sm-8_xs-12_xss-12">
                                                    <div class="review-rating">
                                                        <div class="number" id="total_rate">{{ $book->rate }}</div>
                                                        <div class="rating-wrapper">
                                                            <div class="rating-item rating-item-lg">
                                                                <div class="rating-item">
                                                                    <div class="my-rating" id="{{ 'rate_' . $book->id }}"></div>
                                                                </div>
                                                                <p id="total_review" class="col-md-2 no-padding mr-10">{{ $totalReview }}</p>
                                                                {{ trans('view.reviews_low') }}
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="GridLex-col-3_sm-4_xs-12_xss-12">
                                                    <div class="GridLex-inner">
                                                        <a href="#review-form" id="btn_review"
                                                            class="btn btn-primary btn-block anchor">
                                                            {{ trans('view.write_review') }}
                                                        </a>
                                                    </div>
                                                </div>
                                                <div class="review-content">
                                                    <ul class="review-list" id="list_review">
                                                        @foreach($reviews as $review)
                                                        <li class="clearfix">
                                                            <div class="row">
                                                                <div class="col-md-3">
                                                                    <div class="review-header">
                                                                        <h6>{{ $review->user->name }}</h6>
                                                                        <span class="review-date"> {{ $review->created_at }}</span>
                                                                        <div class="rating-item">
                                                                            <div class="my-rating" id="{{ 'review_' . $review->id }}" value="{{ $review->rate }}"></div>
                                                                        </div>
                                                                        <a href="#" class="btn btn-primary">{{ trans('view.reply') }}</a>
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-9">
                                                                    <div class="review-content" id="{{ 'content_review_' . $review->id }}">
                                                                        <p>{{ $review->content }}</p>
                                                                    </div>
                                                                    @if ($reviews->first()->comments->first())
                                                                        <a href="#" class="pull-right underline-on-hover">
                                                                            <i class="ion-chatboxes"></i>
                                                                            {{ trans('view.view_more_replies') }}
                                                                        </a>
                                                                    @endif

                                                                </div>
                                                            </div>
                                                        </li>
                                                        @endforeach
                                                    </ul>
                                                    <div class="mb-20">
                                                        <a href="#" class="center">
                                                            <i class="ion-chatboxes"></i>
                                                            {{ trans('view.view_more_replies') }}
                                                        </a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('script')
<script type="text/javascript">
    var show_book_review = new show_book_review();
    show_book_review.init({
        book_rate: {{ $book->rate }},
    });
</script>
@endsection
