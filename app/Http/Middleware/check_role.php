<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;
use App\Login;

class check_role
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
        $hasil = Login::where('users_id', Auth::id())->first();
        if($hasil['roles_id'] == 1)
        {
            return 1;
        }
        else if($hasil['roles_id'] == 2)
        {
            return 2
        }
        return $next($request);
    }
}
