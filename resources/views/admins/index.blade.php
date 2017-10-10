@extends('users.details.master')

@section('container')

@include('admins.components.menu')
<div class="col-xs-12 col-sm-8 col-md-9 mt-20">
        <div class="dashboard-wrapper">
            <h4 class="section-title">
                {{ trans('dashboard-messages.admin_dashboard') }}
            </h4>
        </div>
    <div class="col-lg-3 col-md-6">
        <div class="panel panel-primary">
            <div class="panel-heading">
                <div class="row">
                    <div class="col-xs-3">
                        <i class="fa fa-university fa-5x ml-5"></i>
                    </div>
                    <div class="col-xs-9 text-right">
                        <div class="huge mr-5">{{ $count_subject }}</div>
                        <div class="mr-5">{{ trans('dashboard-messages.subjects') }}</div>
                    </div>
                </div>
            </div>
            <a href="{{ route('admin.subject', $user->id) }}">
                <div class="panel-footer">
                    <span class="pull-left">{{ trans('dashboard-messages.view_details') }}</span>
                    <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                    <div class="clearfix"></div>
                </div>
            </a>
        </div>
    </div>
    <div class="col-lg-3 col-md-6">
        <div class="panel panel-primary">
            <div class="panel-heading">
                <div class="row">
                    <div class="col-xs-3">
                        <i class="fa fa-slack fa-5x ml-5"></i>
                    </div>
                    <div class="col-xs-9 text-right">
                        <div class="huge mr-5">{{ $count_category }}</div>
                        <div class="mr-5">{{ trans('dashboard-messages.categories') }}</div>
                    </div>
                </div>
            </div>
            <a href="{{ route('admin.category', $user->id) }}">
                <div class="panel-footer">
                    <span class="pull-left">{{ trans('dashboard-messages.view_details') }}</span>
                    <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                    <div class="clearfix"></div>
                </div>
            </a>
        </div>
    </div>
    <div class="col-lg-3 col-md-6">
        <div class="panel panel-primary">
            <div class="panel-heading">
                <div class="row">
                    <div class="col-xs-3">
                        <i class="fa fa-user fa-5x ml-5"></i>
                    </div>
                    <div class="col-xs-9 text-right">
                        <div class="huge mr-5">{{ $count_user }}</div>
                        <div class="mr-5">{{ trans('dashboard-messages.users') }}</div>
                    </div>
                </div>
            </div>
            <a href="{{ route('admin.user', $user->id) }}">
                <div class="panel-footer">
                    <span class="pull-left">{{ trans('dashboard-messages.view_details') }}</span>
                    <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                    <div class="clearfix"></div>
                </div>
            </a>
        </div>
    </div>
    <div class="col-lg-3 col-md-6">
        <div class="panel panel-primary">
            <div class="panel-heading">
                <div class="row">
                    <div class="col-xs-3">
                        <i class="fa fa-book fa-5x ml-5"></i>
                    </div>
                    <div class="col-xs-9 text-right">
                        <div class="huge mr-5">{{ $count_book }}</div>
                        <div class="mr-5">{{ trans('dashboard-messages.books') }}</div>
                    </div>
                </div>
            </div>
            <a href="{{ route('admin.book', $user->id) }}">
                <div class="panel-footer">
                    <span class="pull-left">{{ trans('dashboard-messages.view_details') }}</span>
                    <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                    <div class="clearfix"></div>
                </div>
            </a>
        </div>
    </div>
</div>
@endsection
