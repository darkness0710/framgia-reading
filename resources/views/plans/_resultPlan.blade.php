@if (!$plans->isEmpty())
    <div class="container">
        <div class="trip-guide-wrapper">
            <div class="trip-guide-wrapper mb-30 mt-10">
                <div class="GridLex-gap-20 GridLex-gap-15-mdd GridLex-gap-10-xs">
                    <div class="GridLex-grid-noGutter-equalHeight">
                        @if (Auth::check())
                            <input type="hidden" id="user_login" value="{{ Auth::user()->id }}">
                        @endif
                        @foreach($plans as $plan)
                        <div class="GridLex-col-4_mdd-4_sm-6_xs-6_xss-12">
                            <div class="trip-guide-item">
                                <div class="trip-guide-content">
                                    <h3>{{ $plan->title }}</h3>
                                    <p>{{ $plan->summary }}</p>
                                </div>
                                <div class="trip-guide-bottom">
                                    <div class="trip-guide-person clearfix">
                                        <div class="image">
                                            <img src="{{ $plan->user->avatar }}" class="img-circle" alt="images" />
                                        </div>
                                        <p class="name">{{ trans('view.by') }}: <a href="">{{ $plan->user->name }}</a></p>
                                    </div>
                                    <div class="trip-guide-meta row gap-10">
                                        <div class="col-xs-6 col-sm-6">
                                            <div class="rating-item">
                                                <div class="my-rating" id="{{ 'rate_' . $plan->id }}" value="{{ $plan->rate }}"></div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row gap-10">
                                        <div class="col-xs-12 col-sm-6">
                                            <div class="trip-guide-price">
                                                <div class="col-md-6 no-padding">
                                                    <p class="col-md-2 no-padding">{{ trans('view.reviews') }}</p>
                                                    <p class="pull-right" id="{{ 'total_review_' . $plan->id }}">
                                                        {{ $plan->reviews_count }}
                                                    </p>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-xs-12 col-sm-6 text-right text-left-xs">
                                            <a href="{{ route('plan.show', $plan->id) }}" class="btn btn-primary">{{ trans('view.view') }}</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>
            </div>
            <div class="pager-wrappper clearfix">
                <div class="pager-innner">
                    <div class="clearfix">
                        <div id="ajax">
                            {{ $plans->links() }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@else
    <div class="text-center">{{ trans('view.not_found_lucky') }}</div>
@endif
