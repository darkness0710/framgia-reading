@extends('layouts.master')

@section('styles')
    {!! Html::style('css/forkin-plan.css') !!}
@endsection

@section('content')

<div class="create-tour-wrapper">
    <div class="container mt-90">
        <div class="row">
            <div class="col-md-10 col-md-offset-1">
                <div class="form">
                    <div class="create-tour-inner">
                        <h4 class="section-title">
                            {{ trans('messages.plan_') . $originalPlan->title }}
                        </h4>
                        <div class="mb-20 col-md-8 float-left">
                            <div class="form-group inline">
                                <label class="col-md-4 no-padding">{{ trans('messages.forked_at') }}</label>
                                <p class="col-md-8">{{ $forkedPlan->created_at }}</p>
                            </div>
                            <div class="clearfix"></div>

                            <div class="form-group inline">
                                <label class="col-md-4 no-padding">
                                    {{ trans('messages.description') }}
                                </label>
                                <p class="col-md-8">{{ $originalPlan->description }}</p>
                            </div>
                            <div class="clearfix"></div>

                            <div class="form-group inline">
                                <label class="col-md-4 no-padding">
                                    {{ trans('messages.summary') }}
                                </label>
                                <p class="col-md-8">{{ $originalPlan->summary }}</p>
                            </div>

                            <div class="mt-30 row gap-20">
                                <div class="form-group">
                                    <label class="float-left col-md-4">
                                        {{ trans('messages.plan_start_date') }}
                                    </label>
                                    <div class='input-group date pl-20'>
                                        <i class="glyphicon glyphicon-time top-3"></i>
                                        {{ $forkedPlan->start_date }}
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="float-left col-md-4">
                                        {{ trans('messages.plan_due_date') }}
                                    </label>
                                    <div class='input-group date pl-20'>
                                        <i class="glyphicon glyphicon-time top-3"></i>
                                        {{ $forkedPlan->due_date }}
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="text-center col-md-4 detail-panel">
                            <div class="mb-10">
                                <img src="{{ $originalPlan->user->avatar }}" class="big-thumb center"/>
                            </div>
                            <div>
                                <p class="small-text text-mute no-padding no-margin">
                                    {{ trans('messages.create_by') }}
                                </p>
                                <h4 class="no-margin">{{ $originalPlan->user->name }}</h4>
                                <p class="small-text text-mute  no-margin">
                                    {{ trans('messages.create_at') }}
                                </p>
                                <p class=" no-margin">{{ $originalPlan->created_at }}</p>
                            </div>
                        </div>
                        <div class="clearfix mb-30"></div>

                        @foreach($items as $key => $item)
                        <div class="itinerary-form-wrapper">
                            <div class="itinerary-form-item">
                                <div class="content clearfix">
                                    <div class="row gap-20">
                                        <div class="col-xss-12 col-xs-2 col-sm-2 col-md-1">
                                            <div class="day">
                                                <h6 class="text-uppercase mb-0 mt-5 text-muted">
                                                    {{ trans('messages.item') }}
                                                </h6>
                                                <span class="text-primary block number spacing-1">
                                                    {{ $key + 1 }}
                                                </span>
                                            </div>
                                        </div>

                                        <div class="col-xss-12 col-xs-10 col-sm-10 col-md-11">
                                            <div class="col-md-12">
                                                <div class="col-md-8 pull-left">
                                                    <label>{{ $item->book->title }}</label>
                                                    <p>
                                                        {{ $item->book->description }}
                                                    </p>
                                                </div>
                                                <div class="book-cover pull-right">
                                                    <img src="{{ $item->book->cover }}" class="small-book-cover"/>

                                                    <div class="col-md-10 text-center">
                                                        <div class="inline small-text">
                                                            <label>
                                                                {{ trans('messages.author') }}
                                                            </label>
                                                            <p>{{ $item->book->author }}</p>
                                                        </div>
                                                        <div class="clearfix"></div>

                                                        <div class="inline small-text">
                                                            <label>
                                                                {{ trans('messages.pages') }}
                                                            </label>
                                                            <p>{{ $item->book->pages }}</p>
                                                        </div>
                                                        <div class="clearfix"></div>

                                                        <div class="inline small-text">
                                                            <label>Duration</label>
                                                            <p>
                                                                {{ trans('messages.days', [
                                                                    'duration' => $item->duration,
                                                                ]) }}
                                                            </p>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="clearfix"></div>

                                            <div class="mt-30">
                                                <div class="form-group">
                                                    <label class="float-left col-md-4">
                                                        {{ trans('messages.start_date') }}
                                                    </label>
                                                    <div class='input-group date pl-20'>
                                                        <i class="glyphicon glyphicon-time top-3"></i>
                                                        {{ $item->start_date }}
                                                    </div>
                                                </div>

                                                <div class="form-group">
                                                    <label class="float-left col-md-4">
                                                        {{ trans('messages.due_date') }}
                                                    </label>
                                                    <div class='input-group date pl-20'>
                                                        <i class="glyphicon glyphicon-time top-3"></i>
                                                        {{ $item->due_date }}
                                                    </div>
                                                </div>

                                                <div class="form-group">
                                                    <label class="pull-left col-md-4">
                                                        {{ trans('messages.status') }}
                                                    </label>
                                                    <div class='input-group date pl-20'>
                                                        <p class="uppercase">{{ $item->status }}</p>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="clearfix"></div>

                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label>{{ trans('messages.note') }}</label>
                                                    <p>{{ $item->note }}</p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
