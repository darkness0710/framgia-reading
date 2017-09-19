@extends('layouts.master')

@section('content')

<div class="scrollspy-container">
    <div class="breadcrumb-wrapper">
        <div class="container">
            <ol class="breadcrumb">
                <li><a href="#">{{ trans('view.book') }}</a></li>
                <li class="active">{{ $book->title }}</li>
            </ol>
        </div>
    </div>
    <div class="pt-30 pb-50">
        <div class="container">
            <div class="row">
                <div class="col-xs-12 col-sm-7 col-md-8 mt-20">
                    <ul class="featured-list-with-h">
                        <li>
                            <div class="row">
                                <div class="col-xs-12 col-sm-12 col-md-6">
                                    <h5><i class="ti-book text-primary mr-5"></i> {{ trans('view.bookName') }}</h5>
                                </div>
                                <div class="col-xs-12 col-sm-12 col-md-6 mt-sm">
                                    <span class="pl-sm">{{ $book->title }}</span>
                                </div>
                            </div>
                        </li>
                        <li>
                            <div class="row">
                                <div class="col-xs-12 col-sm-12 col-md-6">
                                    <h5><i class="ti-user text-primary mr-5"></i> {{ trans('view.author') }}</h5>
                                </div>
                                <div class="col-xs-12 col-sm-12 col-md-6 mt-sm">
                                    <span class="pl-sm">{{ $book->author }}</span>
                                </div>
                            </div>
                        </li>
                        <li>
                            <div class="row">
                                <div class="col-xs-12 col-sm-12 col-md-6">
                                    <h5><i class="ti-flag-alt-2 text-primary mr-5"></i> {{ trans('view.publisher') }}</h5>
                                </div>
                                <div class="col-xs-12 col-sm-12 col-md-6 mt-sm">
                                    <span class="pl-sm">{{ $book->publisher }}</span>
                                </div>
                            </div>
                        </li>
                        <li>
                            <div class="row">
                                <div class="col-xs-12 col-sm-12 col-md-6">
                                    <h5><i class="ti-file text-primary mr-5"></i> {{ trans('view.pages') }}</h5>
                                </div>
                                <div class="col-xs-12 col-sm-12 col-md-6 mt-sm">
                                    <span class="pl-sm">{{ $book->pages }}</span>
                                </div>
                            </div>
                        </li>
                        <li>
                            <div class="row">
                                <div class="col-xs-12 col-sm-12 col-md-6">
                                    <h5><i class="ti-flag-alt text-primary mr-5"></i> {{ trans('view.speak') }}</h5>
                                </div>
                                <div class="col-xs-12 col-sm-12 col-md-6 mt-sm">
                                    <span class="pl-sm">{{ $book->speak }}</span>
                                </div>
                            </div>
                        </li>
                        <li>
                            <div class="row">
                                <div class="col-xs-12 col-sm-12 col-md-6">
                                    <h5><i class="ti-calendar text-primary mr-5"></i> {{ trans('view.year') }}</h5>
                                </div>
                                <div class="col-xs-12 col-sm-12 col-md-6 mt-sm">
                                    <span class="pl-sm">{{ $book->year }}</span>
                                </div>
                            </div>
                        </li>
                    </ul>
                    <div>
                        <div class="mb-30"></div>
                        <h4 class="section-title">{{ trans('view.bookIntroduction') }}</h4>
                        <p class="lead">{{ $book->description }}</p>
                    </div>
                    <div class="rating-item rating-item-lg">
                        <input type="hidden" class="rating" data-filled="fa fa-star rating-rated" data-empty="fa fa-star-o" data-fractions="2" data-readonly value="4.5"/>
                        <span class="block line14">{{ trans('view.basedOn') }} <a href="#"> {{ trans('view.reviews') }}</a></span>
                    </div>
                </div>
                <div id="sidebar-sticky" class="col-xs-12 col-sm-5 col-md-4 mt-20">
                    <aside class="sidebar-wrapper with-box-shadow fix-image">
                        <img src="{{ $book->cover }}" alt="Mountain View">
                    </aside>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
