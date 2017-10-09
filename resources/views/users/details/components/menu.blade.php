<div class="col-xs-12 col-md-3 mt-20">
	<aside class="sidebar-wrapper pr-15 pr-0-xs">
		<div class="common-menu-wrapper">
			<ul class="common-menu-list">
				<li id="item_dashboard">
					<a href="{{ action('Web\UserController@dashboard', [
						'id' => $user->id,
					]) }}">{{ trans('dashboard-messages.dashboard') }}</a>
				</li>
				<li id="item_edit_profile">
					<a href="{{ action('Web\UserController@editProfile', [
						'id' => $user->id,
					]) }}">{{ trans('dashboard-messages.edit_profile') }}</a>
				</li>
				<li id="item_my_plans">
					<a href="{{ route('user.personal-plan', $user->id) }}">{{ trans('dashboard-messages.my_plans') }}</a>
				</li>
				<li id="item_change_password">
					<a href="{{ action('Web\UserController@editPassword', [
						'id' => $user->id,
					]) }}">{{ trans('dashboard-messages.change_password') }}</a>
				</li>
				<li>
					<a href="{{ route('logout') }}" class="normal" id="btn_logout">{{ trans('dashboard-messages.logout') }}</a>
					<form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
						{{ csrf_field() }}
					</form>
				</li>
			</ul>
		</div>
	</aside>
</div>
