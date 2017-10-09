@extends('users.details.master')

@section('container')
    @include('users.details.components.menu')

    <div class="col-xs-12 col-sm-7 col-md-8 mt-20">
        <h4 class="section-title">{{ trans('messages.personal_plan') }}</h4>
        <div class="trip-guide-wrapper" id="show-plans">
            <div class="GridLex-gap-20 GridLex-gap-20-xs">
                <div class="GridLex-grid-noGutter-equalHeight">
                    <input type="hidden" id="user_id" value="{{ $user->id }}"/>

                    <div v-for="forkedPlan in forkedPlans" class="col-md-6">
                        <div class="GridLex-col-6_sm-12_xs-6_xss-12">
                            <div class="trip-guide-item no-person">
                                <a href="#">
                                    <div class="trip-guide-image">
                                        <div v-if="forkedPlan.plan.subject != null">
                                            <img v-bind:src="forkedPlan.plan.subject.cover"
                                                class="subject-cover relative-container" alt="images">
                                            <h3 class="relative-center">
                                                @{{ forkedPlan.plan.subject.title }}
                                            </h3>
                                        </div>
                                        <div v-else>
                                            <img src="{{ asset('uploads/subjects/default-cover.jpg') }}"
                                                class="subject-cover relative-container" alt="images">
                                            <h3 class="relative-center col-md-9">
                                                {{ trans('messages.not_found', [
                                                    'item' => trans('messages.subject')
                                                ]) }}
                                            </h3>
                                        </div>
                                    </div>
                                </a>

                                <div class="trip-guide-content">
                                    <h3>@{{ forkedPlan.plan.title }}</h3>
                                    <p>@{{ forkedPlan.plan.description }}</p>
                                </div>

                                <div class="trip-guide-bottom bg-light-primary bt">
                                    <div class="trip-guide-meta row gap-10">
                                        <div class="col-xs-6 col-sm-6">
                                            <div class="rating-item">
                                            </div>
                                        </div>
                                        <div class="col-xs-12 col-sm-6 text-right">
                                            <a href="#" class="btn btn-primary"
                                                v-bind:id="forkedPlan.id"
                                                v-on:click="planDetail">
                                                {{ trans('messages.details') }}
                                            </a>
                                        </div>
                                    </div>

                                    <div class="row gap-10 mt-10">
                                        <div class="col-md-12">
                                            <div class="trip-guide-price">
                                                <p class="float-left col-md-4">
                                                    {{ trans('messages.creator') }}
                                                </p>
                                                <span class="number normal-text col-md-8">
                                                    <a v-if="forkedPlan.plan.user != undefined"
                                                        v-bind:id="forkedPlan.plan.user.id"
                                                        v-on:click="creatorProfile">
                                                        @{{ forkedPlan.plan.user.name }}
                                                    </a>
                                                </span>
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="trip-guide-price">
                                                <p class="float-left col-md-4">
                                                    {{ trans('messages.duration') }}
                                                </p>
                                                <span class="number normal-text col-md-8"
                                                    v-if="forkedPlan != undefined">
                                                    @{{ dateDiff(forkedPlan.start_date, forkedPlan.due_date) }}
                                                </span>
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="trip-guide-price">
                                                <p class="float-left col-md-4">
                                                    {{ trans('messages.status') }}
                                                </p>
                                                <span class="number normal-text col-md-8 uppercase">
                                                    @{{ forkedPlan.status }}
                                                </span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <nav class="mt-20">
                <ul class="pagination">
                    <li v-if="pagination.current_page > 1">
                        <a href="#" aria-label="Previous"
                            @click.prevent="changePage(pagination.current_page - 1)">
                            <span aria-hidden="true">
                                {{ trans('messages.previous') }}
                            </span>
                        </a>
                    </li>
                    <li v-for="page in pagesNumber"
                        v-bind:class="[ page == isActived ? 'active' : '']">
                        <a href="#" @click.prevent="changePage(page)">@{{ page }}</a>
                    </li>
                    <li v-if="pagination.current_page < pagination.last_page">
                        <a href="#" aria-label="Next"
                            @click.prevent="changePage(pagination.current_page + 1)">
                            <span aria-hidden="true">
                                {{ trans('messages.next') }}
                            </span>
                        </a>
                    </li>
                </ul>
            </nav>
        </div>
    </div>
@endsection

@push('scripts')
    {{ Html::script('js/modernizr.custom.js') }}
    {{ Html::script('js/personal_plans_paginate.js') }}
@endpush
