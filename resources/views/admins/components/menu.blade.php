<div class="col-xs-12 col-md-3 mt-20">
    <aside class="sidebar-wrapper pr-15 pr-0-xs">
        <div class="common-menu-wrapper">
            <ul class="common-menu-list">
                <li id="admin_dashboard">
                    <a href="{{ route('admin.dashboard', $user->id) }}">
                        <i class="fa fa-tachometer" aria-hidden="true"></i> {{ trans('dashboard-messages.admin_dashboard') }}
                    </a>
                </li>
                <li id="admin_subjects">
                    <a href="{{ route('admin.subject', $user->id) }}">
                        <i class="fa fa-university " aria-hidden="true"></i> {{ trans('view.manage_subjects') }}
                    </a>
                </li> 
                <li id="admin_categories">
                    <a href="{{ route('admin.category', $user->id) }}">
                        <i class="fa fa-slack" aria-hidden="true"></i> {{ trans('view.manage_categories') }}
                    </a>
                </li>
                <li id="admin_users">
                    <a href="{{ route('admin.user', $user->id) }}">
                        <i class="fa fa-user" aria-hidden="true"></i> {{ trans('view.manage_users') }}
                    </a>
                </li>
                <li id="admin_books">
                    <a href="{{ route('admin.book', $user->id) }}">
                        <i class="fa fa-book" aria-hidden="true"></i> {{ trans('view.manage_books') }}
                    </a>
                </li>
                <li id="admin_trash">
                    <a href="#">
                        <i class="fa fa-trash" aria-hidden="true"></i> {{ trans('view.trash') }}
                    </a>
                </li>
                <li>
                    <a href="{{ route('logout') }}" class="normal" id="btn_logout">
                        <i class="fa fa-sign-out" aria-hidden="true"></i> {{ trans('dashboard-messages.logout') }}
                    </a>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="sm-clear">
                        {{ csrf_field() }}
                    </form> 
                </li>
            </ul>
        </div>
    </aside>
</div>
