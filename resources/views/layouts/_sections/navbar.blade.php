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
            <ul class="nav navbar-nav" id="responsive-menu">
                <li>
                    <a href="#">{{ trans('view.home') }}</a>
                </li>
                <li>
                    <a href="#">{{ trans('view.about_us') }}</a>
                </li>
            </ul>
        </div>
        <!--/.nav-collapse -->
        <div class="nav-mini-wrapper">
            <ul class="nav-mini">
                <li>
                    <a data-toggle="modal" data-target="#registerModal"><i class="icon-user-follow" data-placement="bottom" title="{{ trans('view.account') }}"></i></a>
                    <a data-toggle="modal" data-target="#loginModal"><i class="icon-login" data-placement="bottom" title="{{ trans('view.account') }}"></i></a>
                </li>
            </ul>
        </div>
    </div>
    <div id="slicknav-mobile"></div>
</nav>
