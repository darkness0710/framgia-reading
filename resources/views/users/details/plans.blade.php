@extends('users.details.master')

@section('container')

<div class="pt-30 pb-50 result">
    <div class="container">
        <div class="row mt-50">
            <div class="col-md-8 no-margin">
                <h4 class="section-title">
                    {{ trans('messages.plans') }}
                </h4>
                <div class="trip-guide-wrapper">
                    <div class="GridLex-gap-20 GridLex-gap-20-xs">
                        <div class="mt--250">
                            <div id="show-plans">
                                <input type="hidden" id="user_id" value="{{ $id }}"/>

                                <div v-for="plan in plans">
                                    <div class="col-md-12">
                                        <div class="clearfix"></div>
                                        <div class="trip-list-item">
                                            <div class="image-absolute">
                                                <div class="image image-object-fit image-object-fit-cover">
                                                    <img src="{{ $user->avatar }}" alt="image" class="thumb">
                                                </div>
                                            </div>
                                            <div class="content">
                                                <div class="GridLex-gap-20 mb-5">
                                                    <div class="GridLex-grid-noGutter-equalHeight GridLex-grid-middle row">
                                                        <div class="GridLex-col-6_sm-12_xs-12_xss-12">
                                                            <div class="GridLex-inner">
                                                                <a class="fs-140" href="#">
                                                                    @{{ plan.plan.title }}
                                                                </a>
                                                                <span class="font-italic font15">
                                                                    <p v-if="plan.plan.subject != null">
                                                                        @{{ plan.plan.subject.title }}
                                                                    </p>
                                                                    <p v-else>Not Found!</p>
                                                                </span>
                                                            </div>

                                                        </div>


                                                        <div class="line-1 font15 spacing-1 pull-right">
                                                            <small class="no-margin">
                                                                <i class="glyphicon glyphicon-calendar mt-10"></i>
                                                                Start Date: @{{ plan.start_date }}
                                                            </small>
                                                            <div class="clearfix">

                                                            </div>
                                                            <small class="no-margin">
                                                                <i class="glyphicon glyphicon-calendar mt-10"></i>
                                                                Due Date: @{{ plan.due_date }}
                                                            </small>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="pull-left">
                                                            @{{ plan.plan.description }}
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <nav class="mt-280">
                                    <ul class="pagination">
                                        <li v-if="pagination.current_page > 1">
                                            <a href="#" aria-label="Previous"
                                                @click.prevent="changePage(pagination.current_page - 1)">
                                                <span aria-hidden="true">«</span>
                                            </a>
                                        </li>
                                        <li v-for="page in pagesNumber"
                                            v-bind:class="[ page == isActived ? 'active' : '']">
                                            <a href="#" @click.prevent="changePage(page)">@{{ page }}</a>
                                        </li>
                                        <li v-if="pagination.current_page < pagination.last_page">
                                            <a href="#" aria-label="Next"
                                                @click.prevent="changePage(pagination.current_page + 1)">
                                                <span aria-hidden="true">»</span>
                                            </a>
                                        </li>
                                    </ul>
                                </nav>
                            </div>
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

@push('scripts')
    {{ Html::script('js/pagination.js') }}
@endpush
