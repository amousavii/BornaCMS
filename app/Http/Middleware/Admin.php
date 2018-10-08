<?php

namespace App\Http\Middleware;

use Closure;
use Sentinel;
class Admin
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {

        if($auth = Sentinel :: check()){
            $user = Sentinel::getUser();
            if($user->inRole('admin')){
                return $next($request);
            }

            }
        return redirect(404);
        }



}
