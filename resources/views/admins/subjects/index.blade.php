@extends('users.details.master')

@section('container')

@include('admins.components.menu')

@section('styles')
    {{ Html::style('css/table.css') }}
@endsection

<div class="col-md-9">
    @include('admins.subjects._table')
</div>

@include('admins.subjects._modal_edit')
@include('admins.subjects._modal_new')

@section('script')
    {{ Html::script('js/admin-subject.js') }}
    {{ Html::script('js/admin-subject-paginate.js') }}
@endsection

@endsection
