<?php

namespace App\Http\Controllers;
use Auth;
use App\User;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\DB;
class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $infos=DB::table('info_entreprises')->first();
        $user=User::find(auth()->user()->id);
        if($user->active ==1){
            return view('home',array('infos'=>$infos));
        }
        else{

        Auth::guard('web')->logout();
            return redirect('/notification');
        }
        return ;
    }
}
