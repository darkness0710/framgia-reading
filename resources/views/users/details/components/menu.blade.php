<div class="col-xs-12 col-md-3 mt-20">
	<aside class="sidebar-wrapper pr-15 pr-0-xs">
		<div class="common-menu-wrapper">
			<ul class="common-menu-list">
				<li class="active">
					<a href="#">{{ trans('dashboard-messages.dashboard') }}</a>
				</li>
				<li>
					<a href="#">{{ trans('dashboard-messages.edit_profile') }}</a>
				</li>
				<li>
					<a href="#">{{ trans('dashboard-messages.my_plans') }}</a>
				</li>
				<li>
					<a href="#">{{ trans('dashboard-messages.change_password') }}</a>
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