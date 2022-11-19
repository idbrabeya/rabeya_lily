<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use Intervention\Image\Facades\Image;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
          return view('product.index',[
              'all_product'=>Product::where('user_id',auth()->id())->get()
          ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('product.create',[
            'category_show'=>Category::where('status','show')->get(),
        ]);

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

          $request->validate([
              'category_id'=>'required'
          ]);

           // product_photo_upload start

          $product_photo_upload =Auth::id().'-'.time().'-'.Str::random(4).'.'.$request->file('product_photo')->getClientOriginalExtension();
          Image::make($request->file('product_photo'))->resize(270,310)->save(base_path('public/uploads/product_photos/'.$product_photo_upload));

          Product::create([
              'user_id'=>auth()->id(),
              'category_id'=>$request->category_id,
              'product_name'=>$request->product_name,
              'product_price'=>$request->product_price,
              'short_description'=>$request->short_description,
              'long_description'=>$request->long_description,
              'product_code'=>$request->product_code,
              'product_slug'=>Str::slug($request->product_name).'-'.Str::random(5).auth()->id(),
              'product_photo'=>$product_photo_upload,
              'created_at'=>Carbon::now(),
          ]);
          return back();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function show(Product $product)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function edit(Product $product)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Product $product)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy(Product $product)
    {
        //
    }
}
