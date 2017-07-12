<footer id="main-footer">
	<div class="container">
		<div class="row">
			<div class="col-xs-12 col-md-6 has-padR">
				<div class="row">
					<div class="col-xs-12 col-md-6 has-padR">
						<div class="column-title text-xs-uppercase">Jobseekers</div>
						<ul class="footer-links">
							<li><a href="#">Find a Job</a></li>
							<li><a href="#">Find a Company</a></li>
						</ul>
					</div>
					<div class="col-xs-12 col-md-6 has-padL">
						<div class="column-title text-xs-uppercase">Employers</div>
						<ul class="footer-links">
							<li><a href="#">Find Jobseeker</a></li>
						</ul>
					</div>
				</div>
			</div>
			<div class="col-xs-12 col-md-6 has-padL">
				<div class="column-title text-xs-uppercase">Contact Us</div>
				<div class="footer-form">
					{{ Form::open([ 'url' => url( 'contact-us' ), 'method' => 'POST', 'autocomplete' => 'off', 'contactUs-form' ]) }}
						<div class="alert-message"></div>
						<div class="form-group">
							<label for="sender_name">Name</label>
							<input type="text" name="sender_name" />
						</div>
						<div class="form-group">
							<label for="sender_email">Email Address</label>
							<input type="email" name="sender_email" />
						</div>
						<div class="form-group">
							<label for="sender_message">Message</label>
							<textarea name="sender_message"></textarea>
						</div>
						<div class="btn-panel">
							<button type="submit">Send</button>
						</div>
					{{ Form::close() }}
				</div>
			</div>
		</div>
		<hr />
		<div class="social-links">
			<div class="title text-xs-center text-xs-uppercase">Follow Us</div>
			<ul class="row middle-xs center-xs">
				<li>
					<a href="#" class="row middle-xs center-xs"><i class="fa fa-facebook" aria-hidden="true"></i></a>
				</li>
				<li>
					<a href="#" class="row middle-xs center-xs"><i class="fa fa-twitter" aria-hidden="true"></i></a>
				</li>
				<li>
					<a href="#" class="row middle-xs center-xs"><i class="fa fa-instagram" aria-hidden="true"></i></a>
				</li>
			</ul>
		</div>
		<div class="copyright text-xs-center">&copy; {{ date( 'Y' ) }} Careers in Metro, All Rights Reserved.</div>
	</div>
</footer>