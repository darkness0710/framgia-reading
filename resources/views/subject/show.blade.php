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

@endsection
