<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\user;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
$user_id=Auth::id();
        $user= user::where('id','!=',$user_id)->orderBy('created_at', 'desc')->get();
        $user_count=  user::count();
        $logged_user=Auth::user()->name;

        return view('home', compact('user', 'user_count','logged_user'));
    }


}
