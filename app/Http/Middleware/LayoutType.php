<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class LayoutType
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

        if(Auth::user()->privilege == "admin"){
            $layout_type = "page-container-boxed";
        }else{
            $layout_type = "";
        }
        $request->attributes->add(['layout' => $layout_type]);
        
        return $next($request);
    }
}
