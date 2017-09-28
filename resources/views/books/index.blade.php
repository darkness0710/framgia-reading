@extends('layouts.master')
@section('title', 'Book ')
@section('content')

@push('scripts')
    {{ Html::script('js/block.js') }}
    {{ Html::script('js/book.js') }}
@endpush

<div class="main-wrapper scrollspy-container">
<!-- start breadcrumb -->
<div class="breadcrumb-image-bg" style="background-image:url('https://orig01.deviantart.net/c54c/f/2012/281/d/1/story_time_by_alectorfencer-d5h7ntv.jpg');">
    <div class="container">
        <div class="page-title">
            <div class="row">
                <div class="col-sm-8 col-sm-offset-2 col-md-6 col-md-offset-3 mb-50">
                    <h2>{{ trans('view.banner_3') }}</h2>
                    <p>{{ trans('view.banner_4') }}</p>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- end breadcrumb -->
<div class="filter-full-width-wrapper">
    <form>
        <div class="filter-full-primary" id="boss">
            <div class="container">
                <div class="filter-full-primary-inner">
                    <div class="form-holder">
                        <div class="row">
                            <div class="col-xs-12 col-sm-12 col-md-12">
                                <div class="filter-item-wrapper">
                                    <div class="row">
                                        <div class="col-sm-3">
                                            <div class="filter-item mmr">
                                                <div class="input-group input-group-addon-icon no-border no-br-xs">
                                                    <span class="input-group-addon input-group-addon-icon bg-white">
                                                    <label class="block-xs"><i class="fa fa-sort-amount-asc"></i> {{ trans('view.sort_by') }}:</label></span>
                                                    <div id="list-sort">
                                                        <select class="selectpicker show-tick form-control" data-live-search="false">
                                                            @foreach($sorts as $sort)
                                                                <option>{{ $sort }}</option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-sm-3">
                                            <div class="filter-item mmr">
                                                <div class="input-group input-group-addon-icon no-border no-br-xs">
                                                    <span class="input-group-addon input-group-addon-icon bg-white"><label><i class="fa fa-sort-amount-asc"></i> {{ trans('view.categories') }}:</label></span>
                                                    <div id="list-subject">
                                                        <select class="selectpicker show-tick form-control" data-live-search="false">
                                                            @foreach($categories as $category)
                                                                <option>{{ $category->title }}</option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-sm-3">
                                            <div>
                                                <input type="text" class="form-control" placeholder="Ex: Php master" id="nameSearch">
                                            </div>
                                        </div>
                                        <div class="col-sm-3">
                                            <div class="btn-holder">
                                                <span class="btn btn-toggle btn-refine collapsed" data-toggle="collapse" data-target="#refine-result">{{ trans('advance_filter') }}</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="btn-holder">
                            <div id="seach-sort">
                                <input type="button" id="searchBook" value="Search" class="form-control">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="filter-full-secondary">
                <div id="refine-result" class="collapse">
                    <div class="container">
                        <div class="collapse-inner clearfix">
                            <div class="row">
                                <div class="col-xs-12 col-sm-12 col-md-4">
                                    <div class="row">
                                        {{-- Advance Search --}}
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
    </form>
</div>
<div class="pt-30 pb-50 result">
    <div class="container">
        <div class="trip-guide-wrapper">
            <div class="trip-guide-wrapper mb-30 mt-10">
                <div class="GridLex-gap-20 GridLex-gap-15-mdd GridLex-gap-10-xs">
                    <div class="GridLex-grid-noGutter-equalHeight">
                        @foreach($books as $book)
                        <div class="GridLex-col-3_mdd-2_sm-3_xs-3_xss-6">
                            <div class="trip-guide-item">
                                <div class="image">
                                    <img src="{{ $book->cover }}" class="ml-40 mt-30" alt="images" width="180px" height="220px" />
                                </div>
                                <div class="trip-guide-content">
                                    <h3>{{ $book->title }}</h3>
                                    <p>{{ $book->summary }}</p>
                                </div>
                                <div class="trip-guide-bottom mb-30">
                                    <div class="trip-guide-meta row gap-10">
                                        <div class="col-xs-6 col-sm-6">
                                            <div class="rating-item">
                                                <input type="hidden" class="rating" data-filled="fa fa-star rating-rated" data-empty="fa fa-star-o" data-fractions="2" data-readonly value="4.5"/>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row gap-10">
                                        <div class="col-xs-12 col-sm-6">
                                            <div class="trip-guide-price">
                                                {{ trans('view.rate') }}: {{ $book->rate }}
                                                <p class="block inline-block-xs">{{ $book->reviews_count }} {{ trans('view.reviews') }}</p>
                                            </div>
                                        </div>
                                        <div class="col-xs-12 col-sm-6 text-right text-left-xs" id="addBookToCart">
                                            <a href="{{ route('book.addToCart', $book->id) }}" class="btn btn-primary"><i class="ti-heart"></i></a>
                                            <a href="{{ route('book.show', $book->id) }}" class="btn btn-primary">{{ trans('view.view') }}</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>
            </div>
            <div class="pager-wrappper clearfix">
                <div class="pager-innner">
                    <div class="clearfix">
                        <div id="paginate">
                            {{ $books->links() }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
