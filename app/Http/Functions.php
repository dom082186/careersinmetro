<?php
	require_once('smtp/class.phpmailer.php');

	#check if user is logged in
	function is_user_logged_in() {
		if ( Auth::check() ) {
			return true;
		}
		return false;
	}

	#getting users email
	function get_user_email( $id = NULL ) {
		if ( $id != NULL ) {
			return DB::table( 'users' )->where( 'id', $id )->value( 'email' );
		}
	}

	#getting users role
	function get_user_role( $id = NULL ) {
		if ( $id != NULL ) {
			return DB::table( 'users' )->where( 'id', $id )->value( 'role' );
		}
	}

	#getting users avatar
	function get_user_avatar( $id = NULL ) {
		if ( $id != NULL ) {
			return DB::table( 'users' )->where( 'id', $id )->value( 'user_avatar' );
		}
	}

	#getting users slug
	function get_user_slug( $id = NULL ) {
		if ( $id != NULL ) {
			return DB::table( 'users' )->where( 'id', $id )->value( 'user_slug' );
		}
	}

	#getting users alerts
	function get_user_alerts( $id = NULL ) {
		if ( $id != NULL ) {
			return DB::table( 'users' )->where( 'id', $id )->value( 'user_alerts' );
		}
	}

	#getting users date
	function get_user_date( $id = NULL ) {
		if ( $id != NULL ) {
			return DB::table( 'users' )->where( 'id', $id )->value( 'created_at' );
		}
	}
	
	#sending smtp email function
	if ( !function_exists( 'send_email' ) ) {
		function send_email( $name= NULL, $email = NULL, $content_body = NULL, $subject = 'CareersinMetro Mailer', $bcc = NULL, $settings = NULL ) {
			if ( $email != NULL ) {

				$mail = new PHPMailer();
				$mail->IsSMTP();

				// enable SMTP authentication
				$mail->SMTPAuth = ( isset( $settings[ 'SMTPAuth' ] ) ? $settings[ 'SMTPAuth' ] : true );

				// sets the prefix to the server
				$mail->SMTPSecure = ( isset( $settings[ 'SMTPSecure' ] ) ? $settings[ 'SMTPSecure' ] : 'ssl' );

				// sets GMAIL as the SMTP server
				$mail->Host = ( isset( $settings[ 'Host' ] ) ? $settings[ 'Host' ] : 'smtp.gmail.com' );

				// set the SMTP port
				$mail->Port = ( isset($settings[ 'Port' ] ) ? $settings[ 'Port' ] : 465 );

				// GMAIL username
				$mail->Username = ( isset( $settings[ 'Username' ] ) ? $settings[ 'Username' ] : 'careersinmetro@gmail.com' );

				// GMAIL password
				$mail->Password   = ( isset( $settings[ 'Password' ] ) ? $settings[ 'Password' ] : '!careersinmetro011417!' );
				$mail->From       = ( isset( $settings[ 'From' ] ) ? $settings[ 'From' ] : 'careersinmetro@gmail.com' );
				$mail->FromName   = ( isset( $settings[ 'FromName' ] ) ? $settings[ 'FromName' ] : 'Careers in Metro' );
				$mail->Subject    = $subject;

				// set word wrap
				$mail->WordWrap   = 70;

				//$email_logo = assets_folder('img','bbqhouse-logo.png');
				$logo_url = url('/');
				include('smtp/email-template.php');
				$mail->Body       = $message;

				$mail->AddAddress( $email, ( $name != NULL ? $name : $email ) );

				if ($bcc != NULL) {
					if (is_array($bcc)) {
						foreach ($bcc as $key => $value) {
							$mail->AddBCC( $value, '' );
						}
					}
					else{
						$mail->AddBCC( $bcc, '' );  
					}
				}

				$mail->IsHTML(true);     
				if(!$mail->Send()){
					return $mail->ErrorInfo;
				}

				return true;

			}
			return false; 
		}
	}