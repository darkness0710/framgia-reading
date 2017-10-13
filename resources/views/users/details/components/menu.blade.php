
<div class="col-xs-12 col-md-3 mt-20">
	<aside class="sidebar-wrapper pr-15 pr-0-xs">
		<div class="common-menu-wrapper">
			<ul class="common-menu-list">
				<li id="user_dashboard_details">
					<a href="{{ route('user.dashboard', $user->id) }}"><i class="fa fa-tachometer" aria-hidden="true"></i> {{ trans('dashboard-messages.dashboard') }}</a>
				</li>
				<li id="user_dashboard_edit_profile">
					<a href="{{ route('user.editProfile', $user->id) }}"><i class="fa fa-edit" aria-hidden="true"></i> {{ trans('dashboard-messages.edit_profile') }}</a>
				</li>
				<li id="user_dashboard_plan">
					<a href="{{ route('user.personal-plan', $user->id) }}"><i class="fa fa-paper-plane" aria-hidden="true"></i> {{ trans('dashboard-messages.my_plans') }}</a>
				</li>
				<li id="user_dashboard_edit_password">
					<a href="{{ route('user.editPassword', $user->id) }}"><i class="fa fa-lock" aria-hidden="true"></i> {{ trans('dashboard-messages.change_password') }}</a>
				</li>
				<li>
					<a href="{{ route('logout') }}" class="normal" id="btn_logout"><i class="fa fa-sign-out" aria-hidden="true"></i> {{ trans('dashboard-messages.logout') }}</a>
					<form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
						{{ csrf_field() }}
					</form>
				</li>
			</ul>
		</div>
	</aside>
</div>
