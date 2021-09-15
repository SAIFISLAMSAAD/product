<?php

namespace App\Http\Controllers;

use App\Models\category;
use App\Models\subcategory;
use Illuminate\Http\Request;
use App\Models\product;
use Carbon\carbon;
use Intervention\Image\Facades\Image;

class productcontroller extends Controller
{
    function index(){
        $categories=category::all();
        $subcategories=subcategory::all();
        $products=product::all();
       return view('admin.product.index', compact('categories', 'subcategories', 'products'));
    }
    function insert (Request $request){
     $product_id = product::insertGetId([
            'category_id' => $request->category_id,
            'subcategory_id' => $request->subcategory_id,
            'product_name' => $request->product_name,
            'product_price' => $request->product_price,
            'product_quantity' => $request->product_quantity,
            'description' => $request->product_description,
            'created_at' => carbon::now(),

        ]);

     $new_product_image = $request->product_img;
     $extension = $new_product_image->getClientOriginalExtension();
     $new_product_name = $product_id.'.'.$extension;

     Image::make($new_product_image)->save(base_path('public/uploads/product/'. $new_product_name));
     product::find($product_id)->update([
         'product_img'=> $new_product_name,
     ]);

     return back()->with('success', 'product submitted successfully!');
    }
}

















