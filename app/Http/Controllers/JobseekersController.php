<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Contracts\Auth\Authenticatable;

class JobseekersController extends AdminController {

    public function home() {
    	return view( 'pages.jobseekers.home', [
    		'page_name'		=> 'home',
    		'page_title'	=> 'Home',
    		'id'			=> isset( Auth::user()->id ) ? Auth::user()->id : ''
    	]);
    }

    public function resume() {
    	return view( 'pages.jobseekers.resume', [
    		'page_name'		=> 'resume',
    		'page_title'	=> 'Resume',
    		'id'			=> isset( Auth::user()->id ) ? Auth::user()->id : ''
    	]);
    }

    
}
