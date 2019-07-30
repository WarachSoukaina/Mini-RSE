<?php

namespace App\Http\Controllers;

use App\MembresGroup;
use App\Group;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\DB;
class GestionGroupController extends Controller
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

            $groups=DB::table('groups')->get();
            $users=DB::table('users')->get();
            /*$con=DB::table('members_groups')->get();

            var_dump($con);*/

        return view('admin.gestionGroup',array('groups'=>$groups,'users'=>$users));
    }
   public function creerGroupe(Request $req)
{
    $data=$req->all();

    
  $nom_grp= $data['nom_grp'];
  $id_membre=(int)$data['membre'];
                            
                                //check if new group already exist
$groupverif = Group::where('name', $nom_grp) ->first();

 if($groupverif==null)
    {

                 $group = new Group(['name'=>$nom_grp,]);
  $group->save();

  $id_group=$group->id;

  $membres=DB::insert('insert into members_groups (group_id,user_id) values ( ?, ?)', [$id_group,$id_membre ]);

  

           return redirect()->action('GestionGroupController@index');


  }else
  {
    $id_group=$groupverif->id;

  $membres=DB::insert('insert into members_groups (group_id,user_id) values ( ?, ?)', [$id_group,$id_membre ]);

           return redirect()->action('GestionGroupController@index');


  }


}

public function getMembres($id)
{
  $group=DB::table('groups')->where('id',$id)->first();

            $m = DB::table('members_groups')
            ->join('users', 'members_groups.user_id', '=', 'users.id')
            ->select('users.*', 'members_groups.user_id')->where('group_id',$id)->get();
//print($m);

        return view('admin.membresGroup',array('m'=>$m,'group'=>$group));




}

public function membreInfo($id)
   {
     
     $user=DB::table('users')->where('id',$id)->first();

     return view('admin.membre',array('user'=>$user));

   }

    
}
