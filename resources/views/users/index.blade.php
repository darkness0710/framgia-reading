@extends('layouts.master')

@section('title', 'Users')

@section('content')

@push('scripts')
    {{ Html::script('js/block.js') }}
    {{ Html::script('js/user.js') }}
@endpush

<div class="main-wrapper scrollspy-container">
    <div class="breadcrumb-image-bg" style="background-image:url('http://stuffpoint.com/nature/image/281721-nature-wonder-of-sky-beauty.jpg');">
        <div class="container">
            <div class="page-title">
                <div class="row">
                    <div>
                    {{-- <div class="col-sm-8 col-sm-offset-2 col-md-6 col-md-offset-3 mb-50"> --}}
                        <h2>{{ trans('view.banner_5') }}</h2>
                        <p>{{ trans('view.banner_6') }}</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
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
                                                <input type="text" class="form-control" placeholder="{{ trans('view.search_user') }}" id="nameSearch">
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
                                            <div class="filter-item mmr">
                                                <div class="input-group input-group-addon-icon no-border no-br-xs">
                                                    <span class="input-group-addon input-group-addon-icon bg-white">
                                                    <label class="block-xs"><i class="fa fa-sort-amount-asc"></i> Type Sort:</label></span>
                                                    <div id="type-sort">
                                                        <select class="selectpicker show-tick form-control" data-live-search="false">
                                                            @foreach($typeSorts as $typeSort)
                                                            <option>{{ $typeSort }}</option>
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
                                <input type="button" id="searchUser" value="Search" class="form-control">
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
        @include('users._resultUser')
    </div>
</div>
@endsection
