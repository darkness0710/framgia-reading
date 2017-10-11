@extends('layouts.master')

@push('scripts')
    {{ Html::script('js/jquery.star-rating-svg.js') }}
    {{ Html::script('js/show_plan_review.js') }}
@endpush

@section('styles')
    {{ Html::style('css/star-rating-svg.css') }}
@endsection

@section('title', $plan->title)
@section('content')
@include('books.review-modal')
<div class="main-wrapper scrollspy-container">
    <div class="breadcrumb-image-bg detail-breadcrumb" style="background-color:red">
        <div class="container">
            <div class="page-title detail-header">
                <div class="row">
                    <div class="col-xs-12 col-sm-10 col-sm-offset-1 col-md-8 col-md-offset-2 mb-50">
                        <h2>{{ $plan->title }}</h2>
                        <p>{{ $plan->summary }}</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="pt-50 pb-50 bg-color-white">
        <div class="container">
            <div class="row">
                <div class="col-xs-12 col-sm-8 col-md-9">
                    <div class="content-wrapper pr">
                        <div class="tab-style-01-wrapper mt-5">
                            <ul class="tab-nav mb-50">
                                <li class="active"><a href="#tab-style-01-01" data-toggle="tab">{{ trans('view.overview') }}</a></li>
                                <li><a href="#tab-style-01-03" data-toggle="tab">{{ trans('view.processRead') }}</a></li>
                                <li><a href="#tab-style-01-05" data-toggle="tab">{{ trans('view.reviews') }}</a></li>
                            </ul>
                            <div class="tab-content" >
                                <div class="tab-pane fade in active" id="tab-style-01-01">
                                    <div class="tab-inner">
                                        <h3 class="section-title">{{ trans('view.overview') }}</h3>
                                        <p class="lead">{{ $plan->description }}</p>
                                    </div>
                                </div>
                                @if (Auth::check())
                                    <input type="hidden" id="user_login" value="{{ Auth::user()->id }}">
                                @endif
                                <div class="tab-pane fade" id="tab-style-01-03">
                                    <div class="tab-inner">
                                        <h3 class="section-title font-lg">{{ trans('view.processRead') }}</h3>
                                        <div class="GridLex-gap-30">
                                            <div class="GridLex-grid-noGutter-equalHeight">
                                                <div class="GridLex-col-12_sm-12_xs-12_xss-12">
                                                    <div id="detail-content-sticky-nav-03">
                                                        <div class="itinerary-toggle-wrapper mb-40">
                                                            <div class="panel-group bootstrap-toggle">
                                                                @foreach($plan->planItems as $planItem)
                                                                <div class="panel">
                                                                    <div class="panel-heading">
                                                                        <div class="panel-title">
                                                                            <a data-toggle="collapse" data-parent="#" href="#bootstarp-toggle-one-{{ $loop->index + 1 }}">
                                                                                <div class="itinerary-day">
                                                                                    {{ trans('view.pharse') }} {{ $loop->index + 1 }}
                                                                                </div>
                                                                                <div class="itinerary-header">
                                                                                    <h4>{{ $planItem->summary }}</h4>
                                                                                    <div class="image"><img src="{{ $planItem->book->cover }}" height="86" width="86" alt="images" /></div>
                                                                                </div>
                                                                            </a>
                                                                        </div>
                                                                    </div>
                                                                    <div id="bootstarp-toggle-one-{{ $loop->index + 1 }}" class="panel-collapse collapse">
                                                                        <div class="panel-body">
                                                                            <p class="font-lg">{{ $planItem->note }}</p>
                                                                            <div class="sumi-gallery-wrapper sumi-gallery-size-sm clearfix mt-25">
                                                                                <div class="sumi-gallery-wrapper sumi-gallery-size-sm clearfix mt-20 ">
                                                                                    <img data-sgallery="group1tt" title="Book" data-thumb="" src="{{ $planItem->book->cover }}" alt="images" class="float-left">
                                                                                    <div class="inline-block mb-5 float-left">
                                                                                        <a href="{{ route('book.show', $planItem->book->id) }}" class="btn btn-primary btn-block mt-40 ml-10"> {{ trans('view.details_book') }} <i class="ion-android-arrow-forward"></i></a>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                @endforeach
                                                            </div>
                                                        </div>
                                                        <div class="mb-25"></div>
                                                        <div class="bb"></div>
                                                        <div class="mb-25"></div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="tab-pane fade" id="tab-style-01-05">
                                    <div class="tab-inner">
                                        <h3 class="section-title">{{ trans('view.reviews') }}</h3>
                                        <div class="review-wrapper">
                                            <div class="review-header">
                                                <div class="GridLex-gap-30">
                                                    <div class="GridLex-grid-noGutter-equalHeight GridLex-grid-middle">
                                                        <div class="GridLex-col-9_sm-8_xs-12_xss-12">
                                                            <div class="review-rating">
                                                                <div class="number">{{ $plan->rate }}</div>
                                                                <div class="rating-wrapper">
                                                                    <div class="rating-item rating-item-lg">
                                                                        <div class="my-rating" id="{{ 'rate_' . $plan->id }}" value="{{ $plan->rate }}"></div>
                                                                    </div>
                                                                    <p id="{{ 'total_review_' . $plan->id }}" class="col-md-2 no-padding mr-10">{{ $totalReviews }}</p> {{ trans('view.reviews_low') }}
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="GridLex-col-3_sm-4_xs-12_xss-12">
                                                            <div class="GridLex-inner">
                                                                <a href="#review-form" id="btn_review"
                                                                    class="btn btn-primary btn-block anchor">
                                                                    {{ trans('view.write_review') }}
                                                                </a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="review-content">
                                                <ul class="review-list" id="list_review">
                                                    @foreach($reviewPlans as $reviewPlan)
                                                    <li class="clearfix">
                                                        <div class="row">
                                                            <div class="col-xs-12 col-sm-4 col-md-3">
                                                                <div class="review-header">
                                                                    <h6>{{ $reviewPlan->user->name }}</h6>
                                                                    <span class="review-date"> {{ $reviewPlan->created_at }}</span>
                                                                    <div class="rating-item">
                                                                        <div class="my-rating" id="{{ 'review_' . $reviewPlan->id }}" value="{{ $reviewPlan->rate }}"></div>
                                                                    </div>
                                                                    <a href="#" class="btn btn-primary">{{ trans('view.reply') }}</a>
                                                                </div>
                                                            </div>
                                                            <div class="col-xs-12 col-sm-8 col-md-9">
                                                                <div class="review-content" id="{{ 'content_review_' . $reviewPlan->id }}">
                                                                    <p>{{ $reviewPlan->content }}</p>
                                                                </div>
                                                                @if ($reviewPlan->first()->comments->first())
                                                                    <a href="#" class="pull-right underline-on-hover">
                                                                        <i class="ion-chatboxes"></i>
                                                                        {{ trans('view.view_more_replies') }}
                                                                    </a>
                                                                @endif
                                                            </div>
                                                        </div>
                                                    </li>
                                                    @endforeach
                                                </ul>
                                                <a href="#" class="underline-on-hover">
                                                    <i class="ion-chatboxes"></i>
                                                    {{ trans('view.view_more_replies') }}
                                                </a>
                                            </div>
                                            {{-- Include form comment if logged --}}
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xs-12 col-sm-4 col-md-3">
                    <aside class="sidebar-wrapper">
                        <div class="user-item-02">
                            <div class="image">
                                <img src="{{ url('images/test.png') }}" height="86" width="86" alt="Images" />
                            </div>
                            <div class="content">
                                <h4>{{ $user->name }}</h4>
                                <div class="rating-wrapper">
                                    <div class="rating-item">
                                        <input type="hidden" class="rating" data-filled="fa fa-star rating-rated" data-empty="fa fa-star-o" data-fractions="2" data-readonly value="3.5"/>
                                    </div>
                                </div>
                            </div>
                            <div class="user-meta">
                                <ul class="clearfix">
                                    <li>
                                        <div class="meta">
                                            <span class="number">{{ $user->plans_count }}</span>
                                            {{ trans('view.plans') }}
                                        </div>
                                    </li>
                                    <li>
                                        <div class="meta">
                                            <span class="number">{{ $user->reviews_count }}</span>
                                            {{ trans('view.reviews') }}
                                        </div>
                                    </li>
                                </ul>
                            </div>
                            <div class="ph-20">
                                <a href="#" class="btn btn-primary btn-block">{{ trans('view.viewProfile') }} <i class="ion-android-arrow-forward"></i></a>
                            </div>
                        </div>
                        <a href="{{ route('fork-form', ['id' => $plan->id,]) }}" class="add-fav-btn mt-30">
                            <div class="inner">
                                <i class="ti-heart"></i> {{ trans('view.fork') }}
                            </div>
                        </a>
                    </aside>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('script')
<script type="text/javascript">
    var show_plan_review = new show_plan_review();
    show_plan_review.init({
        plan_rate: {{ $plan->rate }},
    });
</script>
@endsection
