<?php

namespace App\Http\Controllers\Job;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class MainController extends Controller
{
    //

    public function index()
    {
        // 
        return view('job.welcome');//'job-searching' //'view/genealogy.blade.php'
    }
}
