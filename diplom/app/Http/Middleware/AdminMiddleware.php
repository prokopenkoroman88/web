<?php

namespace App\Http\Middleware;

use Closure;

class AdminMiddleware
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

        //проверка на админа
        if( !\Auth::user()->isAdmin() )
            return redirect('/');//если не админ

        return $next($request);//юзер запросил УРЛ адрес - ему ответ $request   - auth - admin - Admin\
        //отправь запрос дальше next по цепочке посредников:  - auth - admin - Admin\
    }
}
