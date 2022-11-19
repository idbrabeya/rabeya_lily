<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;

class FrontendController extends Controller
{
    public function index(){
         if(Category::where('status','show')->count()==0){
            $category=Category::latest()->limit(3)->get();

         }else{
            $category=Category::where('status','show')->get();
         }
        $all_product= Product::all();
        return view('frontend.index',compact('category','all_product'));
    }
    public function product_details($slug){

          return view('frontend.productdetails',[
          'single_product_details'=>Product::where('product_slug',$slug)->firstOrFail()
          ]);
    }
    public function categorywiseproducts($category_id){
          return view('frontend.categorywiseproduct',[
              'categorywiseproduct'=>Product::where('category_id',$category_id)->get(),
          ]);
    }
}
