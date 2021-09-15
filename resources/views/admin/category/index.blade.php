@extends('layouts.starlite')

@section('Category')
 active
@endsection
@section('title')
 Category
@endsection

@section('content')
@include('layouts.nav');
  <!-- ########## START: MAIN PANEL ########## -->
    <div class="sl-mainpanel">
      <nav class="breadcrumb sl-breadcrumb">
        <a class="breadcrumb-item" href="{{ url('home') }}">Dashboard</a>

        <span class="breadcrumb-item active">Category</span>

        {{-- <a class="breadcrumb-item" href="{{ url('subcategory') }}">Subcategory</a>
        <a class="breadcrumb-item" href="{{ url('product') }}">product</a> --}}
    </nav>

      <div class="sl-pagebody">

<div class="container">
    <div class="row">
        <div class="col-lg-8">
<div class="card">
    @if (session('delsuccess'))
        <div class="alert alert-success">{{ session('delsuccess') }}</div>


    @endif
    <div class="card-header">Category List</div>

    <div class="card-body">

        <table class="table table-striped">
            <tr>
                <th>sl</th>
                <th>category name</th>
                <th>added by</th>
                <th>created at</th>
                <th>action</th>
            </tr>
            @foreach ($category as $cat)


            <tr>
        <td>{{ $loop->index+1 }}</td>
        <td>{{ $cat->category_name }}</td>
        <td>{{ App\Models\User::find($cat->added_bt)->name }}</td>

        <td>{{ $cat->created_at->diffForHumans() }}</td>
        <td><a href="{{ url('category/delete') }}/{{ $cat->id }}" class="btn btn-danger">delete</a></td>

    </tr>

             @endforeach
             @if ($category->count()==0)
             <tr>
                 <td>No data found</td>
             </tr>

             @endif
        </table>
    </div>
</div>
        </div>
        <div class="col-lg-4">
         <div class="card">
                <div class="card-header">Add Category</div>
            <div class="card-body">

@if (session('success'))
<div class="alert alert-success">
    {{ session('success') }}
</div>
@endif
<form action="{{ url('/category/insert') }}" method="POST">
    @csrf

                <div class="mb-3">
                    <label class="form-lebel">Category Name</label>

                    <input type="text" class="form-control" name="category_name">
                    @error('category_name')
                <div class="alert alert-danger my-3">{{ $message }}</div>
                    @enderror
                    <button type="submit" class="btn btn-success mt-2">submit</button>
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
