@extends('layouts.app_auth')
@section('login_form')
<div class="card-box p-5">
    <h2 class="text-uppercase text-center pb-4">
        <a href="index.html" class="text-success">
            <span><img src="{{ asset('dashboard/assets/images/logo.png') }}" alt="" height="27"></span>
        </a>
    </h2>

    <form class="form-horizontal" action="{{ route('register') }}" method="post">
           @csrf
        <div class="form-group row m-b-20">
            <div class="col-12">
                <label for="username">Full Name <span class="text-danger">*</span></label>
                <input class="form-control" type="text" id="username" name="name" placeholder="Rabeya">
                @error('name')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>
        </div>
        <div class="form-group row m-b-20">
            <div class="col-12">
                <label for="">Phone Number </label>
                <input class="form-control" type="text"  name="phone" placeholder="019">
            </div>
        </div>

        <div class="form-group row m-b-20">
            <div class="col-12">
                <label for="emailaddress">Email address <span class="text-danger">*</span></label>
                <input class="form-control" type="email" id="emailaddress" name="email" placeholder="rabeya@gmail.com">
                @error('email')
                <span class="text-danger">{{ $message }}</span>
            @enderror
            </div>
        </div>

        <div class="form-group row m-b-20">
            <div class="col-12">
                <label for="password">Password <span class="text-danger">*</span></label>
                <input class="form-control" type="password" name="password" id="password" placeholder="Enter your password">
                @error('password')
                <span class="text-danger">{{ $message }}</span>
            @enderror
            </div>
        </div>

        <div class="form-group row m-b-20">
            <div class="col-12">
                <label for="password">Confirm Password <span class="text-danger">*</span></label>
                <input class="form-control" type="password" name="password_confirmation" id="password" placeholder="Enter your confirmation password">
            </div>
        </div>



        <div class="form-group row text-center m-t-10">
            <div class="col-12">
                <button class="btn btn-block btn-custom waves-effect waves-light" type="submit">Register</button>
            </div>
        </div>

    </form>
    <div class="row m-t-50">
        <div class="col-sm-12 text-center">
            <p class="text-muted">Already have an account?  <a href="{{ route('login') }}" class="text-dark m-l-5"><b>Login</b></a></p>
        </div>
    </div>

</div>
@endsection
