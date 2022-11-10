
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
                      Category List
                    </div>
                    <div class="card-body">
                       <table class="table table-bordered">
                           <thead>
                               <tr>
                                   <th>Category Name</th>
                                   <th>Category Tagline</th>
                                   <th>Category Photo</th>
                                   <th>Action</th>
                               </tr>
                           </thead>
                           <tbody>
                               @foreach ($category as $categories)
                               <tr>
                                <td>{{ $categories->category_name }}</td>
                                <td>{{ $categories->category_tagline }}</td>
                                <td>
                                    <img width="130" src="{{ asset('uploads/category_photos') }}/{{ $categories->category_photo }}" alt="Not Found">
                                </td>
                                <td>
                                    <a href="{{ route('category.edit',$categories->id) }}" class="btn btn-info btn-sm ">Eidt</a>
                                    <br>
                                    <a href="{{ route('category.edit',$categories->id) }}" class="btn btn-warning btn-sm mt-2">Show</a>
                                    <form class="mt-2" action="{{ route('category.destroy',$categories->id) }}" method="POST">
                                        @csrf @method('DELETE')
                                        <button class="btn btn-danger btn-sm">Delete</button>
                                    </form>
                                </td>
                            </tr>
                               @endforeach
                           </tbody>
                        </table>
                    </div>
                </div>
            </div>

        </div>
    </div>
@endsection
