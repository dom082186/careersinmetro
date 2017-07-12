<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Auth;
use Illuminate\Contracts\Auth\Authenticatable;
use Validator;
use DB;

class PublicController extends Controller {

	public function index( Request $request ) {
		return view( 'pages.publics.home', [
			'page_name' 	=> 'home',
			'page_title'	=> 'Home',
			'uri'			=> $request->fullUrl()
		]);
	}

	public function signup( Request $request ) {
		if ( $request->all() ) {
			$rules = array(
				'email'		=> 'required|email|unique:users,email',
				'looking'	=> 'required'
			);

			$validator = Validator::make( Input::all(), $rules );

			if ( $validator->fails() ) {
				return $validator->messages()->toJson();
			} else {
				if ( $request->ajax() ) {
					$post_arr = $request->all();
					$ver_key = md5( uniqid() );

					#unset input who's not need in db
					unset( $post_arr[ '_token' ] );
					unset( $post_arr[ 'looking' ] );

					#setting input in db
					$post_arr[ 'created_at' ] = date( 'Y-m-d H:i:s' );
					$post_arr[ 'verification_key' ] = $ver_key;

					foreach ( $post_arr as $key => $value ) {
						$insert_post[ $key ] = $value;
					}

					$default_pass = 'careersinmetro_' . uniqid();
					$current_role = ucfirst( $request->role );
					$insert_post[ 'password' ] = bcrypt( $default_pass );

					#inserting user
					DB::table( 'users' )->insertGetID( $insert_post );

					#sending email verification to the user
					$msg = '
						<p style="margin: 0 0 10px; padding: 0;"><strong style="font-size: 14px; line-height: 22px; font-weight: bold; font-family: sans-serif; display: block; margin: 0; padding: 0;">Someone uses your email for signing up in our site</strong></p>
		    			<p style="font-size: 14px; line-height: 22px; font-family: sans-serif; display: block; margin: 0; padding: 0;">If this was a mistake ignore this email and nothing will happen or else</p>
		    			<a href="' . url( 'activate-account' ) . '/' . urlencode( $ver_key ) . '" style="font-size: 14px; line-height: 22px; font-family: sans-serif; display: block; margin: 0 0 10px; padding: 0; color: #4c8db4; text-decoration: none;">To activate your account click this link</a>
		    			<p style="font-size: 14px; line-height: 22px; font-family: sans-serif; display: block; margin: 0; padding: 0;">Your current role: ' . $current_role . '</p>
		    			<p style="font-size: 14px; line-height: 22px; font-family: sans-serif; display: block; margin: 0; padding: 0;">Your default password: ' . $default_pass . '</p>
					';

					send_email( 'Careers in Metro', $request->email, $msg, 'No Reply: Careers in Metro Activation Code', 'careersinmetro@gmail.com' );

					#returning json_encode
					return json_encode([
						'status'	=> 'success',
						'message'	=> 'You have successfully signup. An email has sent to you for verification.',
						'redirect'	=> url( '/' )
					]);
				}
			}
			return $validator;
		}
	}

	public function activate_account( $ver_key = NULL ) {
		if ( $ver_key != '' ) {
			$active_key = DB::table( 'users' )->where( 'verification_key', $ver_key )->first();
			$role = DB::table( 'users' )->where( 'role', 'employer' )->first();

			if ( $active_key != '' ) {

				#add free tokens to employers
				if ( $role ) {
					DB::table( 'users_meta' )->insert([
						'user_id'		=> $active_key->id,
						'meta_key'		=> 'tokens',
						'meta_value'	=> 10
					]);
				}

				#update users status to active
				DB::table( 'users' )
					->where( 'id', $active_key->id )
					->update([
						'verification_key'	=> '',
						'user_status'		=> 'active'
					]);


				#send message for activation
				$ses_status = 'success';
				$ses_message = 
				'<div>Your account has been activated.</div>
				<div>You can now login your credentials.</div>';

				#redirect to home page
				return redirect( url( '/' ) )->with( $ses_status, $ses_message );
			} else {
				$ses_status = 'error';
				$ses_msg =
				'<div>Your activation key has expired.</div>
				<div>If you forgot your password go <a href="#lost-password-modal" class="close-notif show-modal">here</a>.</div>';

				return redirect( url( '/' ) )->with( $ses_status, $ses_msg );
			}
		}
	}

	public function login( Request $request ) {
		if ( $request->all() ) {
			$rules = array(
				'email'		=> 'required|email',
				'password'	=> 'required'
			);

			$validator = Validator::make( Input::all(), $rules );

			if ( $validator->fails() ) {
				return $validator->messages()->toJson();
			} else {
				$userdata = array(
					'email'			=> Input::get( 'email' ),
					'password'		=> Input::get( 'password' ),
				);

				if ( $request->ajax() ) {
					if ( Auth::attempt( $userdata ) ) {
						if ( Auth::user()->user_status == 'active' ) {
							if ( $request->current_url == 'http://localhost/laravel/careersinmetro' ) {
								$redirect = url( get_user_role( Auth::user()->id ) . 's/dashboard/home' );
							} else {
								$redirect = $request->current_url;
							}

							return json_encode([
								'status'	=> 'success',
								'message'	=> 'You have successfully logged in.',
								'redirect'	=> $redirect
							]);
						} else {
							return json_encode([
								'status'	=> 'error',
								'message'	=> 'Your account hasn\'t been activated yet. Please check your email for activation.'
							]);
						}
					} else {
						return json_encode([
							'status'	=> 'error',
							'message'	=> 'Invalid credentials, Please try again.'
						]);
					}
				}
			}
			return $validator;
		}
	}

	public function find_a_job( Request $request ) {
		return view( 'pages.publics.find-a-job', [
			'page_name'		=> 'find-a-job',
			'page_title'	=> 'Find a Job',
			'uri'			=> $request->fullUrl()
		]);
	}

	public function logout() {
		Auth::logout();
		return redirect( url( '/' ) );
	}
}
