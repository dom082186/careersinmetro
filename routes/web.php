<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

/* public routes */
Route::match([ 'post', 'get' ], '/', 'PublicController@index' );
Route::get( 'activate-account/{ver_key}', 'PublicController@activate_account' );
Route::match([ 'post', 'get' ], 'find-a-job', 'PublicController@find_a_job' );
Route::get( 'logout', 'PublicController@logout' );

/* ajax form routes */
Route::match([ 'post', 'get' ], 'signup', 'PublicController@signup' );
Route::match([ 'post', 'get' ], 'login', 'PublicController@login' );

/* api routes */
Route::group([ 'prefix' => 'api' ],
	function() {
		Route::get( 'messages/{api_token}', 'APIController@messages' );
	}
);

/* auth jobseekers routes */
Route::group([ 'middleware' => 'auth_jobseeker'],
	function() {
		Route::group([ 'prefix' => 'jobseekers/dashboard' ],
			function() {
				Route::match([ 'post', 'get' ], 'home', 'JobseekersController@home' );
				Route::match([ 'post', 'get' ], 'resume', 'JobseekersController@resume' );
			}
		);
	}
);