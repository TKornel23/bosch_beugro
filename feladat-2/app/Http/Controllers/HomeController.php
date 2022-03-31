<?php

namespace App\Http\Controllers;
use model;

use Illuminate\Http\Request;
use App\Http\Controllers\MySQLi;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function production()
    {
        //$connection = new mysqli("localhost","root","asd123");
    }
}
