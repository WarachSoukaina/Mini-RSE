<?php

namespace App\Http\Controllers;

use App\Conversation;
use App\User;
use Illuminate\Http\Request;

class MessageController extends Controller
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
   
    public function messagIn(Request $request)
    {
         $data = $request->all();        

         $message=$data['msg'];
         $user_id=$data['from'];
         $group_id=$data['to'];

         $mess = new Conversation();
         $mess->user_id=auth()->user()->id;// from
         $mess->group_id=$group_id;//to group
         $mess->message=$message;
         $mess->save();

    return redirect()->action('DiscussionController@index');

    }
}
