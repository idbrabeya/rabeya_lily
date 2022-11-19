
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
                      Product List
                    </div>
                    <div class="card-body">
                       <table class="table table-bordered">
                           <thead>
                               <tr>
                                   <th>Product Name</th>
                                   <th>Product Price</th>
                                   <th>Product Short Description</th>
                                   <th>Action</th>

                               </tr>
                           </thead>
                           <tbody>
                               @forelse ($all_product as $all_products)
                               <tr>
                                <td>{{ $all_products->product_name}}</td>
                                <td>{{ $all_products->product_price }}</td>
                                <td>{{ $all_products->short_description }}</td>
                                {{-- <td>
                                    <img width="130" src="{{ asset('uploads/category_photos') }}/{{ $categories->category_photo }}" alt="Not Found">
                                </td> --}}
                                <td>
                                    <a href="" class="btn btn-info btn-sm ">Eidt</a>
                                    <br>
                                    <a href="" class="btn btn-warning btn-sm mt-2">Show</a>
                                    <form class="mt-2" action="" method="POST">
                                        @csrf @method('DELETE')
                                        <button class="btn btn-danger btn-sm">Delete</button>
                                    </form>
                                </td>
                            </tr>
                            @empty
                             <tr class="text-danger text-center">
                                 <td colspan="50" ><span>Not found data</span></td>
                             </tr>
                            @endforelse
                           </tbody>
                        </table>
                    </div>
                </div>
            </div>

        </div>
    </div>
@endsection
