<?php

namespace App\Http\Controllers;

use App\Http\Requests\categoryPost;
use Illuminate\Http\Request;
use App\Models\category;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;

class categorycontroller extends Controller
{
    function index(){
        $category= category::latest()->get();
        return view('admin.category.index', compact('category'));
    }
    function insert(categoryPost $request){

       category::insert([

            'category_name'=>$request->category_name,
            'added_bt'=>Auth::id(),
            'created_at'=>Carbon::now()
       ]);

        return back()->with('success','category_added successfully!');
    }

    function delete($category_id){
        category::find($category_id)->delete();
            return back()->with('delsuccess', 'category deleted successfully!');

    }

}

