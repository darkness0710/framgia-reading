@extends('users.details.master')

@section('container')

@include('admins.components.menu')

@section('styles')
    {{ Html::style('css/table.css') }}
@endsection

<div class="col-md-9">
    @include('admins.books._table')
</div>

@section('script')
    {{ Html::script('js/admin-book.js') }}
    {{ Html::script('js/admin-book-paginate.js') }}
@endsection

@endsection
