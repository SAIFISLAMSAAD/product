@extends('layouts.starlite');

@section('subCategory')
 active
@endsection
@section('title')
 subCategory
@endsection

@section('content');
@include('layouts.nav')


  <!-- ########## START: MAIN PANEL ########## -->
    <div class="sl-mainpanel">
      <nav class="breadcrumb sl-breadcrumb">
        <a class="breadcrumb-item" href="{{ url('home') }}">Dashboard</a>
        <a class="breadcrumb-item" href="{{ url('addcategory') }}">Category</a>
        <span class="breadcrumb-item active">Subcategory</span>
        {{-- <a class="breadcrumb-item" href="{{ url('product') }}">product</a> --}}
      </nav>

      <div class="sl-pagebody">




<div class="container">
    <div class="row">
        <div class="col-lg-8">
            <div class="card">
                <div class="card-header">
                    <h3 class="text-center">Sub Category List</h3>
                </div>
                <div class="card-body">
                    <form action="{{ url('subcategory/markdel') }}" method="POST">
                        @csrf
                        <table class="table table-striped">



                        <tr>


                            <th>Mark</th>
                            <th>SL</th>

                            <th>Sub Category Name</th>
                            <th>Category Name</th>
                            <th>Created At</th>
                            <th>Action</th>
                        </tr>
                        @forelse ($subcategories as $subcategory )

                        <tr>


                            <td><input type="checkbox" name="marked_id[]" class="book" value="{{ $subcategory->id }}" ></td>

                            <td>{{ $loop->index+1 }}</td>
                            <td>{{ $subcategory->subcategory_name }}</td>
                            <td>{{ App\Models\category::find($subcategory->category_id)->category_name }}</td>
                            <td>
                                @if ( $subcategory->created_at->diffInDays(Carbon\Carbon::today()) > 3 )
                                    {{ $subcategory->created_at->format('d/m/y h:i:s') }}
                                    @else {{ $subcategory->created_at->diffForhumans() }}

                                @endif
                            </td>
                            <td>
                                <a href="{{ url('/subcategory/edit') }}/{{ $subcategory->id }}" class="btn btn-success">Edit</a>
                            </td>
                            <td>
                          <a href="{{ url('/subcategory/delete') }}/{{ $subcategory->id }}" class="btn btn-danger">Delete</a>
                        </td>
                        </tr>
                        @empty
                        <tr><td>No data available!</td></tr>
                          @endforelse
                    </table>


                    <a href="#" class="btn btn-success">
                        <input type="checkbox" name="checkAll" id="checkAll"> Mark All
                    </a>
                      <button type="submit" class="btn btn-success">Delete Marked</button>
                    </form>
                </div>
            </div>


           <form action="{{ url('subcategory/delete_restore_item') }}" method="POST">
            @csrf
               <div class="card mt-3">
                <div class="card-header">
                    <h3 class="text-center">Trashed Sub Category List</h3>
                </div>
                <div class="card-body">
                    <form action="#" method="POST">
                        <table class="table table-striped">
                        <tr>

                            <th>Mark</th>
                            <th>SL</th>
                            <th>Sub Category Name</th>
                            <th>Category Name</th>
                            <th>Created At</th>
                            <th>Action</th>
                        </tr>
                        @forelse ($deleted_subcategory as $delete_subcat )


                        <tr>
                       <td><input type="checkbox" name="marked_item[]" class="delete" value="{{ $delete_subcat->id }}" ></td>
                            <td>{{ $loop->index+1 }}</td>
                            <td>{{ $delete_subcat->subcategory_name }}</td>
                            <td>{{ App\Models\category::find($delete_subcat->category_id)->category_name }}</td>
                            <td>{{ $delete_subcat->created_at->diffForHumans() }}</td>
                            <td><a href="{{ url('/subcategory/restore') }}/{{ $delete_subcat->id }}" class="btn btn-success">Restore</a></td>
                            <td><a href="{{ url('/subcategory/perdelete') }}/{{ $delete_subcat->id }}" class="btn btn-danger">Delete</a></td>


                        </tr>

                        @empty
                        <tr><td>No data available!</td></tr>
                          @endforelse

                    </table>


                       <tr>
                           <td><a href="" class="btn btn-success">
                               <input type="checkbox" name="trashed_id[]" id="checkA"> Mark All</a>
                            </td>
                            <td>   <button value="restore_all" name="restore_all" class="btn btn-success" type="submit">Restore Marked</button></td>
                            <td>   <button value="delete_all" name="delete_all" class="btn btn-success" type="submit">Delete Marked</button></td>
                        </tr>
                    </form>

                </div>
            </div></form>
        </div>

        <div class="col-lg-4">
               <div class="card">
                    <div class="card-header">
                        <h3>Add Subcategory</h3>
                    </div>
                    <div class="card-body">
                        @if (session('success'))
                        <div class="alert alert-success">
                            {{ session('success') }}
                        </div>

                        @endif
                        @if (session('subcategory_exists'))
                        <div class="alert alert-danger">
                            {{ session('subcategory_exists') }}
                        </div>

                        @endif
   <form action="{{ url('/subcategory/insert') }}" method="POST">
       @csrf
       <div class="mb-3">
           <label for="" class="form-label">Category List</label>
           <select name="category_id" class="form-control">
               <option value="">--select category--</option>

               @foreach ($categories as $category)


               <option {{ old('category_id')==$category->id?'selected':'' }} value="{{ $category->id }}">{{ $category->category_name }}</option>
                  @endforeach

           </select>
              @error('category_id')
<div class="alert alert-danger my-3">{{ $message }}</div>
      @enderror
       </div>
<div class="mb-3">
    <label class="form-lebel">Sub Category Name</label>

      <input value="{{ old('subcategory_name') }}" type="text" class="form-control" name="subcategory_name">
      @error('subcategory_name')
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

<script>

    $(function () {
        $("#checkAll").click(function () {
            if ($("#checkAll").is(':checked')) {
                $(".book").prop("checked", true);
            } else {
                $(".book").prop("checked", false);
            }
        });
    });

</script>

<script>

    $(function () {
        $("#checkA").click(function () {
            if ($("#checkA").is(':checked')) {
                $(".delete").prop("checked", true);
            } else {
                $(".delete").prop("checked", false);
            }
        });
    });

</script>

@endsection



