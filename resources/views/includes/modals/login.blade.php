<div id="login-modal" class="modal-area">
	<div class="content-area row middle-xs center-xs">
		<div class="content-form">
			<div class="progress-bar">
				<div class="colored-bar"></div>
			</div>
			{{ Form::open([ 'url' => url( '/login' ), 'method' => 'POST', 'autocomplete' => 'off', 'id' => 'login-form' ] ) }}
				<input type="hidden" name="current_url" value="{{ $uri  }}" />
				<div class="close-modal"><i class="fa fa-times fa-lg" aria-hidden="true"></i></div>
				<div class="form-header">
					<h3 class="text-xs-uppercase">Login</h3>
				</div> {{-- end of .form-header --}}
				<div class="form-content">
					<div class="alert-message"></div>
					<div class="form-group">
						<label for="email" class="required">Email Address</label>
						<input type="email" name="email" class="input-field" />
					</div>
					<div class="form-group">
						<label for="password" class="required">Password</label>
						<input type="password" name="password" class="input-field" />
					</div>
				</div> {{-- end of .form-content --}}
				<div class="msg-panel row middle-xs between-xs">
					<p><a href="#signup-modal" class="show-modal">Not a member yet?</a></p>
					<p><a href="#lost-password-modal" class="show-modal">Lost password?</a></p>
				</div>
				<div class="btn-panel">
					<button type="submit">Login</button>
				</div>
			{{ Form::close() }}
		</div> {{-- end of .content-form --}}
	</div> {{-- end of .content-area --}}
</div> {{-- end of .modal-area --}}