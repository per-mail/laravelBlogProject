<?php

namespace App\Http\Middleware;

use App\Models\User;
use Closure;
use Illuminate\Http\Request;

class AdminMiddleware
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
//        из auth() получаем роль пользователя и если он не админ выходит ошибка 404
//        (int) - делаем приведение типов, строку переводим в число
       if ((int) auth()->user()->role !== User::ROLE_ADMIN) {
           abort(404);
       }
       return $next($request);
    }
}
