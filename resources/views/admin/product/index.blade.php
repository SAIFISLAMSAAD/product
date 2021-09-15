@extends('layouts.starlite');

@section('product')
 active
@endsection
@section('title')
 Product
@endsection

@section('content');
@include('layouts.nav')


  <!-- ########## START: MAIN PANEL ########## -->
    <div class="sl-mainpanel">
      <nav class="breadcrumb sl-breadcrumb">
        <a class="breadcrumb-item" href="{{ url('home') }}">Dashboard</a>
        <a class="breadcrumb-item" href="{{ url('addcategory') }}">Category</a>
        <a class="breadcrumb-item" href="{{ url('subcategory') }}">subcategory</a>
        <span class="breadcrumb-item active">product</span>
      </nav>

      <div class="sl-pagebody">
<div class="container">
    <div class="row">
    <div class="col-lg-9">
        <div class="card">
            <div class="card-header"><h3>Product Lists</h3></div>
            <div class="card-body">
                <table class="table table-striped">
                    <tr>
                       <th>SL</th>
                       <th>Category Name</th>
                       <th>Subcat. Name</th>
                       <th>Product Name</th>
                       <th>Product Price</th>
                       <th>Product Quantity</th>
                       <th>Product Descp</th>
                       <th>Product Image</th>
                       <th>Action</th>
                       <th>Action</th>
                    </tr>
                    @foreach ($products as $product )

                    <tr>
                        <td>{{ $loop->index+1 }}</td>
                        <td>{{ App\Models\category::find($product->category_id)->category_name }}</td>
                        <td>{{ App\Models\subcategory::find($product->subcategory_id)->subcategory_name }}</td>
                        <td>{{ $product->product_name}}</td>
                        <td>{{ $product->product_price}}</td>
                        <td>{{ $product->product_quantity}}</td>
                        <td>{{ $product->description}}</td>
                        <td><img width="50" height="40" src="{{ asset('uploads/product/') }}/{{ $product->product_img }}" alt=""></td>
                        <td><button class="btn btn-info" type="submit">Edit</button>
                        </td><td><button class="btn btn-danger" type="submit">Delete</button></td>
                    </tr>
                    @endforeach
                </table>
            </div>
        </div>
    </div>
    <div class="col-lg-3">
        <div class="card">
            <div class="card-header"><h3>Add Product</h3></div>
            <div class="card-body">
                @if (session('success'))
                <div class="alert alert-success">
                    {{ session('success') }}
                </div>

                @endif
                <form action="{{ url('/product/insert') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group mb-3">
                     <select name="category_id" class="form-control" id="">
                         <option value="">--select category--</option>
                         @foreach ($categories as $cat)

                         <option value="{{ $cat->id }}">{{ $cat->category_name }}</option>
                         @endforeach

                     </select>

                    </div>
                    <div class="form-group mb-3">
                     <select name="subcategory_id" class="form-control" id="">
                         <option value="">--select subcategory--</option>
                         @foreach ($subcategories as $subcat)

                         <option value="{{ $subcat->id }}">{{ $subcat->subcategory_name }}</option>
                         @endforeach

                     </select>

                    </div>
                    <div class="form-group mb-3">
                        <label for="" class="form-label">Product Name</label>
                        <input type="text" class="form-control" name="product_name">
                    </div>
                    <div class="form-group mb-3">
                        <label for="" class="form-label">Product Price</label>
                        <input type="number" class="form-control" name="product_price">
                    </div>
                    <div class="form-group mb-3">
                        <label for="" class="form-label">Product Quantity</label>
                        <input type="number" class="form-control" name="product_quantity">
                    </div>
                    <div class="form-group mb-3">
                        <label for="" class="form-label">Product Description</label>
                        <textarea type="text" class="form-control" name="product_description"></textarea>
                    </div>
                    <div class="form-group mb-3">
                        <label for="" class="form-label">Product Image</label>
                        <input type="file" class="form-control" name="product_img">
                    </div>
                    <button type="submit" class="btn btn-success" >Submit</button>

            </div>
        </div></div>
    </div>
</div>
      </div>
    </div>
    @endsection
