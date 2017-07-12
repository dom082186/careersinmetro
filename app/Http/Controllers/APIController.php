<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Contracts\Auth\Authenticatable;
use DB;

class APIController extends Controller {
	public function messages( $token = NULL ) {
		if ( $token != NULL && $token == csrf_token() ) {
			$messages = DB::table( 'messages' )
							->join( 'users', 'messages.sender_id', '=', 'users.id' )
							->where( 'receiver_id', Auth::user()->id )
							->get();

			return view( 'includes.apis.box-message', [
				'messages' => $messages
			]);
		}
	}
}
