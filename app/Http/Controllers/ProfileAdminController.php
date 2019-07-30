<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProfileAdminController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth:admin');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.profilAdmin');
    }

    public function membreInfo($id)
   {
     
     $user=DB::table('users')->where('id',$id)->first();

     return view('membreInfo',array('user'=>$user));

   }

}
