<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class FrontendController extends Controller
{
    public function index(){
         if(Category::where('status','show')->count()==0){
            $category=Category::latest()->limit(3)->get();

         }else{
            $category=Category::where('status','show')->get();
         }
        return view('frontend.index',compact('category'));
    }
}
