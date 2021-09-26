<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class ManagerRole
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
        if (Auth::user()->role!=config('const.USER.ROLE.MANAGER')) {
            return redirect('home')->with('alert', 'Bạn không có quyền truy cập vào chức năng này');
        }
        return $next($request);
    }
}
