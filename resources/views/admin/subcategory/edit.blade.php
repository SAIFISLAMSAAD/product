@extends('layouts.starlite');

@section('subCategory')
 active
@endsection
@section('title')
 subCategory
@endsection

@section('content');

@include('layouts.nav');
  <!-- ########## START: MAIN PANEL ########## -->
    <div class="sl-mainpanel">
      <nav class="breadcrumb sl-breadcrumb">
        <a class="breadcrumb-item" href="{{ url('home') }}">Dashboard</a>
        <a class="breadcrumb-item" href="{{ url('addcategory') }}">Category</a>
        <span class="breadcrumb-item active">Subcategory</span>
      </nav>

      <div class="sl-pagebody">
<div class="container">
    <div class="row">
        <div class="col-lg-4 m-auto">
            <div class="card">
                <div class="card-header">
                    <h3>Edit Subcategory</h3>
                </div>
                @if (session('update'))
                <div class="alert alert-success">{{ session('update') }}</div>

                @endif
                <div class="card-body">
                    <form action="{{ url('/subcategory/update') }}" method="POST">
                        @csrf
                         <div class="form-group">
                             <input type="hidden" name="subcategory_id" value="{{ $subcategory->id }}">
                             <label for="" class="form-label">Category List</label>
                               <select name="category_name" id="" class="form-control">
                                   @foreach ($categories as $category)
               <option {{ $subcategory->category_id==$category->id? 'selected' : '' }} value="{{ $category->id }}">{{ $category->category_name }}</option>
                  @endforeach
                               </select>
                         </div>
                         <div class="form-group">
                             <label for="" class="form-label">Sub Category Name</label>
                             <input type="text" class="form-control" name="subcategory_name" value="{{ $subcategory->subcategory_name }}">
                         </div>
                         <div class="form-group">
                             <button type="submit" class="btn btn-primary">Update</button>
                         </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>



      </div>
    </div>
    @endsection
