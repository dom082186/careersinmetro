<aside id="main-sidebar">
	<div class="profile-details text-xs-center">
		@if ( get_user_avatar() )
		@else
			<div class="profile-img">
				<div class="getImg default">
					<img src="{{ url( 'public/img/default.png' ) }}" />
				</div>
			</div>
			<p class="name toggle-hide">{{ get_user_email( $id ) }}</p>
			<p class="role toggle-hide">{{ ucfirst( get_user_role( $id ) ) }}</p>
			<div class="member-since toggle-hide row middle-xs center-xs">
				<div class="label">Member Since:</div>
				<div class="text">{{ date( 'M-d-Y', strtotime( get_user_date( $id ) ) ) }}</div>
			</div>
		@endif
	</div>
	<nav id="sidebar-menu">
		<ul>
			@if ( get_user_role( $id ) == 'jobseeker' )
				<li {{{ ( Request::is( 'jobseekers/dashboard/home' ) ? 'class=active' : '' ) }}}>
					<a href="{{ url( 'jobseekers/dashboard/home' ) }}" class="row middle-xs">
						<span class="icon"><i class="fa fa-home fa-lg" aria-hidden="true"></i></span>
						<span class="text toggle-hide">Home</span>
					</a>
				</li>
				<li {{{ ( Request::is( 'jobseekers/dashboard/resume' ) ? 'class=active' : '' ) }}}>
					<a href="{{ url( 'jobseekers/dashboard/resume' ) }}" class="row middle-xs">
						<span class="icon"><i class="fa fa-file-text" aria-hidden="true"></i></span>
						<span class="text toggle-hide">Resume</span>
					</a>
				</li>
				<li>
					<a href="{{ url( 'jobseekers/find-a-job' ) }}" class="row middle-xs" target="_blank">
						<span class="icon"><i class="fa fa-search" aria-hidden="true"></i></span>
						<span class="text toggle-hide">Find Jobs</span>
					</a>
				</li>
				<li {{{ ( Request::is( 'jobseekers/dashboard/job-alerts' ) ? 'class=active' : '' ) }}}>
					<a href="{{ url( 'jobseekers/dashboard/job-alerts' ) }}" class="row middle-xs">
						<span class="icon"><i class="fa fa-bell" aria-hidden="true"></i></span>
						<span class="text toggle-hide">Job Alerts</span>
					</a>
				</li>
				<li {{{ ( Request::is( 'jobseekers/dashboard/bookmarks' ) ? 'class=active' : '' ) }}}>
					<a href="{{ url( 'jobseekers/dashboard/bookmarks' ) }}" class="row middle-xs">
						<span class="icon"><i class="fa fa-bookmark" aria-hidden="true"></i></span>
						<span class="text toggle-hide">Bookmarks</span>
					</a>
				</li>
				<li {{{ ( Request::is( 'jobseekers/dashboard/messages' ) ? 'class=active' : '' ) }}}>
					<a href="{{ url( 'jobseekers/dashboard/messages' ) }}" class="row middle-xs">
						<span class="icon"><i class="fa fa-comment" aria-hidden="true"></i></span>
						<span class="text toggle-hide">Messages</span>
					</a>
				</li>
				<li {{{ ( Request::is( 'jobseekers/dashboard/account-settings' ) ? 'class=active' : '' ) }}}>
					<a href="{{ url( 'jobseekers/dashboard/account-settings' ) }}" class="row middle-xs">
						<span class="icon"><i class="fa fa-cogs" aria-hidden="true"></i></span>
						<span class="text toggle-hide">Account Settings</span>
					</a>
				</li>
				<li>
					<a href="{{ url( 'logout' ) }}" class="row middle-xs">
						<span class="icon"><i class="fa fa-sign-out fa-lg" aria-hidden="true"></i></span>
						<span class="text toggle-hide">Log out</span>
					</a>
				</li>
			@elseif ( get_user_role( $id ) == 'employer' )
				
			@endif
		</ul>
	</nav>
</aside>