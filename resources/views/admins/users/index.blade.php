@extends('users.details.master')

@section('container')

@include('admins.components.menu')
@include('admins.users.create')

@section('styles')
    {{ Html::style('css/table.css') }}
    {{ Html::style('admin/css/user.css') }}
@endsection

<div class="col-md-9">
    @include('admins.users._table')
</div>

@section('script')
    {{ Html::script('js/admin-user.js') }}
    {{ Html::script('js/admin-user-paginate.js') }}
@endsection

@endsection

@section('script')
    <script type="text/javascript">
        var create_user = new create_user();
        create_user.init({
            user_id: {{ Auth::id() }},
        });
    </script>
@endsection

@push('scripts')
    {{ Html::script('js/moment.min.js') }}
    {{ Html::script('js/bootstrap-datetimepicker.min.js') }}
@endpush
