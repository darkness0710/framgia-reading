@extends('users.details.master')

@section('container')

    <div class="col-xs-12 col-sm-7 col-md-8 mt-20">
        <h4 class="section-title">{{ trans('messages.profile') }}</h4>
{{--         <div class="bt mt-30 mb-30"></div> --}}
        <ul class="featured-list-with-h">
            <li>
                <div class="row">
                    <div class="col-xs-12 col-sm-12 col-md-6">
                        <h5>
                            {{ trans('messages.email') }}
                        </h5>
                    </div>
                    <div class="col-xs-12 col-sm-12 col-md-6 mt-sm">
                        {{ $user->email }}
                    </div>
                </div>
            </li>

            <li>
                <div class="row">
                    <div class="col-xs-12 col-sm-12 col-md-6">
                        <h5>
                            {{ trans('messages.gender') }}
                        </h5>
                    </div>
                    <div class="col-xs-12 col-sm-12 col-md-6 mt-sm">
                        {{ $user->gender }}
                    </div>
                </div>
            </li>

            <li>
                <div class="row">
                    <div class="col-xs-12 col-sm-12 col-md-6">
                        <h5>
                            {{ trans('messages.dob') }}
                        </h5>
                    </div>
                    <div class="col-xs-12 col-sm-12 col-md-6 mt-sm">
                        {{ $user->dob }}
                    </div>
                </div>
            </li>

            <li>
                <div class="row">
                    <div class="col-xs-12 col-sm-12 col-md-6">
                        <h5>
                            {{ trans('messages.followers') }}
                        </h5>
                    </div>
                    <div class="col-xs-12 col-sm-12 col-md-6 mt-sm">
                        <a href="#">
                            {{ count($followers) }}
                        </a>
                    </div>
                </div>
            </li>

            <li>
                <div class="row">
                    <div class="col-xs-12 col-sm-12 col-md-6">
                        <h5>
                            {{ trans('messages.following') }}
                        </h5>
                    </div>
                    <div class="col-xs-12 col-sm-12 col-md-6 mt-sm">
                        <a href="#">
                            {{ count($following) }}
                        </a>
                    </div>
                </div>
            </li>
        </ul>
        <div class="mb-30"></div>
    </div>

    <div class="pull-right user-info-panel">
        <div>
            <div class="user-info-row">
                <div class="col-md-6">
                    <img src="{{ $user->avatar }}" class='sm-avatar mt-20'/>
                </div>
                <div class="user-name underline-on-hover">
                    <h3>
                        <a href="" class="txt-blue">
                            {{ $user->name }}
                        </a>
                    </h3>
                    <div class="mt-10">
                        {{ trans('messages.total_plan') }}
                        {{ count($plans) }}
                    </div>
                </div>
            </div>

            <div class="user-info-row mt-20 ml-20">
                <div class="col-md-6">
                    <button class="btn btn-follow btn-br-10">
                        {{ trans('messages.follow') }}
                    </button>
                </div>
                <div class="user-name">

                </div>
            </div>

            <div class="sidebar-booking-box p-20">
                <div>
                    <a href="" class="link">
                        <p class="pull-left">
                            {{ trans('messages.followers') }}
                        </p>
                        <p class="pull-right">
                            {{ count($followers) }}
                        </p>
                    </a>

                    <div class="clearfix"></div>

                    <a href="" class="link">
                        <p class="pull-left">
                            {{ trans('messages.plans') }}
                        </p>
                        <p class="pull-right">
                            {{ count($plans) }}
                        </p>
                    </a>

                    <div class="clearfix"></div>

                    <a href="" class="link">
                        <p class="pull-left">
                            {{ trans('messages.reviews') }}
                        </p>
                        <p class="pull-right">
                            {{ count($user->reviews) }}
                        </p>
                    </a>
                    <div class="clearfix"></div>
                </div>

            </div>
            @if ($count_plans))
                <div class="height-300" id="subject-tendency">
                </div>
            @endif
        </div>
    </div>
@endsection

@section('script')
    {!! Lava::render('PieChart', 'Subject Tendency', 'subject-tendency') !!}
@endsection
