@extends('layouts.master')

@section('styles')
    {{ Html::style('css/tooltip.css') }}
    {{ Html::style('css/search_modal.css') }}
@endsection

@section('content')
@include('layouts._sections.search_modal')
<div class="bg-light">
    <div class="create-tour-wrapper">
        <div class="container mt-100">
            <div class="row">
                <div class="col-xs-12 col-sm-10 col-sm-offset-1 col-md-8 col-md-offset-2">
                    <div class="form">
                        <div class="create-tour-inner">
                            <h4 class="section-title">Create your own Reading Plan</h4>
                            <p>
                                Create your own reading habit & share with others!!!
                            </p>
                            <form method="POST" action="{{ action('Web\PlanController@store') }}"
                                accept-charset="UTF-8">
                                {{ csrf_field() }}
                                <div class="row">

                                    <div class="col-xs-10">

                                        <div class="form-group form-group-lg">
                                            <label>Plan Title</label>
                                            <input type="text" name="title" class="form-control" required>
                                        </div>

                                    </div>

                                    <div class="col-xs-10">
                                        <label class="pull-left mt-10">Plan Subject</label>
                                        <div class="col-xs-6 col-sm-6">
                                            <div class="mb-15">
                                                <div class="form-group">
                                                    <select class="selectpicker show-tick form-control"
                                                        name="subject" title="Select placeholder">
                                                        @foreach($subjects as $subject)
                                                            <option value="{{ $subject->id }}">
                                                                {{ $subject->title }}
                                                            </option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <input type="hidden" value="{{ json_encode(Session('cart')) }}" id="cart"/>
                                    <div class="col-xs-12 col-sm-12">
                                        <div class="form-group">
                                            <label>Brief Description:</label>
                                            <textarea class="form-control" name="description" rows="5" required></textarea>
                                        </div>
                                    </div>


                                    <div class="col-xs-12 col-sm-12">
                                        <div class="form-group">
                                            <label>Plan Summary</label>
                                            <textarea class="form-control" name="summary" rows="5"></textarea>
                                        </div>
                                    </div>
                                </div>

                                <div class="mb-40"></div>

                                <h4 class="section-title">Itinerary</h4>
                                <p>
                                    Create plan's item in detail. Let's make it effective awesome!!!
                                </p>

                                <div id="plan-item-wrapper">
                                    <div class="clearfix">
                                        <h3 class="col-md-5">
                                            Total Item:
                                        </h3>
                                        <div class="fs-150">
                                            <a id="btn_add">
                                                <i class="fa fa-plus-circle pull-right" aria-hidden="true"></i>
                                            </a>
                                        </div>
                                    </div>
                                    <div id="plan_item_container">
                                    </div>
                                </div>
                            </div>

                            <div class="mb-50">
                                <a href="#" class=""></a>
                                <button type="submit" id="submit_create_plan"
                                    class="btn btn-primary btn-wide" >Submit</button>
                                <a href="#" class="btn btn-primary btn-wide btn-border">Save as draft</a>
                            </div>
                            </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@push('scripts')
    {!! Html::script('js/new_plan.js') !!}
    {!! Html::script('js/search_modal.js') !!}
@endpush

@section('script')
<script>
    var module_create_plan = new module_create_plan();
    module_create_plan.init();
</script>
@endsection
