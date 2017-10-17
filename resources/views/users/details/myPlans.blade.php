@extends('users.details.master')

@section('container')

@include('users.details.components.menu')

<div class="col-xs-12 col-sm-8 col-md-9 mt-20">
    <div class="dashboard-wrapper">
            <div class="filter-item mmr filter-my-plans">
                    <div class="input-group input-group-addon-icon no-border no-br-xs">
                        <span class="input-group-addon input-group-addon-icon bg-white">
                        <label class="block-xs"></label></span>
                        <div id="list-sort">
                            <select class="selectpicker show-tick form-control" data-live-search="false" id="filterPlans">
                                @foreach($filterPlans as $filterPlan)
                                    <option value="{{ $filterPlan }}">{{ $filterPlan }}</option>
                                @endforeach
                            </select>
                        </div>
                        <input type="hidden" id="user_id" value="{{ $user->id }}" />
                    </div>
                </div>
            <h4 class="section-title">{{ trans('view.my_plans') }}</h4>
        </div>
        <div id="dataPlans">                           
            @include('users.details._created_plans')
        </div>
    </div>
</div>
@endsection

@push('scripts')
    {{ Html::script('js/modernizr.custom.js') }}
    {{ Html::script('js/my-plans.js') }}
@endpush
