<?php

namespace App\Http\Middleware;


use Closure;
use Illuminate\Http\Request as Request;

class UserTypeMiddle
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
        switch ($request->usertype) {
            case 1:
                # code...
                break;
            case 2:
                # code...
                break;
            case 3:
                # code...
                break;
            default:
                # code...
                break;
        }
        return $next($request);
    }
}
