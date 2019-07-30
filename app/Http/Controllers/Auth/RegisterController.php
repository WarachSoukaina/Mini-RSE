<?php

namespace App\Http\Controllers\Auth;
use Auth;
use App\Departement;
use App\Equipe;
use App\Projet;
use App\User;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\DB;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = '/notification';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:6|confirmed',
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return User
     */
    protected function create(array $data)
    {
       

        $ideq=$data['nom_eq'];

        $iddepart= $data['nom_dep'];

        $user = new User([
            'name' => $data['name'],
            'email' => $data['email'],
            'poste'=> $data['poste'],
            'password' => bcrypt($data['password']),
            'date_ne'=> $data['date_ne'],
            'active'=> $data['active'],          
        ]);
        
      
      
       $user->equipe()->associate($ideq);
        $user->departement()->associate( $iddepart);
        $user->save();
        
        Auth::guard('web')->logout();
        return $user;
    }



    public function getInfo()
    {

         $equipes = DB::table('equipes')->orderBy('nom_eq', 'asc')
                ->get();
          $departements = DB::table('departements')->orderBy('nom_dep', 'asc')
                ->get();
           $projets = DB::table('projets')->orderBy('nom_projet', 'asc')
                ->get();  
                       
          return view('auth.register',array('equipes' => $equipes,'departements'=>$departements,'projets'=>$projets ));
    }
}
