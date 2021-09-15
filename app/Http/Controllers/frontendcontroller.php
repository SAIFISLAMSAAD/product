<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class frontendcontroller extends Controller
{
    function jalal(){
        return view('about');
    }
    function welcome(){
        return view('welcome');
    }
}
