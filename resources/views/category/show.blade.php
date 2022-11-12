
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
                      Category Show
                    </div>
                    <div class="card-body">
                       <table class="table table-bordered">
                           <thead>
                               <tr>
                                   <th>Category Name</th>
                                   <th>Category Tagline</th>
                                   <th>Category Photo</th>
                               </tr>
                           </thead>
                           <tbody>
                               <tr>
                                <td>{{ $category_show->category_name }}</td>
                                <td>{{ $category_show->category_tagline }}</td>
                                <td>
                                    {{-- <img width="130" src="{{ asset('uploads/category_photos') }}/{{ $categories->category_photo }}" alt="Not Found"> --}}

                                    <img width="130" src="{{ asset('uploads/category_photos') }}/{{ $category_show->category_photo }}" alt="Not Found">
                                </td>

                            </tr>
                           </tbody>
                        </table>
                    </div>
                </div>
            </div>

        </div>
    </div>
@endsection
