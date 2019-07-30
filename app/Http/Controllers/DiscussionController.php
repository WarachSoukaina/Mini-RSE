<?php

namespace App\Http\Controllers;
use App\Conversation;
use App\User;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\DB; 

class DiscussionController extends Controller
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

    $notif="vous n'êtes pas encore inscrit dans un groupe";

    $messages=DB::table('conversations')->get();
    $users=DB::table('users')->get();
    $group_mbr=DB::table('members_groups')->get();

    $group_actuel=DB::table('members_groups')->where('user_id',auth()->user()->id)->first();

    if($group_actuel!=null)
{
    $group_id=$group_actuel->group_id;
    
    $group_actu=DB::table('groups')->where('id',$group_id)->first();
    $nbr_gp = count($group_mbr);
    

   	return view('discussions',array('messages'=>$messages, 'users'=>$users, 'group_actu'=>$group_actu,'nbr_gp'=>$nbr_gp,'group'=>$group_mbr));
    }
        return view('discussions',array('notif'=>$notif));


   }

   public function membreInfo($id)
   {
     
     $user=DB::table('users')->where('id',$id)->first();

     return view('membreInfo',array('user'=>$user));

   }

}
