@extends('layouts.app')
@section('breadcrumb')
<div class="page-title-box">
    <h4 class="page-title">Profile </h4>
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
        <li class="breadcrumb-item"><a href="">Profile</a></li>


    </ol>
</div>
@endsection

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-12">
      <div class="alert alert-secondary">
          Account Created::{{ Auth::user()->created_at->diffForHumans() }}
      </div>
  </div>
        <div class="col-md-6">
            <div class="card">
                <div class="card-header">
                  Change Your Name
                </div>
                <div class="card-body">
                   @if (session('success'))
                         <div class="alert alert-success">
                              {{ session('success') }}
                         </div>
                   @endif
                    <form action="{{ route('profile.namechange') }}" method="POST" >
                        @csrf

                        <div class="form-group">
                          <label for="">Name</label>
                          <input type="text" class="form-control" name="name" placeholder="name" value="{{ Auth::user()->name }}">
                          @error('name')
                              <span class="text-danger">{{ $message }}</span>
                          @enderror
                        </div>
                        <div class="form-group">
                         <button class="btn btn-success btn-sm mt-3">Change Name</button>
                        </div>
                    </form>
                </div>
            </div>
            <div class="card mt-3">
               <div class="card-header">
               Change Your Profile Photo
               @if (session('photo_success'))
               <div class="alert alert-success">
                    {{ session('photo_success') }}
               </div>
             @endif
               </div>

               <div class="card-body">

                <div class="row">
                  <div class="col-md-12 text-center">

                  <img width="150px" src="{{ asset('uploads/profile_photos').'/'. Auth::User()->profile_photo  }}" class="" alt="img">
                 </div>
               </div>
               <form action="{{ route('profile.photochange') }}" method="POST" enctype="multipart/form-data" >
                   @csrf
                      <div class="form-group">
                        <label for="">New Photo</label>
                        <input type="file" name="photo" id="" class="form-control" value="" accept=".jpg,.png">
                        @error('photo')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                      </div>
                      <div class="form-group">
                        <button class="btn btn-success btn-sm mt-2">Change Photo</button>
                      </div>

              </form>
               </div>
            </div>
        </div>
        <div class="col-md-6">
          <div class="card">
              <div class="card-header">
               Change Password
              </div>
              <div class="card-body">
                @if (session('success_p'))
                <div class="alert alert-success">
                     {{ session('success_p') }}
                </div>
          @endif
                  {{-- @if ($errors->any())
                      <div class="alert alert-danger">
                         @foreach ($errors->all() as $error)
                              <li>{{ $error }}</li>
                         @endforeach
                      </div>
                  @endif --}}
                  <form action="{{ route('profile.passwordchange') }}" method="post" >
                      @csrf

                      <div class="form-group">
                        <label for="">Old Password</label>
                        <input type="password" class="form-control" name="old_password" placeholder="" value="">
                        @error('old_password')
                            <span class="text-danger">{{ $message }}</span>
                         @enderror
                      </div>
                      <div class="form-group">
                          <label for="">New Password</label>
                          <input type="password" class="form-control" name="n_password" placeholder="" value="">
                             @error('n_password')
                                  <span class="text-danger">{{ $message }}</span>
                             @enderror
                        </div>
                        <div class="form-group">
                          <label for="">Confirm Password</label>
                          <input type="password" class="form-control" name="confirm_password" placeholder="" value="">
                          @error('confirm_password')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                        </div>
                      <div class="form-group">
                       <button class="btn btn-success btn-sm mt-3">Change Password</button>
                      </div>
                  </form>
              </div>
          </div>
      </div>


    </div>
</div>
@endsection
