@extends('layouts.app')
@section('breadcrumb')
    <div class="page-title-box">
        <h4 class="page-title">Home </h4>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
        </ol>
    </div>
@endsection
@section('content')
    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                      Add Vendor
                    </div>
                    <div class="card-body">
                        <form action="{{ route('vendor.store') }}" method="POST">
                            @csrf
                            <div class="mb-3 form-group">
                              <label for="" class="form-label">Vendor Name</label>
                              <input type="text" class="form-control" placeholder="vendor Name" name="vendor_name">
                            </div>
                            <div class="mb-3 form-group">
                                <label for="" class="form-label">Vendor Email</label>
                                <input type="text" class="form-control" placeholder="vendor email" name="vendor_email">
                            </div>
                            <div class="mb-3 form-group">
                                <label for="" class="form-label">Vendor Phone Number</label>
                                <input type="text" class="form-control" placeholder="vendor phone" name="vendor_phone">
                            </div>
                            <div class="mb-3 form-group">
                                <label for="" class="form-label">Vendor Address</label>
                                <input type="text" class="form-control" placeholder="vendor address" name="vendor_address">
                            </div>

                            <button type="submit" class="btn btn-primary">Add New Vendor</button>
                          </form>
                    </div>
                </div>
            </div>

        </div>
    </div>
@endsection
