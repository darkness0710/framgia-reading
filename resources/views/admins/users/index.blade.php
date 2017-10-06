@extends('users.details.master')

@section('container')

@include('admins.components.menu')

@section('styles')
    {{ Html::style('css/table.css') }}
@endsection

<div id="ajax_table_users">
    @include('admins.users._table')
</div>

@endsection
