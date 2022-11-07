<?php

namespace App\Http\Controllers;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Mail\EmailOffer;

class HomeController extends Controller
{


    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        return view('home',[
               'Total_users'=>User::count(),
               'Total_Admin'=>User::where('role',2)->count(),
               'Total_Customer'=>User::where('role',1)->count(),
        ]);
        // echo User::count();
        // echo User::where('role',1)->count();
    }
    public function email_offer(){

        // echo User::all();
        return view('emailoffer',[
            'customer'=>User::where('role',1)->get()
        ]);
    }
    public function single_email_offer($id){
        // return view('gfg');

         Mail::to(User::find($id)->email)->send(new EmailOffer());
         return back();
    }
    public function check_email_offer(Request $request){
        //  echo 'dsfjh';

        foreach ($request->check as $id) {
          Mail::to(User::find($id)->email)->send(new EmailOffer());
        }
        return back();
    }
}
