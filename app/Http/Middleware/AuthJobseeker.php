<?php

namespace App\Http\Middleware;

use Illuminate\Http\Request;
use Closure;
use Auth;

class AuthJobseeker
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle( $request, Closure $next ) {
        $redirect = request()->headers->get( 'referer' );

        if ( !Auth::check() ) {
            if ( $redirect == NULL ) {
                return redirect( url( '/' ) );
            }
        }
        return $next( $request );
    }
}
