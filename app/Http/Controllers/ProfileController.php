<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
 use App\Models\User;
use Auth;
use Image;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Illuminate\Auth\Events\validated;
use Illuminate\Support\Facades\Auth as FacadesAuth;

class ProfileController extends Controller
{
    public function profile(){
        return view('profile');
    }
    public function namechange(Request $request){
           $request->validate([
               'name'=>'required',
           ]);

            User::find(Auth::id())->update([
                'name'=>$request->name
            ]);
            return back()->with('success','Your Name Change successfully');
    }
    public function passwordchange(Request $request){
              $request->validate([
                  'old_password'=>'required',
                  'n_password'=>'required|min:8',
                  'confirm_password'=>'required|min:8',

              ]);
        if(Hash::check($request->old_password, Auth::user()->password)){
            if($request->n_password==$request->confirm_password){
            User::find(Auth::id())->Update([
                'password'=>bcrypt($request->n_password)
            ]);
            return back()->with('success_p','password changed successfully');
        }
        else{
            return back()->withErrors('password does not match');
        }
    }
        else{
            return back()->withErrors('Old password does not match');
        }

    }
    public function photochange(Request $request){
        $request->validate([
               'photo'=>'required|image',
        ]);
           if(Auth::user()->profile_photo!=='default.jpg'){
            unlink( base_path('public/uploads/profile_photos/'.Auth::user()->profile_photo));
           }
           $new_photo= Auth::id().'-'.time().'-'.Str::random(4).'.'. $request->file('photo')->getClientOriginalExtension();
           Image::make($request->file('photo'))->resize(300,300)->save(base_path('public/uploads/profile_photos/'.$new_photo));
           User::find(Auth::id())->update([
               'profile_photo'=> $new_photo,
           ]);
           return back()->with('photo_success','profile photo update successfully!');
        // if ( Auth::user()->profile_photo=='default.jpg') {

        //   $new_photo= Auth::id().'.'. $request->file('photo')->getClientOriginalExtension();
        //      Image::make($request->file('photo'))->save(base_path('public/uploads/profile_photos/'.$new_photo));
        //      User::find(Auth::id())->update([
        //          'profile_photo'=> $new_photo,
        //      ]);
        //      return back();
        //     // $img->save(base_path('public/uploads/profile_photos/default.jpg'));

        // }else{




        // return $request->file('photo');
    }
}
