<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Image;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('category.index',[
            'category'=>Category::all(),
        ]);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('category.create');
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
            'category_name'=>'required',
            'category_tagline'=>'required',
            'category_photo'=>'required|image',
        ]);

        // category_photo_upload start
        $category_photo= Auth::id().'-'.time().'-'.Str::random(4).'.'. $request->file('category_photo')->getClientOriginalExtension();
        Image::make($request->file('category_photo'))->resize(600,328)->save(base_path('public/uploads/category_photos/'.$category_photo));
        //  category_photo_upload end

        // db insert start
        Category::insert([
                'category_name'=>$request->category_name,
                'category_tagline'=>$request->category_tagline,
                'category_photo'=>$category_photo,
                'created_at'=>Carbon::now(),
        ]);
        return back();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {

        return view('category.show',[
            'category_show'=> Category::find($id)
        ]);
    }

    /**
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        ;
        return view('category.edit',[
            'category_edit'=>Category::find($id),
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        if ($request->hasFile('new_category_photo')) {
            $new_category_photo= Auth::id().'-'.time().'-'.Str::random(4).'.'. $request->file('new_category_photo')->getClientOriginalExtension();
            // delete old photo
            // Unlink(base_path('public/uploads/category_photos/'.Category::find($id)->category_photo));
            unlink( base_path('public/uploads/category_photos/'.Category::find($id)->category_photo));
            // upload new photo
            Image::make($request->file('new_category_photo'))->resize(600,328)->save(base_path('public/uploads/category_photos/'.$new_category_photo));
            //    update to database
            Category::find($id)->update([
                'category_photo'=> $new_category_photo,
            ]);
        }
          Category::find($id)->update([
              'category_name'=>$request->category_name,
              'category_tagline'=>$request->category_tagline,
              'status'=>$request->status,
          ]);
          return back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
          $category= Category::find($id);
          unlink( base_path('public/uploads/category_photos/'. $category->category_photo));
          $category->delete();
          return back();
    }
}
