<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class TransformApiHeaders
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        $cookie_name='XSRF-TOKEN';
        $token_cookie=$request->cookie($cookie_name);


        if ($token_cookie!==null) {

            $response = $next($request);

            $response->headers->set('$token_cookie', 'X-$cookie_name');


            //$request->headers()->add(["X-$cookie_name"=>$token_cookie]);
            
        }
        return $response;
    }
}
