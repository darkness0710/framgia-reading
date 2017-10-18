@extends('users.details.master')

@section('container')

@include('users.details.components.menu')
<div class="col-xs-12 col-sm-8 col-md-9 mt-20">
    <div class="dashboard-wrapper">
        <h4 class="section-title">
            {{ trans('dashboard-messages.hello', ['name' => Auth::user()->name ]) }}
        </h4>
        <div class="">
            <div class="col-md-12">
                <div class="col-lg-3 col-md-6">
                    <div class="panel panel-primary">
                        <div class="panel-heading">
                            <div class="row">
                                <div class="col-xs-3">
                                    <i class="fa fa-slack fa-5x ml-5"></i>
                                </div>
                                <div class="col-xs-9 text-right">
                                    <div class="huge mr-5">{{ $plans }}</div>
                                    <div class="mr-5">{{ trans('dashboard-messages.plans') }}</div>
                                </div>
                            </div>
                        </div>
                        <a href="{{ route('user.myPlans', $user->id) }}">
                            <div class="panel-footer">
                                <span class="pull-left">{{ trans('dashboard-messages.plans') }}</span>
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
                                    <i class="fa fa-university fa-5x ml-5"></i>
                                </div>
                                <div class="col-xs-9 text-right">
                                    <div class="huge mr-5">{{ $followings }}</div>
                                    <div class="mr-5">{{ trans('dashboard-messages.followings') }}</div>
                                </div>
                            </div>
                        </div>
                        <a href="#">
                            <div class="panel-footer">
                                <span class="pull-left">{{ trans('dashboard-messages.followings') }}</span>
                                <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                <div class="clearfix"></div>
                            </div>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
