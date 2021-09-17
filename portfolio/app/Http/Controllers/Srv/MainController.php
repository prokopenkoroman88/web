<?php

namespace App\Http\Controllers\Srv;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class MainController extends Controller
{
    //

    public function index()
    {
        //
        return view('srv.welcome');
    }
}
