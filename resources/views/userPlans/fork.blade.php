@extends('layouts.master')

@section('styles')
    {!! Html::style('css/forkin-plan.css') !!}
@endsection

@section('content')

<div class="create-tour-wrapper">
    <div class="container mt-90">
        <div class="row">
            <div class="col-xs-12 col-sm-10 col-sm-offset-1 col-md-8 col-md-offset-2">
                <div class="form">
                    <form class="form-group" action="{{ action('Web\UserPlanController@fork', [
                        'id' => $plan->id,
                    ]) }}" method="post">
                    {{ csrf_field() }}

                    <div class="create-tour-inner">
                        <h4 class="section-title">{{ trans('messages.plan_') . $plan->title }}</h4>
                        <div class="mb-20 col-md-8 float-left">
                            <div class="form-group inline">
                                <label class="col-md-4 no-padding">{{ trans('messages.forked') }}</label>
                                <p class="col-md-8">{{ $forked }}</p>
                            </div>
                            <div class="clearfix"></div>

                            <div class="form-group inline">
                                <label class="col-md-4 no-padding">{{ trans('messages.description') }}</label>
                                <p class="col-md-8">{{ $plan->description }}</p>
                            </div>
                            <div class="clearfix"></div>

                            <div class="form-group inline">
                                <label class="col-md-4 no-padding">{{ trans('messages.summary') }}</label>
                                <p class="col-md-8">{{ $plan->summary }}</p>
                            </div>
                        </div>
                        <div class="text-center col-md-4">
                            <div class="mb-10">
                                <img src="{{ $plan->user->avatar }}" class="big-thumb center"/>
                            </div>
                            <div>
                                <p class="small-text text-mute no-padding no-margin">
                                    {{ trans('messages.create_by') }}
                                </p>
                                <h4 class="no-margin">{{ $plan->user->name }}</h4>
                                <p class="small-text text-mute  no-margin">
                                    {{ trans('messages.created_at') }}
                                </p>
                                <p class=" no-margin">{{ $plan->created_at }}</p>
                            </div>
                        </div>
                        <div class="clearfix mb-30"></div>

                        <div class="mt-30 row gap-20">
                            <div class="col-md-6 form-group form-group-sm">
                                <label>{{ trans('messages.plan_start_date') }}</label>
                                <div class='input-group date' id='plan_start_date'>
                                    <input type='text' class="form-control" name="plan_start_date" required/>
                                    <span class="input-group-addon normal-input-group-addon">
                                        <span class="glyphicon glyphicon-calendar"></span>
                                    </span>
                                </div>
                            </div>

                            <div class="col-md-6 form-group form-group-sm">
                                <label>
                                    {{ trans('messages.plan_due_date') }}
                                </label>
                                <div class='input-group date' id='plan_due_date'>
                                    <input type='text' class="form-control"  name="plan_due_date" required/>
                                    <span class="input-group-addon normal-input-group-addon">
                                        <span class="glyphicon glyphicon-calendar"></span>
                                    </span>
                                </div>
                            </div>
                        </div>

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
                                                        <div class="col-md-10">
                                                            <div class="inline small-text">
                                                                <label class="float-left mr-20">
                                                                    {{ trans('messages.author') }}
                                                                </label>
                                                                <p class="pull-right">{{ $item->book->author }}</p>
                                                            </div>
                                                            <div class="clearfix"></div>

                                                            <div class="inline small-text">
                                                                <label class="float-left mr-20">
                                                                    {{ trans('messages.pages') }}
                                                                </label>
                                                                <p class="pull-right">{{ $item->book->pages }}</p>
                                                            </div>
                                                            <div class="clearfix"></div>

                                                            <div class="inline small-text">
                                                                <label class="float-left mr-20">
                                                                    {{ trans('messages.duration') }}
                                                                </label>
                                                                <p class="pull-right">
                                                                    {{ trans('messages.days', [
                                                                        'duration' => $item->duration,
                                                                    ]) }}
                                                                </p>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="book-cover pull-right">
                                                        <img src="{{ $item->book->cover }}"/>
                                                    </div>
                                                </div>
                                                <div class="clearfix"></div>

                                                <div class="mt-30 row gap-20">
                                                    <div class="col-md-6 form-group form-group-sm">
                                                        <label>
                                                            {{ trans('messages.time-from') }}
                                                        </label>
                                                        <div class='input-group date' id='{{ "start_date_" . $key }}'>
                                                            <input type='text' class="form-control"
                                                                name="{{ 'start_date_' . $key }}" required/>
                                                            <span class="input-group-addon normal-input-group-addon">
                                                                <span class="glyphicon glyphicon-calendar"></span>
                                                            </span>
                                                        </div>
                                                    </div>

                                                    <div class="col-md-6 form-group form-group-sm">
                                                        <label>{{ trans('messages.time-to') }}</label>
                                                        <div class='input-group date' id='{{ "due_date_" . $key }}'>
                                                            <input type='text' class="form-control"
                                                                name="{{ 'due_date_' . $key }}" required/>
                                                            <span class="input-group-addon normal-input-group-addon">
                                                                <span class="glyphicon glyphicon-calendar"></span>
                                                            </span>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="row gap-20">
                                                    <div class="col-xs-12 col-sm-6">
                                                        <label class="pull-left mt-10">
                                                            {{ trans('messages.status')}}
                                                        </label>
                                                        <div class="mb-15">
                                                            <div class="form-group">
                                                                <select class="selectpicker show-tick form-control"
                                                                    name="{{ 'status_' . $key }}" title="Select placeholder"
                                                                    id="{{ 'status_' . $key }}">
                                                                    <option value="new" selected="selected">
                                                                        {{ trans('messages.new') }}
                                                                    </option>
                                                                    <option value="in-progress">
                                                                        {{ trans('messages.in_progress') }}
                                                                    </option>
                                                                    <option value="done">
                                                                        {{ trans('messages.done') }}
                                                                    </option>
                                                                </select>
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div class="col-xs-12 col-sm-6">
                                                        <div class="form-group">
                                                            <label>{{ trans('messages.note') }}</label>
                                                            <textarea class="form-control" rows="5"
                                                                name="{{ 'note_' . $key }}"
                                                                id="{{ 'note_' . $key }}"></textarea>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        @endforeach
                    </div>

                    <div class="mb-50">
                        <div class="mb-25"></div>
                        <button class="btn btn-primary btn-wide" type="submit">
                            {{ trans('messages.submit')}}
                        </button>
                        <a href="#" class="btn btn-primary btn-wide btn-border">
                            {{ trans('messages.save_as_draft')}}
                        </a>
                    </div>

                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection

@section('script')
    {!! Html::script('js/moment.min.js') !!}
    {!! Html::script('js/bootstrap-datetimepicker.min.js') !!}
    {!! Html::script('js/forked-plan-datetime.js') !!}
@endsection
