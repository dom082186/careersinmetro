@extends( 'layouts.dashboard' )
@section( 'content' )

	<div class="content-details">
		{{ Form::open([ 'url' => url( 'jobseekers/dashboard/resume' ), 'method' => 'POST', 'autocomplete' => 'off', 'id' => 'resume-form' ] ) }}
			<div class="row">
				<div class="col-xs-12 col-md-8 has-padR">
					<div class="box">
						<div class="box-header">
							<div class="box-title row middle-xs">
								<div class="icon"><i class="fa fa-user" aria-hidden="true"></i></div>
								<div class="text text-xs-uppercase">About Me</div>
							</div>
						</div>
						<div class="box-content resume-fields">
							<div class="row">
								<div class="col-xs-12 col-md-4 has-padR">
									<div class="form-group">
										<label for="first_name" class="required">First Name</label>
										<input type="text" name="first_name" class="input-field" />
									</div>
								</div>
								<div class="col-xs-12 col-md-4">
									<div class="form-group">
										<label for="last_name" class="required">Last Name</label>
										<input type="text" name="last_name" class="input-field" />
									</div>
								</div>
								<div class="col-xs-12 col-md-4 has-padL">
									<div class="form-group">
										<label for="middle_name" class="required">Middle Name</label>
										<input type="text" name="middle_name" class="input-field" />
									</div>
								</div>
							</div>
							<div class="row">
								<div class="col-xs-12 col-md-6 has-padR">
									<div class="form-group">
										<label for="dob" class="required">Date of Birth</label>
										<input type="text" name="dob" class="input-field has-calendar" />
									</div>
								</div>
								<div class="col-xs-12 col-md-6 has-padL">
									<div class="form-group">
										<label for="gender" class="required">Gender</label>
										<input type="text" name="gender" class="input-field" />
										<div class="dropdown-list">
											<ul>
												<li>Male</li>
												<li>Female</li>
											</ul>
										</div>
									</div>
								</div>
							</div>
							<div class="row">
								<div class="col-xs-12 col-md-4 has-padR">
									<div class="form-group">
										<label for="cc_mobile">Country Code</label>
										<input type="text" name="cc_mobile_show" class="input-field" />
										<input type="hidden" name="cc_mobile" value="" />
										<div class="dropdown-list get-value">
											<ul>
												<li data-value="+63">+63(Philippines)</li>
											</ul>
										</div>
									</div>
								</div>
								<div class="col-xs-12 col-md-8 has-padL">
									<div class="form-group">
										<label for="mobile_phone">Mobile Phone</label>
										<input type="text" name="mobile_phone" class="phone input-field" />
									</div>
								</div>
							</div>
							<div class="row">
								<div class="col-xs-12 col-md-3 has-padR">
									<div class="form-group">
										<label for="cc_landline">Country Code</label>
										<input type="text" name="cc_landline_show" class="input-field" />
										<input type="hidden" name="cc_landline" value="" />
										<div class="dropdown-list get-value">
											<ul>
												<li data-value="+63">+63(Philippines)</li>
											</ul>
										</div>
									</div>
								</div>
								<div class="col-xs-12 col-md-3">
									<div class="form-group">
										<label for="ac_landline">Area Code</label>
										<input type="text" name="ac_landline" class="input-field" />
									</div>
								</div>
								<div class="col-xs-12 col-md-6 has-padL">
									<div class="form-group">
										<label for="landline_phone">Landline Phone</label>
										<input type="text" name="landline_phone" class="phone input-field" />
									</div>
								</div>
							</div>
							<div class="row">
								<div class="col-xs-12">
									<div class="form-group">
										<label for="address">Address</label>
										<input type="text" name="address" class="input-field" />
									</div>
								</div>
							</div>
							<div class="row">
								<div class="col-xs-12 col-md-6 has-padR">
									<div class="form-group">
										<label for="province" class="required">Province</label>
										<input type="text" name="province" class="input-field" />
									</div>
								</div>
								<div class="col-xs-12 col-md-6 had-padL">
									<div class="form-group">
										<label for="region" class="required">Region</label>
										<input type="text" name="region" class="input-field" />
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
				<div class="col-xs-12 col-md-4 has-padL">
					<div class="box">
						<div class="box-header">
							<div class="box-title row middle-xs">
								<div class="icon"><i class="fa fa-picture-o" aria-hidden="true"></i></div>
								<div class="text text-xs-uppercase">Avatar</div>
							</div>
						</div>
						<div class="box-content">
							<div class="form-group">
								<div class="upload-photo row middle-xs direction-column-xs">
									<div class="preview row middle-xs center-xs" style="background-image: url( {{ url( 'public/img/' ) . '/' . Auth::user()->user_avatar }} );">
										<h3 class="text-xs-uppercase text-xs-center">Photo<br/>Preview</h3>
									</div>
									<div class="upload-file">
										<label for="avatar_upload" class="text-xs-center text-xs-uppercase">Choose File</label>
										<input type="file" name="avatar_upload" onchange="readUrl(this)" />
									</div>
									<div class="note">
										<div>File must be in <strong>JPEG, PNG, GIF</strong></div>
										<div>Recommended dimension of photo: <strong>192 xs 192 pixels</strong></div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
			<div class="row">
				<div class="col-xs-12 col-md-6">
					<div class="box">
						<div class="box-header">
							<div class="box-title row middle-xs">
								<div class="icon"><i class="fa fa-briefcase" aria-hidden="true"></i></div>
								<div class="text text-xs-uppercase">Working Details</div>
							</div>
						</div>
						<div class="box-content resume-fields">
							<div class="row">
								<div class="col-xs-12">
									<div class="form-group">
										<label for="why_hire_me" class="required">Why They Should Hire You</label>
										<textarea name="why_hire_me" class="input-field"></textarea>
									</div>
								</div>
								<div class="col-xs-12">
									<div class="form-group">
										<label for="apply_position" class="required">Position You Want To Apply</label>
										<input type="text" name="apply_position" class="input-field" />
									</div>
								</div>
								<div class="col-xs-12">
									<div class="form-group">
										<label for="position_industry" class="required">Company Industry</label>
										<input type="text" name="position_industry" class="input-field has-search" />
										@include( 'includes.lists.job-categories' )
									</div>
								</div>
								<div class="col-xs-12">
									<div class="form-group">
										<label for="preferred_location" class="required">Preferred Location</label>
										<input type="text" name="preferred_location" class="input-field has-search" />
										@include( 'includes.lists.regions' )
									</div>
								</div>
								<div class="col-xs-12">
									<div class="form-group">
										<label for="expected_salary" class="required">Expected Salary</label>
										<input type="text" name="expected_salary" class="input-field salary" />
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
			<div class="btn-float">
				<button type="submit" class="btn"><i class="fa fa-floppy-o fa-2x" aria-hidden="true"></i></button>
			</div>
		{{ Form::close() }}
	</div>

