@extends('layouts.master')

@section('content')
    <div class="error-page-wrapper">
        <div class="container">
            <div class="row">
                <div class="col-sm-10 col-md-8 col-sm-offset-1 col-md-offset-2">
                    <div class="error-404">
                        {{ trans('messages.404') }}
                    </div>
                    <h3>{{ trans('messages.unauthorized') }}</h3>
                    <a href="{{ action('Web\HomeController@index') }}"
                        class="btn btn-primary mt-15">
                        {{ trans('messages.back_home_page') }}
                    </a>
                </div>
            </div>
        </div>
    </div>
@endsection