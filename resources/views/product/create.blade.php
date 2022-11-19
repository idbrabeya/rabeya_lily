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
                      Add Product
                    </div>
                    <div class="card-body">
                        <form action="{{ route('product.store') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="mb-3 form-group">
                              <label for="" class="form-label">Product Category</label>
                             <select name="category_id" id="" class="form-control">
                                 <option value="">-Select One-</option>
                                 @foreach ($category_show as $category_shows)
                                 <option value="{{$category_shows->id}}">{{$category_shows->category_name}}</option>
                                 @endforeach
                             </select>
                            </div>
                            <div class="mb-3 form-group">
                                <label for="" class="form-label">Product Name</label>
                                <input type="text" class="form-control" placeholder="product name" name="product_name">
                            </div>
                            <div class="mb-3 form-group">
                                <label for="" class="form-label">Product Price</label>
                                <input type="text" class="form-control" placeholder="product price" name="product_price">
                            </div>
                            <div class="mb-3 form-group">
                                <label for="">Product Short Description</label>
                                <textarea class="form-control" rows="2" placeholder="short_description" name="short_description"></textarea>

                            </div>
                            <div class="mb-3 form-group">
                                <label for="" >Product Long Description</label>
                                <textarea class="form-control"  rows="4" placeholder="long_description" name="long_description"></textarea>
                            </div>
                            <div class="mb-3 form-group">
                                <label for="" class="form-label">Product Code</label>
                                <input type="text" class="form-control" placeholder="product code" name="product_code">
                            </div>
                            <div class="mb-3 form-group">
                                <label for="" class="form-label">Product Photo</label>
                                <input type="file" class="form-control" name="product_photo">
                            </div>

                            <button type="submit" class="btn btn-primary">Add New Product</button>
                          </form>
                    </div>
                </div>
            </div>

        </div>
    </div>
@endsection
