@extends('layouts.master')
@section('title', 'Knowledge is power')
@section('content')

@push('scripts')
    {{ Html::script('js/ion.rangeSlider.min.js') }}
    {{ Html::script('js/plan-star.js') }}
    {{ Html::script('bower_components/axios/dist/axios.js') }}
    {{ Html::script('bower_components/vue/dist/vue.js') }}
    {{ Html::script('js/plan.js') }}
    {{ Html::script('js/block.js') }}
@endpush

<div class="main-wrapper scrollspy-container">
<!-- start breadcrumb -->
<div class="breadcrumb-image-bg" style="background-image:url('http://cdn30.us1.fansshare.com/image/wallpaperblue/engineering-wallpaper-hd-wallpapers-wallpaper-1528541881.jpg');">
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
                                        <div class="filter-item mmr">
                                            <div class="input-group input-group-addon-icon no-border no-br-xs">
                                                <span class="input-group-addon input-group-addon-icon bg-white">
                                                <label class="block-xs"><i class="fa fa-sort-amount-asc"></i> Sort by:</label></span>
                                                <div id="list-sort">
                                                    <select class="selectpicker show-tick form-control" data-live-search="false">
                                                        <option v-for="sort in sorts" value="0">
                                                            @{{ sort }}
                                                        </option>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-sm-3">
                                        <div class="filter-item mmr">
                                            <div class="input-group input-group-addon-icon no-border no-br-xs">
                                                <span class="input-group-addon input-group-addon-icon bg-white"><label><i class="fa fa-sort-amount-asc"></i> {{ trans('view.subject') }}:</label></span>
                                                <div id="list-subject">
                                                    <select class="selectpicker show-tick form-control" data-live-search="false">
                                                        <option v-for="subject in subjects" value="0">
                                                            @{{ subject.title }}
                                                        </option>
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
    <div class="container">
        <div class="trip-guide-wrapper">
            <div class="trip-guide-wrapper mb-30 mt-10">
                <div class="GridLex-gap-20 GridLex-gap-15-mdd GridLex-gap-10-xs">
                    <div class="GridLex-grid-noGutter-equalHeight">
                        @foreach($plans as $plan)
                        <div class="GridLex-col-4_mdd-4_sm-6_xs-6_xss-12">
                            <div class="trip-guide-item">
                                <div class="trip-guide-content">
                                    <h3>{{ $plan->title }}</h3>
                                    <p>{{ $plan->summary }}</p>
                                </div>
                                <div class="trip-guide-bottom">
                                    <div class="trip-guide-person clearfix">
                                        <div class="image">
                                            <img src="{{ $plan->user->avatar }}" class="img-circle" alt="images" />
                                        </div>
                                        <p class="name">{{ trans('view.by') }}: <a href="">{{ $plan->user->name }}</a></p>
                                    </div>
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
                                                {{ trans('view.rate') }}: {{ $plan->rate }}
                                                <p class="block inline-block-xs">{{ $plan->reviews_count }} {{ trans('view.reviews') }}</p>
                                            </div>
                                        </div>
                                        <div class="col-xs-12 col-sm-6 text-right text-left-xs">
                                            <a href="{{ route('plan.show', $plan->id) }}" class="btn btn-primary">{{ trans('view.view') }}</a>
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
                        <div>
                            {{ $plans->links() }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
