@extends('users.details.master')

@section('container')

@include('admins.components.menu')

@section('styles')
    {{ Html::style('css/table.css') }}
@endsection

<div id="ajax_table_subjects">
    @include('admins.subjects._table')
</div>

@include('admins.subjects._modal_edit')

@section('script')
    {{ Html::script('js/admin-subject.js') }}
    {{ Html::script('js/admin-subject-paginate.js') }}
@endsection

@endsection
