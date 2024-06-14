<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class AdminRole
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
        // Kiểm tra xem người dùng đã đăng nhập và có role là 1 hay không
        if (auth()->check() && auth()->user()->role == 1) {
            return $next($request);
        }

        // Nếu không có quyền truy cập, chuyển hướng về trang đăng nhập
        return redirect()->route('admin.login')->with('error', 'Bạn không có quyền truy cập trang quản trị.');
    }
}
