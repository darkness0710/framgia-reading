<div class="user-profile-wrapper">
    <div class="user-header">
        <div class="content">
            <div class="content-top container">
                <div class="container">
                    <div class="inner-top">
                        <img src="{{ Auth::user()->avatar }}" alt="image" class="image avatar height-170" />
                        <div class="GridLex-gap-20">
                            <div class="GridLex-grid-noGutter-equalHeight GirdLex-grid-bottom">
                                <div class="GridLex-col-7_sm-12_xs-12_xss-12">
                                    <div class="GridLex-inner">
                                        <div class="heading clearfix">
                                            <h3>{{ $user->name }}</h3>
                                        </div>
                                        <ul class="user-meta">
                                            <li>
                                                <i class="fa fa-map-marker"></i> {{ $user->address }} 
                                                <span class="mh-5 text-muted">|</span>
                                                <i class="fa fa-phone"></i>
                                                {{ $user->phone }}
                                            </li>
                                            <li>
                                                <div class="user-social inline-block">
                                                    <a href="#"><i class="icon-social-facebook" data-toggle="tooltip" data-placement="top" title="facebook"></i></a>

                                                    <a href="#"><i class="icon-social-gplus" data-toggle="tooltip" data-placement="top" title="google-plus"></i></a>
                                                </div>
                                                <a href="#" class="btn btn-primary btn-xs btn-border">
                                                    {{ trans('dashboard-messages.follow') }}
                                                </a>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                                
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            
            <div class="content-bottom">
                <div class="container">
                    <div class="inner-bottom">
                        <ul class="user-header-menu">
                            <li>
                                <a href="#">
                                    {{ trans('dashboard-messages.profile') }}
                                </a>
                            </li>
                            <li>
                                <a href="{{ action('Web\UserController@showPlans', [
                                    'id' => $user->id,
                                ]) }}">
                                    {{ trans('dashboard-messages.plans') }}
                                </a>
                            </li>
                            @if(Auth::check())
                                <li>
                                    <a href="#">{{ trans('dashboard-messages.dashboard') }}</a>
                                </li>
                            @endif
                        </ul>       
                    </div>          
                </div>          
            </div>
        </div>
    </div>          
</div>
