<?php

namespace App\Http\Controllers;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class GestionComptesController extends Controller
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
        $users = DB::table('users')->get();
        return view('admin.gestionComptes', array('users'=>$users));
    }

    public function approuver(Request $request)
    {
        $data = $request->all();

        $user_id= $data['id_user'];
        $active= $data['active'];

        $user = User::find($user_id);
                //update table users  
        $user->active=$active;
                     $user->save();

       return redirect()->action('GestionComptesController@index');
    }
}
