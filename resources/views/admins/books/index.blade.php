@extends('users.details.master')

@section('container')

@include('admins.components.menu')

@section('styles')
    {{ Html::style('css/table.css') }}
@endsection

<div id="ajax_table_books" class="col-md-9">
    @include('admins.books._table')
</div>

@endsection
