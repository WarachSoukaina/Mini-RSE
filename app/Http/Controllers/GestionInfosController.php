<?php

namespace App\Http\Controllers;

use App\Departement;
use App\Equipe;
use App\Projet;
use App\User;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\DB;
class GestionInfosController extends Controller
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
        return view('admin.gestionInfoEntreprise',array('users'=>$users));
    }

    public function gestionEquipe(Request $request)
    {
       $data = $request->all();
        $nom_eq=$data['nom_eq'];
        $id_chef_eq=(int)$data['chef_eq'];

        $equipe = new Equipe(['nom_eq' => $nom_eq,
                            'chef_eq' => $id_chef_eq,
                        ]);
       

            $equipe->save();

           return redirect()->action('GestionInfosController@index');

    }

    public function gestionProjet(Request $request)
    {
       $data = $request->all();

       $nom_proj=$data['nom_proj'];
       $chef_proj=(int)$data['chef_proj'];

       $projet= new Projet(['nom_projet'=>$nom_proj,
                            'chef_projet'=>$chef_proj,
            ]);

       $projet->save();

        return redirect()->action('GestionInfosController@index');
    }

    public function gestionDepart(Request $request)
    {
       $data = $request->all();


       $nom_dep=$data['nom_dep'];
       $chef_dep=(int)$data['chef_dep'];

       $depart= new Departement(['nom_dep'=>$nom_dep,
                            'chef_dep'=>$chef_dep,
            ]);

       $depart->save();

        return redirect()->action('GestionInfosController@index');

    }

    public function gestionInfos(Request $request)
    {
       $data = $request->all();
       $nom_entrep=$data['nom_entrep'];
       $descrp=$data['descrp'];

       $info= DB::insert('insert into info_entreprises (nom,description) values ( ?, ?)', [$nom_entrep,$descrp ]);
       return redirect()->action('GestionInfosController@index');

    }
}
