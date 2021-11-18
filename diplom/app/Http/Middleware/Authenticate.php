<?php

namespace App\Http\Middleware;

use Illuminate\Auth\Middleware\Authenticate as Middleware;

//use \Illuminate\Http\Request;

class Authenticate extends Middleware
{
    /**
     * Get the path the user should be redirected to when they are not authenticated.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return string|null
     */
    protected function redirectTo($request)
    {
//->attributes['url']   ->attributes()
        //dd($request->session()->get('url')   );

        //dd($request);
        //dd($request['requestUri']   );
        //dd($request['pathInfo']   );  //$request->pathInfo null
        //dd($request);


        //http://diplom/admin
        //dd($request->fullUrl()   );   //"http://diplom/admin"
        //dd($request->url()   );       //"http://diplom/admin"
        //dd($request->path()   );      //"admin"
        //dd($request->segments()   );  //[0 => "admin"]


        $seg=$request->segments();
        //dd($seg   );

        if (! $request->expectsJson()) {

            if($seg && $seg[0]=='admin')
                return route('login');
            else
      
                return null;
        }
    }
}
