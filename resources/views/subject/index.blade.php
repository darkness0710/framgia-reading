@extends('layouts.master')

@section('title', trans('view.framgia_reading'))

@push('scripts')
    {{ Html::script('js/modernizr.custom.js') }}
    {{ Html::script('js/toucheffects.js') }}
    {{ Html::script('js/slider.js') }}
    {{ Html::script('js/subject.js') }}
@endpush

@section('styles')
    {{ Html::style('css/slider.css') }}
@endsection

@section('content')
<div class="mt-40">
    <div class="icon ml-25">
        <div class="col-sm-10 col-sm-offset-1 col-md-8 col-md-offset-2">
            <div class="section-title">
                <h2>{{ trans('view.subjects_upcase') }}</h2> 
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
                                            <div class="col-sm-4 col-md-offset-1">
                                                <div>
                                                    <input type="text" class="form-control ml-10" placeholder="{{ trans('view.search_subject') }}" id="nameSearch">
                                                </div>
                                            </div>
                                            <div class="col-sm-3">
                                                <div class="filter-item mmr">
                                                    <div class="input-group input-group-addon-icon no-border no-br-xs">
                                                        <span class="input-group-addon input-group-addon-icon bg-white"><label><i class="fa fa-sort-amount-asc"></i> Sort By:</label></span>
                                                        <div id="list-subject">
                                                            <select class="selectpicker show-tick form-control" data-live-search="false">
                                                                @foreach($sorts as $sort)
                                                                    <option>{{ $sort }}</option>
                                                                @endforeach
                                                            </select>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="btn-holder">
                                                <div id="seach-sort">
                                                    <input type="button" id="search-subjects" value="{{ trans('view.search') }}" class="form-control">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
        </form>
    </div>
    <div class="result">
        @include('subject._subject')
    </div>
</div>

@endsection
