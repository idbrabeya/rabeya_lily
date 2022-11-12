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
                      Edit Category
                    </div>
                    <div class="card-body">
                        <form action="{{ route('category.update',$category_edit->id) }}" method="POST" enctype="multipart/form-data">
                            @csrf @method('PATCH')
                            <div class="mb-3 form-group">
                                <label for="" class="form-label">Category Status</label>
                                <select name="status" id="" class="form-control">
                                    <option value="show" {{ ($category_edit->status=='show')?'selected':'' }}>Show</option>
                                    <option value="hide" {{ ($category_edit->status=='hide')?'selected':'' }}>Hide</option>
                                </select>
                              </div>
                            <div class="mb-3 form-group">
                              <label for="" class="form-label">Category Name</label>
                              <input type="text" class="form-control" placeholder="Category Name" name="category_name" value="{{ $category_edit->category_name }}">

                                  @error('category_name')
                                      <span class="text-danger">{{ $message }}</span>
                                  @enderror

                            </div>
                            <div class="mb-3 form-group">
                                <label for="" class="form-label">Category Tagline</label>
                                <input type="text" class="form-control" placeholder="Category tagline" name="category_tagline" value="{{ $category_edit->category_tagline }}">
                                @error('category_tagline')
                                <span class="text-danger">{{ $message }}</span>
                                 @enderror
                            </div>
                            <div class="mb-3 form-group">
                                <label for="" class="form-label">Old Category Photo</label>
                                <img width="150" src="{{ asset('uploads/category_photos').'/'.$category_edit->category_photo }}" alt="">
                            </div>
                            <div class="mb-3 form-group">
                                <label for="" class="form-label">New_Category Photo</label>
                                <input type="file" class="form-control" name="new_category_photo" value="">
                            </div>

                            <button type="submit" class="btn btn-primary">Edit {{$category_edit->category_name }} Category</button>
                          </form>
                    </div>
                </div>
            </div>

        </div>
    </div>
@endsection
