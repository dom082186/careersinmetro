<div id="signup-modal" class="modal-area">
	<div class="content-area row middle-xs center-xs">
		<div class="content-form">
			<div class="progress-bar">
				<div class="colored-bar"></div>
			</div>
			{{ Form::open([ 'url' => url( '/signup' ), 'method' => 'POST', 'autocomplete' => 'off', 'id' => 'signUp-form' ]) }}
				<div class="close-modal"><i class="fa fa-times fa-lg" aria-hidden="true"></i></div>
				<div class="form-header">
					<h3 class="text-xs-uppercase">Sign Up</h3>
				</div> {{-- end of .form-header --}}
				<div class="form-content">
					<div class="alert-message"></div>
					<div class="form-group">
						<label for="email" class="required">Email Address</label>
						<input type="email" name="email" class="input-field required" />
					</div>
					<div class="form-group">
						<label for="user_role" class="required">Looking...</label>
						<input type="text" name="looking" class="input-field" />
						<input type="hidden" name="role" value="" />
						<div class="dropdown-list get-value">
							<ul>
								<li data-value="jobseeker">for a job...</li>
								<li data-value="employer">someone to hire...</li>
							</ul>
						</div>
					</div>
				</div> {{-- end of .form-content --}}
				<div class="msg-panel">
					<p><a href="#login-modal" class="show-modal">Already have an account?</a></p>
				</div>
				<div class="btn-panel">
					<button type="submit">Sign Up</button>
				</div>
			{{ Form::close() }}
		</div>
	</div> {{-- end of .content-area --}}
</div> {{-- end of .modal-area --}}