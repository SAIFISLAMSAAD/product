<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\category;
use App\Models\subcategory;
use Carbon\carbon;
use App\Http\Requests\subcategorypost;

class subcategorycontroller extends Controller
{
    function index(){
        $categories = category::all();
        $subcategories = subcategory::all();
        $deleted_subcategory = subcategory::onlyTrashed()->get();
        return view('admin.subcategory.index', compact('categories', 'subcategories', 'deleted_subcategory'));
    }
    function insert(subcategorypost $request){


        if(subcategory::withTrashed()->where('category_id',$request->category_id)->where('subcategory_name',$request->subcategory_name)->exists()){
           return back()->with('subcategory_exists','Sub Category already exists!');

        }else{
            subcategory::insert([
                'category_id' => $request->category_id,
                'subcategory_name' => $request->subcategory_name,
                'created_at' => carbon::now(),
            ]);
            return back()->with('success', 'subcategory added successfully!');
        }


    }
    function delete($subcategory_id){

     subcategory::find($subcategory_id)->delete();

     return back();

    }
    function restore($deleted_subcategory_id){

     subcategory::withTrashed()->find($deleted_subcategory_id)->restore();

     return back();

    }
    function perdelete ($deleted_subcategory_id){
      subcategory::withTrashed()->find($deleted_subcategory_id)->forcedelete();
      return back();
    }
    function markdel (Request $request){
      if($request->marked_id){
            foreach ($request->marked_id as $single_mark) {
                subcategory::find($single_mark)->delete();
      }

     }
     return back();
    }

    function delete_restore_item (Request $request){
        if ($request->restore_all) {
            if($request->marked_item){
                 foreach($request->marked_item as $marked_item_delete){
                    subcategory::withTrashed()->find($marked_item_delete)->restore();
                 }
            }
return back();

        }
else {
            if ($request->marked_item) {
                foreach ($request->marked_item as $marked_item_delete) {
                    subcategory::withTrashed()->find($marked_item_delete)->forceDelete();
                }
            }
            return back();

}




    }
    function edit($subcategory_id){

       $subcategory=subcategory::find($subcategory_id);
       $categories=category::all();


       return view('admin.subcategory.edit', compact('subcategory', 'categories'));
    }
    function update(Request $request){

        // subcategory::find();



        subcategory::find($request->subcategory_id)->update([
            'category_id'=>$request->category_name,
            'subcategory_name'=>$request->subcategory_name
        ]);
        return back()->with('update', 'subcategory updated successfully!');
    }

}



