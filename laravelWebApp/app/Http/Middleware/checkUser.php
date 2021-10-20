<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class checkUser
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
        // if user try to access profile page without login 
        if(!session()->has('LoggedUser') && ($request->path()!='userlogin' && $request->path()!='create'))
        {
            return redirect('userlogin')->with('fail','You must be logged in');
        }

        // if user are already login then prevent to register or login page access 
        if(session()->has('LoggedUser') && ($request->path() == 'userlogin' || $request->path() == 'create'))
        {
            return back();
        }
        return $next($request)->header('Cache-Control','no-cache,no-store,max-age=0,must-revalidate')
                              ->header('Paragma','no-cache')
                              ->header('Expires','Sat 01 Jan 1990 00:00:00 GMT');
    }
}
