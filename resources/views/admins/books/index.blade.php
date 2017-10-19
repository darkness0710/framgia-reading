@extends('users.details.master')

@section('container')

@include('admins.components.menu')

@section('styles')
    {{ Html::style('css/table.css') }}
    {{ Html::style('admin/css/admin-book.css') }}
@endsection

<div class="col-md-9">
    @include('admins.books._table')
    @include('admins.books._create')
    @include('admins.books._show')
    @include('admins.books._edit')
</div>

@section('script')
    {{ Html::script('js/admin-book.js') }}
    {{ Html::script('js/admin-book-paginate.js') }}
@endsection

@push('scripts')
    {{ Html::script('js/moment.min.js') }}
    {{ Html::script('js/bootstrap-datetimepicker.min.js') }}
@endpush

@endsection
