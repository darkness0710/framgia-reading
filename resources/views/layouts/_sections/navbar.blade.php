@include('users._modal.login')
@include('users._modal.register')
@include('users._modal.forget')

<nav class="navbar navbar-default navbar-fixed-top navbar-sticky-function navbar-arrow">
    <div class="container">
        <div class="logo-wrapper">
            <div class="logo">
                <a href="#"><img src="images/logo-white.png" alt="Logo" /></a>
            </div>
        </div>
        <div id="navbar" class="navbar-nav-wrapper">
            <ul class="nav navbar-nav navbar-left" id="responsive-menu">
                <li>
                    <a href="#">{{ trans('view.home') }}</a>
                </li>
                <li>
                    <a href="#">{{ trans('view.about_us') }}</a>
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
            <ul class="nav-mini">
                <li>
                    @if(Auth::user())
                        <a href="{{ route('logout') }}"
                            onclick="event.preventDefault();
                            document.getElementById('logout-form').submit();">
                            <i class="fa fa-sign-out" data-placement="bottom" title="{{ trans('view.account') }}"></i>
                            Logout
                        </a>

                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                            {{ csrf_field() }}
                        </form>
                    @else
                        <a data-toggle="modal" data-target="#registerModal">
                            <i class="icon-user-follow" data-placement="bottom" title="{{ trans('view.account') }}"></i>
                        </a>
                        <a data-toggle="modal" data-target="#loginModal">
                            <i class="fa fa-sign-in" data-placement="bottom" title="{{ trans('view.account') }}"></i>
                        </a>
                    @endif
                </li>
            </ul>
        </div>
    </div>
    <div id="slicknav-mobile"></div>
</nav>
