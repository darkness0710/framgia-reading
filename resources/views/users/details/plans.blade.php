@extends('users.details.master')

@section('container')

<div class="pt-30 pb-50">
    <div class="container">
        <div class="row mt-50">
            <div class="col-md-8 no-margin">
                <h4 class="section-title">
                    {{ trans('messages.plans') }}
                </h4>
                <div class="trip-guide-wrapper">
                    <div class="GridLex-gap-20 GridLex-gap-20-xs">
                        <div class="GridLex-grid-noGutter-equalHeight">
                            @foreach($plans as $plan)
                            <div class="GridLex-col-6_sm-12_xs-6_xss-12">
                                <div class="trip-guide-item no-person">

                                    <!-- Plan Image -->
                                    <div class="trip-guide-image">
                                        <img src="https://lorempixel.com/640/480/?24271" alt="images" class="plan-image" />
                                    </div>

                                    <!-- End Plan Image -->

                                    <!-- Plan Details -->

                                    <div class="trip-guide-content">
                                        <h3>
                                            {{ $plan->title }}
                                        </h3>
                                        <p>
                                            {{ $plan->description }}
                                        </p>
                                    </div>

                                    <!-- End Plan Details -->

                                    <!-- Plan Footer -->

                                    <div class="trip-guide-bottom bg-light-primary footer">
                                        <div class="row gap-10 mt-10 pull-left">
                                            <div>
                                                <small class="text-muted">
                                                    <i class="glyphicon glyphicon-time"></i>
                                                    {{ trans('messages.start_date') }}
                                                    {{ $plan->start_date->format('d-m-Y') }}</small>
                                                </p>
                                            </div>
                                            <div class="mt-10">
                                                <small class="text-muted">
                                                    <i class="glyphicon glyphicon-time"></i>
                                                    {{ trans('messages.due_date') }}
                                                    {{ $plan->due_date->format('d-m-Y') }}
                                                </small>
                                                </p>
                                            </div>
                                        </div>

                                        <div class="trip-guide-meta row gap-10">
                                            <div class="col-xs-6 col-sm-6 text-right pull-right">
                                                <a href="#" class="btn btn-primary">
                                                    {{ trans('messages.details') }}
                                                </a>
                                            </div>
                                        </div>

                                    </div>

                                    <!-- End Plan Footer -->

                                </div>
                            </div>
                            @endforeach
                        </div>
                    </div>
                </div>

                <div class="pager-wrappper text-left clearfix">

                    <div class="pager-innner">

                        <div class="clearfix">
                            <nav>
                                <ul class="pagination">
                                    <li>
                                        {{ $plans->links() }}
                                    </li>
                                </ul>
                            </nav>
                        </div>

                    </div>
                </div>
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
                                {{ $plans->count() }}
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
                                    {{ $followers }}
                                </p>
                            </a>

                            <div class="clearfix"></div>

                            <a href="" class="link">
                                <p class="pull-left">
                                    {{ trans('messages.plans') }}
                                </p>
                                <p class="pull-right">
                                    {{ $plans->total() }}
                                </p>
                            </a>

                            <div class="clearfix"></div>

                            <a href="" class="link">
                                <p class="pull-left">
                                    {{ trans('messages.reviews') }}
                                </p>
                                <p class="pull-right">
                                    {{ $user->reviews->count() }}
                                </p>
                            </a>
                            <div class="clearfix"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
