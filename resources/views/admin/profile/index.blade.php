@extends('layouts.starlite')

@section('profile')
 active
@endsection
@section('title')
 profile
@endsection

@section('content')

@include('layouts.nav')
 <!-- ########## START: MAIN PANEL ########## -->
    <div class="sl-mainpanel">
      <nav class="breadcrumb sl-breadcrumb">
        <a class="breadcrumb-item" href="{{ url('home') }}">Dashboard</a>
        <a class="breadcrumb-item" href="{{ url('addcategory') }}">Category</a>
        <span class="breadcrumb-item active">Profile</span>
      </nav>

         <div class="sl-pagebody">

            <div class="container">
                <div class="row">
                    <div class="col-md-4">
                       <div class="card">
                           <div class="card-header">
                               <h3>Edit Profile</h3>
                           </div>
                           <div class="card-body">
                               <form action="{{ url('profile/namechange') }}" method="POST">
                                @csrf
                                @if(session('success'))
                                    <div class="alert alert-success" >{{ session('success') }}</div>

                                @endif
                                   <div class="form-group">
                                       <label for="Name">Name</label>
                                       <input type="text" name="name" class="form-control" value="{{ Auth::user()->name }}">
                                   </div>
                                   <div class="form-group">
                                       <button type="submit" class="btn btn-indigo">Update</button>>
                                   </div>
                               </form>
                           </div>
                       </div>
                    </div>
                    <div class="col-md-4">
                       <div class="card">
                           <div class="card-header">
                               <h3>Edit Profile</h3>
                           </div>
                           <div class="card-body">
                               <form action="{{ url('profile/passchange') }}" method="POST">
                                @csrf

                                     @if(session('success_password'))
                                    <div class="alert alert-success" >{{ session('success_password') }}</div>

                                     @endif

                                         @if (session('wrong_pass'))

                                         <div class="alert alert-danger">
                                             {{ session('wrong_pass') }}
                                         </div>

                                         @endif
                                   <div class="form-group">
                                       <label for="Name">Old Password</label>
                                       <input type="password" name="old_password" class="form-control">
                                   </div>
                                      @error('old_password')
                                <strong class="text-danger">{{ $message }}</strong>
                                @enderror
                                   <div class="form-group">
                                       <label for="Name">New Password</label>
                                       <input type="password" name="password" class="form-control">
                                   </div>
                                      @error('password')
                                <strong class="text-danger">{{ $message }}</strong>
                                @enderror
                                   <div class="form-group">
                                       <label for="Name">Confirm Password</label>
                                       <input type="password" name="password_confirmation" class="form-control">
                                   </div>

                                   <div class="form-group">
                                       <button type="submit" class="btn btn-indigo">Update</button>>
                                   </div>
                               </form>
                           </div>
                       </div>
                    </div>
                </div>
                    <div class="col-md-4">
                       <div class="card">
                           <div class="card-header">
                               <h3>Edit Profile Photo</h3>
                           </div>
                           <div class="card-body">
                               <form action="{{ url('profile/photochange') }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                <div class="form-group">
                                    <p>Your Photo</p>
                                    <img class="w-25" src="{{ asset('uploads/profile') }}/{{ Auth::user()->profile_photo }}"  alt="">


                                </div>


                                   <div class="form-group">
                                       <label for="Name">Profile Photo</label>
                                       <input type="file" name="profile_photo" class="form-control" oninput="pic.src=window.URL.createObjectURL(this.files[0]>
                                       <img class="w-25" id="pic" />
                                       @error('profile_photo')
                                       <div class="alret alert-danger">
                                           {{ $message }}
                                       </div>

                                       @enderror
                                   </div>

                                   <div class="form-group">
                                       <button type="submit" class="btn btn-indigo">Update</button>>
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
