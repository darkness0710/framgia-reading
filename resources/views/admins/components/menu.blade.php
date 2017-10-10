<div class="col-xs-12 col-md-3 mt-20">
    <aside class="sidebar-wrapper pr-15 pr-0-xs">
        <div class="common-menu-wrapper">
            <ul class="common-menu-list">
                <li id="item_dashboard">
                    <a href="{{ route('admin.dashboard', $user->id) }}">{{ trans('dashboard-messages.admin_dashboard') }}</a>
                </li>
                <li id="#">
                    <a href="{{ route('admin.subject', $user->id) }}">{{ trans('view.manage_subjects') }}</a>
                </li> 
                <li id="#">
                    <a href="{{ route('admin.category', $user->id) }}">{{ trans('view.manage_categories') }}</a>
                </li>
                <li id="#">
                    <a href="{{ route('admin.user', $user->id) }}">{{ trans('view.manage_users') }}</a>
                </li>
                <li id="#">
                    <a href="{{ route('admin.book', $user->id) }}">{{ trans('view.manage_books') }}</a>
                </li>
                <li>
                    <a href="{{ route('logout') }}" class="normal" id="btn_logout">{{ trans('dashboard-messages.logout') }}</a>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="sm-clear">
                        {{ csrf_field() }}
                    </form> 
                </li>
            </ul>
        </div>
    </aside>
</div>