@stop

@section( 'inner-styles' )
@stop

@section( 'inner-scripts' )
	
	<script src="{{ url( 'assets/plugins/js/autoresize.js' ) }}"></script>
	<script>
			function readUrl( input ) {
				$( '.preview' ).prepend( '<div class="delete"><i class="fa fa-times" aria-hidden="true"></i></div>' );
				if (input.files && input.files[0]) {
		            var reader = new FileReader();

		            reader.onload = function (e) {
		                $( '.preview' ).attr( 'style', 'background-image: url(' + e.target.result + ')' ).addClass( 'has-image' );
		            };

		            reader.readAsDataURL(input.files[0]);
		        }
			}

			$.fn.digits = function(){ 
			    return this.each(function(){ 
			        $(this).val( $(this).val().replace(/(\d)(?=(\d\d\d)+(?!\d))/g, "$1,") ); 
			    })
			}

			$( document ).ready( function() {
				$( '.preview .delete' ).initialize( function() {
					$( this ).on( 'click', function() {
						var parent = $( this ).parent();
						parent.removeClass( 'has-image' ).attr( 'style', '' );
						$( this ).remove();
						$( 'input[name=avatar_upload]' ).val( '' );
					});
				});

				$( '.phone' ).on( 'change', function() {
					var value = $( this ).val();
				    value = value.replace(/^(0*)/,"");
				    $( this ).val(value);
				});

				$( 'textarea' ).initialize( function() {
					$( this ).autosize({append: "\n"});
				});

				$( '.salary' ).on( 'change', function() {
					$( this ).val( $( this ).val().replace( /(\d)(?=(\d\d\d)+(?!\d))/g, '$1,' ) );
				})
			});
	</script>

@stop