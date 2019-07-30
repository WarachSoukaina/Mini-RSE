<?php

namespace App\Http\Controllers;
use Auth;
use App\Departement;
use App\Equipe;
use App\User;
use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;
class ProfileController extends Controller
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


		$user = User::find(auth()->user()->id);
		$equipe=Equipe::where('id', '=',  $user->equipe_id)->first();
	
		$depart=Departement::where('id', '=',  $user->departement_id)->first();
		$equipes=Equipe::all();
        $departements=Departement::all();
        return view('profil', array('eq'=>$equipe,'dep'=>$depart,'equipes'=>$equipes,'departements'=>$departements)); 
    }

    public function photoUp(Request $request)
   {
    if($request->hasFile('picture'))
        {
             var_dump($request->hasFile('picture'));
            $picture = $request->file('picture');
            $filename = time() . '.' . $picture->getClientOriginalExtension();
            Image::make($picture)->resize(100,100)->save(public_path('/images/userpicture/'. $filename));
            $user = Auth::user();
            $user->photo = $filename;
            $user->save();
        }
         
         return redirect()->action('ProfileController@index');
              

      }

      public function editer(Request $request)
      {
          $data = $request->all();
                $user = User::find(auth()->user()->id);
                //update table users  
                $user->name=$data['nom'];
                $user->email = $data['email'];
                $user->date_ne=$data['date_ne'];
                $user->equipe_id=$data['nom_eq'];
                $user->departement_id=$data['nom_dep'];

                  $user->save();

       return redirect()->action('ProfileController@index');
      }

}
