<?php

namespace App\Http\Controllers\Gen;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class MainController extends Controller
{
    //

    public function index()
    {
        //
        return view('gen.welcome');//'genealogy'    //'view/genealogy.blade.php'
    }
}
