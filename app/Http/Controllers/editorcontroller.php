<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;


class editorcontroller extends Controller
{
    function index(){
        return view('admin.editor.index');
    }
}
