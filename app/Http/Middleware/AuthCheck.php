<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class AuthCheck
{
    
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next,string $role)
    {
        $roles=[
            'admin' => ['admin'],
            'staff' => ['admin','staff'],
            'user' => ['admin','staff','user']
        ];
        if (!session()->has('LoggedUser') && !$request->is('login') && !$request->is('register')) {
            return redirect("/");
        }
        if (session()->has('LoggedUser')) {
            $session_role=session('LoggedUser')->role()->first()['name'];
            if ($request->is('login') || $request->is('register')) {
                return back();
            }
            abort_if(!in_array($session_role,$roles[$role]),403);
        }
        return $next($request)->header('Cache-Control','no-cache, no-store, max-age=0, must-revalidate')
                                ->header('Pragma','no-cache')
                                ->header('Expires','Sat 01 Jan 1990 00:00:00 GMT');

    }
}
