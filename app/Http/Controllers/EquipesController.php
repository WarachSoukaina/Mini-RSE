<?php

namespace App\Http\Controllers;

use App\Equipe;
use App\Projet;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class EquipesController extends Controller
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
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */


   public function index()
   {
    $equipes = DB::table('equipes')->get();
         $users=DB::table('users')->get();
   	return view('equipes',array('equipes'=>$equipes,'users'=>$users));
   }
}
