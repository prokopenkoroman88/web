<?php

namespace App\Http\Controllers\Map;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class MainController extends Controller
{
    //

    public function index()
    {
        //
        return view('map.welcome');//'genealogy'    //'view/genealogy.blade.php'
    }
}
