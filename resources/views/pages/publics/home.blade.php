@extends( 'layouts.public' )
@section( 'content' )

	<div class="page-content">
		<div class="home-slider">
			<div class="slider-item">
				<div class="getImg">
					<img src="{{ url( 'assets/img/sliders/01.png' ) }}" alt="Careers in Metro" />
				</div>
			</div>
			<div class="slider-item">
				<div class="getImg">
					<img src="{{ url( 'assets/img/sliders/02.png' ) }}" alt="Careers in Metro" />
				</div>
			</div>
			<div class="slider-item">
				<div class="getImg">
					<img src="{{ url( 'assets/img/sliders/03.png' ) }}" alt="Careers in Metro" />
				</div>
			</div>
		</div> {{-- end of .home-slider --}}
		<div class="container">
			<div class="search-form row middle-xs">
				{{ Form::open( [ 'url' => url( '/' ), 'method' => 'POST', 'autocomplete' => 'off' ] ) }}
					<h1 class="form-title">Find a Job</h1>
					<div class="row middle-xs between-xs">
						<div class="search-job col-xs-12 col-md-auto has-padR">
							<input type="text" placeholder="search job title" />
						</div>
						<div class="search-location col-xs-12 col-md-auto has-padL">
							<input type="text" placeholder="search job location" />
						</div>
						<div class="btn-panel col-xs-12 col-md-1 has-padL">
							<button type="submit"><i class="fa fa-search fa-lg" aria-hidden="true"></i></button>
						</div>
					</div>
					<h1 class="job-offer">We have <span>1,000</span> job offers for you!</h1>
				{{ Form::close() }}
			</div> {{-- end of .search-form --}}
		</div>
		<div class="jobseekers-section">
			<div class="container">
				<h1 class="section-title text-xs-uppercase text-xs-center">Jobseekers</h1>
				<div class="row">
					<div class="col-xs-12 col-md-4 column-section">
						<div class="icon row middle-xs center-xs">
							<img src="{{ url( 'assets/img/icons/jobseekers/register.png' ) }}" alt="Careers in Metro" width="50" style="margin-left: 10px;" />
						</div>
						<h2 class="column-title text-xs-uppercase text-xs-center">Register</h2>
						<p class="text-xs-center">Register, Login and Create Resume to build your professional online identity.</p>
					</div>
					<div class="col-xs-12 col-md-4 column-section">
						<div class="icon row middle-xs center-xs">
							<img src="{{ url( 'assets/img/icons/jobseekers/search.png' ) }}" alt="Careers in Metro" width="40" />
						</div>
						<h2 class="column-title text-xs-uppercase text-xs-center">Search Jobs</h2>
						<p class="text-xs-center">Search jobs with Full Time and Part Time employment.</p>
					</div>
					<div class="col-xs-12 col-md-4 column-section">
						<div class="icon row middle-xs center-xs">
							<img src="{{ url( 'assets/img/icons/jobseekers/hired.png' ) }}" alt="Careers in Metro" width="50" />
						</div>
						<h2 class="column-title text-xs-uppercase text-xs-center">Get Hired</h2>
						<p class="text-xs-center">Get Hired by top companies in the country and share your skills with them.</p>
					</div>
				</div>
			</div>
		</div>
		<div class="employers-section">
			<div class="container">
				<h1 class="section-title text-xs-uppercase text-xs-center">Employers</h1>
				<div class="row">
					<div class="col-xs-12 col-md-4 column-section">
						<div class="icon row middle-xs center-xs">
							<img src="{{ url( 'assets/img/icons/employers/register.png' ) }}" alt="Careers in Metro" width="50" style="margin-left: 10px;" />
						</div>
						<h2 class="column-title text-xs-uppercase text-xs-center">Register</h2>
						<p class="text-xs-center">Register and Login your company details to build your online identity.</p>
					</div>
					<div class="col-xs-12 col-md-4 column-section">
						<div class="icon row middle-xs center-xs">
							<img src="{{ url( 'assets/img/icons/employers/jobs.png' ) }}" alt="Careers in Metro" width="45" />
						</div>
						<h2 class="column-title text-xs-uppercase text-xs-center">Post a Job</h2>
						<p class="text-xs-center">Create ads of your jobs hiring to notice that you need skilled employees.</p>
					</div>
					<div class="col-xs-12 col-md-4 column-section">
						<div class="icon row middle-xs center-xs">
							<img src="{{ url( 'assets/img/icons/employers/hired.png' ) }}" alt="Careers in Metro" width="50" />
						</div>
						<h2 class="column-title text-xs-uppercase text-xs-center">Hire Employees</h2>
						<p class="text-xs-center">Once you posted your jobs hiring, hire someone who passed your job requirements.</p>
					</div>
				</div>
			</div>
		</div>
	</div> {{-- end of .page-content --}}

	{{-- modals --}}
	@include( 'includes.modals.signup' )
	@include( 'includes.modals.login' )

@stop

@section( 'inner-styles' )
	<link rel="stylesheet" href="{{ url( 'assets/plugins/css/slick.css' ) }}">
@stop

@section( 'inner-scripts' )

	<script src="{{ url( 'assets/plugins/js/slick.js' ) }}"></script>
	<script>
		$( document ).ready( function() {
			$( '.home-slider' ).slick({
				accessibility 	: false,
				autoplay 		: true,
				arrows 			: false,
				draggable 		: false,
				pauseOnFocus 	: false,
				pauseOnHover 	: false,
				swipe 			: false,
				touchMove 		: false
			});

			$( '#main-header' ).sticky({
				topSpacing: 0
			});
		})
	</script>
@stop

