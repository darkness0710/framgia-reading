@include('users._modal.login')
@include('users._modal.register')
@include('users._modal.forget')

<nav class="navbar navbar-default navbar-fixed-top navbar-sticky-function navbar-arrow">
    <div class="container">
        <div class="logo-wrapper">
            <div class="logo">
                <a href="{{ route('home') }}"><img src="{{ url('images/logo-white.png') }}" alt="Logo" /></a>
            </div>
        </div>
        <div id="navbar" class="navbar-nav-wrapper">
            <ul class="nav navbar-nav navbar-left" id="responsive-menu">
                <li>
                    <a href="{{ route('home') }}">{{ trans('view.home') }}</a>
                </li>
                <li>
                    <a href="#">{{ trans('view.pages') }} <b class="caret"></b></a>
                    <ul>
                        <li>
                            <a href="{{ route('plan.index') }}">
                                <i class="fa fa-paper-plane" aria-hidden="true"></i> {{ trans('view.page_plans') }}
                            </a>
                        </li>
                        <li>
                            <a href="{{ route('book.index') }}">
                                <i class="fa fa-book" aria-hidden="true"></i> {{ trans('view.page_books') }}
                            </a>
                        </li>
                        <li>
                            <a href="{{ route('subject.index') }}">
                                <i class="fa fa-star-o" aria-hidden="true"></i> {{ trans('view.page_subjects') }}
                            </a>
                        </li>
                        <li>
                            <a href="{{ route('user.index') }}">
                                <i class="fa fa-user" aria-hidden="true"></i> {{ trans('view.page_users') }}
                            </a>
                        </li>
                    </ul>
                </li>
                <li id="cartAjax">
                    @include('carts.show')
                </li>
            </ul>
            <ul class="nav navbar-nav navbar-right" id="responsive-menu">
                <div class="form-group">
                    <input type="text" placeholder="{{ trans('view.look') }}" class="form-control" size="50" id="search">
                </div>
            </ul>
            <ul id="search-result" >
            </ul>
        </div>
        <!--/.nav-collapse -->
        <div class="nav-mini-wrapper">
            <ul class="margin-left-120">
                <li>
                    @if(Auth::user())    
                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                                <img src="{{ Auth::user()->avatar }}" class="thumb"/>
                            </a>
                            <ul class="dropdown-menu dropdown-menu-right">
                                <li>
                                    <a class="normal" href="{{ route('user.dashboard', Auth::user()->id) }}">
                                        <i class="fa fa-tachometer" aria-hidden="true"></i>
                                        {{ trans('view.dashboard') }}
                                    </a>
                                </li>
                                <li>
                                    <a class="normal" href="{{ route('plan.create') }}">
                                        <i class="fa fa-plus" aria-hidden="true"></i>
                                        {{ trans('view.create_plan') }}
                                    </a>
                                </li>
                                @if(Auth::user()->isAdmin())
                                    <li>
                                        <a class="normal" href="{{ route('admin.dashboard', Auth::user()->id) }}">
                                            <i class="fa fa-cog" aria-hidden="true"></i>
                                            {{ trans('view.admin') }}
                                        </a>
                                    </li>
                                 @endif
                                <li>
                                    <a href="{{ route('logout') }}"
                                        class="normal"
                                        onclick="event.preventDefault();
                                        document.getElementById('logout-form').submit();">
                                        <i class="fa fa-sign-out" aria-hidden="true"></i>
                                        {{ trans('view.logout') }}
                                    </a>
                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        {{ csrf_field() }}
                                    </form>
                                </li>
                            </ul>
                        </li>
                    @else
                        <li class="white-text">
                            <a data-toggle="modal" data-target="#registerModal"
                                class="white-text">
                                <i class="icon-user-follow" data-placement="bottom" title="{{ trans('view.account') }}"></i>
                            </a>
                            <a data-toggle="modal" data-target="#loginModal"
                                class="white-text">
                                <i class="fa fa-sign-in" data-placement="bottom" title="{{ trans('view.account') }}"></i>
                            </a>
                        </li>
                    @endif
                </li>
            </ul>
        </div>
    </div>
    <div id="slicknav-mobile"></div>
</nav>
