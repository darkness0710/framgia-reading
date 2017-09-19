@extends('layouts.master')

@section('title', trans('dashboard-messages.dashboard'))

@section('styles')
	{{ Html::style('css/bootsnip-timeline.css') }}
@endsection

@section('content')
	@include('users.details.user_profile_wrapper')

	<div class="pt-30 pb-50">
		<div class="container">
			<div class="row">   
				@yield('container')
			</div>
		</div>
	</div>

@endsection
