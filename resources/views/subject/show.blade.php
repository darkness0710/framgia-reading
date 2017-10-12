@extends('layouts.master')

@section('title', trans('view.framgia_reading'))

@push('scripts')
    {{ Html::script('js/modernizr.custom.js') }}
    {{ Html::script('js/toucheffects.js') }}
    {{ Html::script('js/slider.js') }}
@endpush

@section('styles')
    {{ Html::style('css/slider.css') }}
@endsection

@section('content')
    <div class="ml-50 mt-40">
        <div class="icon ml-25">
            <img src="{{ $subject->cover }}" alt="{{ $subject->title }}" id="imageSize70">
            <div>
                <h2>{{ $subject->title }}</h2> 
                <div>
                    <b>{{ $count_plans }}</b>: {{ trans('view.plans') }}
                </div>
            </div>
            <hr>
        </div>
    </div>
    <div class="pt-30 pb-50 result">
        @include('plans._resultPlan');
    </div>
@endsection
