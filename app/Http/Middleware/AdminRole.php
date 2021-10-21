<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class AdminRole
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
        if (Auth::user()->role==config('const.USER.ROLE.MANAGER') || Auth::user()->role==config('const.USER.ROLE.ADMIN')) {
            return $next($request);
        }
        return redirect('home')->with('alert', 'Bạn không có quyền truy cập vào chức năng này');
    }
}
