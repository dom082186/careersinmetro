<header id="main-header">
	<div class="container">
		<div class="row middle-xs between-xs">
			<div class="logo-container">
				<h1 class="text-xs-uppercase">Careers in Metro</h1>
				<p>Find Jobs In Your Reach</p>
			</div>
			<div class="menu-container">
				<ul class="row middle-xs">
					<li class="{{{ ( Request::is( '/' ) ? 'active' : '' ) }}}">
						<a href="{{ url( '/' ) }}">Home</a>
					</li>
					<li class="has-dropdown">
						<a href="javascript:void(0)" class="toggle-menu">Jobseekers</a>
						<div class="dropdown-menu">
							<ul>
								<li class="{{{ ( Request::is( 'find-a-job' ) ? 'active' : '' ) }}}">
									<a href="{{ url( 'find-a-job' ) }}">Find a Job</a>
								</li>
								<li>
									<a href="#">Find a Company</a>
								</li>
							</ul>
						</div>
					</li>
					<li class="has-dropdown">
						<a href="javascript:void(0)" class="toggle-menu">Employers</a>
						<div class="dropdown-menu">
							<ul>
								<li>
									<a href="#">Find Jobseeker</a>
								</li>
							</ul>
						</div>
					</li>
					@if ( is_user_logged_in() )
						<li class="has-icon">
							<a href="{{ url( get_user_role( Auth::user()->id ) . 's/dashboard/home' ) }}" class="row middle-xs">
								<span class="icon"><i class="fa fa-tachometer" aria-hidden="true"></i></span>
								<span class="text">Dashboard</span>
							</a>
						</li>
						<li class="has-icon">
							<a href="{{ url( 'logout' ) }}" class="row middle-xs">
								<span class="icon"><i class="fa fa-sign-out" aria-hidden="true"></i></span>
								<span class="text">Log out</span>
							</a>
						</li>
					@else
						<li class="has-icon">
							<a href="#signup-modal" class="show-modal row middle-xs ">
								<span class="icon"><i class="fa fa-user" aria-hidden="true"></i></span>
								<span class="text">Sign Up</span>
							</a>
						</li>
						<li class="has-icon">
							<a href="#login-modal" class="show-modal row middle-xs">
								<span class="icon"><i class="fa fa-lock" aria-hidden="true"></i></span>
								<span class="text">Login</span>
							</a>
						</li>
					@endif
				</ul>
			</div>
			<div class="menu-bar self-top-xs"><i class="fa fa-bars fa-2x" aria-hidden="true"></i></div>
		</div>
	</div>
</header> {{-- end of #main-header --}}
<div class="mobile-menu">
	<ul>
		<li class="{{{ ( Request::is( '/' ) ? 'active' : '' ) }}}">
			<a href="#">Home</a>
		</li>
		<li>
			<a href="#">Jobseekers</a>
		</li>
		<li>
			<a href="#">Employers</a>
		</li>
		<li>
			<a href="#signup-modal" class="show-modal">Sign Up</a>
		</li>
		<li>
			<a href="#login-modal" class="show-modal">Login</a>
		</li>
	</ul>
</div>