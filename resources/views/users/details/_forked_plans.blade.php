@if (!$userPlans->isEmpty())
    <div class="trip-list-wrapper no-bb-last">
        @foreach($userPlans as $userPlan)
            <div class="trip-list-item">
                <div class="image-absolute">
                    <div class="image image-object-fit image-object-fit-cover">
                        <img src="{{ $userPlan->plan->user->avatar }}" alt="image" >
                    </div>
                </div>
                <div class="content">
                    <div class="GridLex-gap-20 mb-5">
                        <div class="GridLex-grid-noGutter-equalHeight GridLex-grid-middle">
                            <div class="GridLex-col-5_sm-12_xs-12_xss-12">
                                <div class="GridLex-inner">
                                    <h6>
                                        <a href="{{ route('user.plans', $userPlan->plan->user->id) }}">
                                            {{ $userPlan->plan->user->name }}
                                        </a>
                                    </h6>
                                    <span class="font-italic font14">{{ $userPlan->plan->title }}</span>
                                </div>
                            </div>
                            <div class="GridLex-col-3_sm-4_xs-4_xss-4">
                                <span class="block text-primary font700 mb-1"> {{ $userPlan->status }}</span>
                                <div class="GridLex-inner text-center text-left-sm line-1 font14 text-muted spacing-1">
                                    <span class="block text-primary font700 mb-1"> {{ $userPlan->created_at }}</span>
                                </div>
                            </div>
                            <div class="GridLex-col-2_sm-8_xs-8_xss-8">
                                <div class="GridLex-inner text-right">
                                    <a href="{{ route('plan.show', $userPlan->plan->id) }}" class="btn btn-primary btn-sm">{{ trans('view.viewText') }}</a>
                                </div>
                                <a href="#" class="btn btn-primary btn-sm">{{ trans('view.details') }}</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
    <div class="pager-wrappper text-left clearfix bt mt-0 pt-20">
        <div class="pager-innner">
            <div class="clearfix">
                <nav>
                    <ul class="paginate">
                        {{ $userPlans->links() }}
                    </ul>
                </nav>
            </div>
        </div>
    </div>
@else
    <div class="text-center">{{ trans('view.not_have_data') }}</div>
@endif
