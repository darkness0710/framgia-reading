@extends('users.details.master')

@section('container')

@include('admins.components.menu')

@section('styles')
    {{ Html::style('css/table.css') }}
@endsection

<div id="ajax_table_users" class="col-md-9">
    @include('admins.users._table')
</div>

@endsection
