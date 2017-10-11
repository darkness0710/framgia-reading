@extends('layouts.master')

@section('styles')
    {{ Html::style('css/star-rating-svg.css') }}
@endsection

@section('title', 'Knowledge is power')
@section('content')

@push('scripts')
    {{ Html::script('js/ion.rangeSlider.min.js') }}
    {{ Html::script('js/plan-star.js') }}
    {{ Html::script('js/plan.js') }}
    {{ Html::script('js/block.js') }}
    {{ Html::script('js/paginate.js') }}
    {{ Html::script('js/jquery.star-rating-svg.js') }}
    {{ Html::script('js/plan_review_handler.js') }}
@endpush

@include('books.review-modal')
<div class="main-wrapper scrollspy-container">
<!-- start breadcrumb -->
<div class="breadcrumb-image-bg breadcrumb-bg-link">
    <div class="container">
        <div class="page-title">
            <div class="row">
                <div class="col-sm-8 col-sm-offset-2 col-md-6 col-md-offset-3 mb-50">
                    <h2>{{ trans('view.banner_1') }}</h2>
                    <p>{{ trans('view.banner_2') }}</p>
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
                                        <div>
                                            <input type="text" class="form-control" placeholder="Ex: Php master" id="nameSearch">
                                        </div>
                                    </div>
                                    <div class="col-sm-3">
                                        <div class="filter-item mmr">
                                            <div class="input-group input-group-addon-icon no-border no-br-xs">
                                                <span class="input-group-addon input-group-addon-icon bg-white"><label><i class="fa fa-sort-amount-asc"></i> {{ trans('view.subject') }}:</label></span>
                                                <div id="list-subject">
                                                    <select class="selectpicker show-tick form-control" data-live-search="false">
                                                        <option></option>
                                                        @foreach($subjects as $subject)
                                                            <option>{{ $subject->title }}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
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
                            <input type="button" id="search" value="Search" class="form-control" v-on:click="search">
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
    @include('plans._resultPlan');
</div>
@endsection
