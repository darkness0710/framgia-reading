
<div class="container mt-20">
    <div class="icon ml-15">
        <i class="ri ri-location"></i>{{ trans('view.hot_plans') }}
    </div>
    <div class="trip-guide-wrapper mb-30 mt-10">
        <div class="GridLex-gap-20 GridLex-gap-15-mdd GridLex-gap-10-xs">
            <div class="GridLex-grid-noGutter-equalHeight">
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
                                    <img src="images/5.png" class="img-circle" alt="images" />
                                </div>
                                <p class="name">{{ trans('view.by') }}: <a href="#">{{ $plan->user->name }}</a></p>
                            </div>
                            <div class="trip-guide-meta row gap-10">
                                <div class="col-xs-6 col-sm-6">
                                    <div class="rating-item">
                                        <input type="hidden" class="rating" data-filled="fa fa-star rating-rated" data-empty="fa fa-star-o" data-fractions="2" data-readonly value="4.5"/>
                                    </div>
                                </div>
                            </div>
                            <div class="row gap-10">
                                <div class="col-xs-12 col-sm-6">
                                    <div class="trip-guide-price">
                                        {{ trans('view.rate') }}: {{ $plan->rate }}
                                        <p class="block inline-block-xs">{{ $plan->reviews_count }} {{ trans('view.reviews') }}</p>
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
    <div class="codrops-demos-mt mt-20">
        <div class="text-center">
            <nav class="codrops-demos">
                <a class="current-demo" href="#">{{ trans('view.view_more') }}</a>
            </nav>
        </div>
    </div>
</div>
