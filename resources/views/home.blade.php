@extends('layouts.starlite')

@section('Dashboard')
 active
@endsection
@section('title')
dashboard
@endsection







@section('content')
@include('layouts.nav');

  <!-- ########## START: MAIN PANEL ########## -->
    <div class="sl-mainpanel">
      <nav class="breadcrumb sl-breadcrumb">
          <span class="breadcrumb-item active " >Dashboard</span>

        <a class="breadcrumb-item" href="{{ url('addcategory') }}">Category</a>
        <a class="breadcrumb-item" href="{{ url('subcategory') }}">Subcategory</a>
       



      </nav>

      <div class="sl-pagebody">
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card">

               <div class="alert alert-success text-center">
                   <h2>Welcome {{ $logged_user }}</h2>
                 <h3> Total User : {{ $user_count }}</h3>
               </div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    <table class="table table-striped">

<tr>
<th>SL</th>
<th>Name</th>
<th>Email</th>
<th>Created at</th>

</tr>
@foreach ($user as $user_info)


<tr>
    <td>{{ $loop->index+1 }}</td>
    <td>{{ $user_info->name }}</td>
    <td>{{ $user_info->email }}</td>
    <td>{{ $user_info->created_at->format('d/m/Y h:i:s A') }}</td>
</tr>

      </div><!-- sl-pagebody -->
    </div><!-- sl-mainpanel -->
    <!-- ########## END: MAIN PANEL ########## -->




@endforeach


                    </table>


                </div>
            </div>
        </div>
    </div>
</div>
@endsection
