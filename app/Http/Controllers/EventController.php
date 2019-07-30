<?php

namespace App\Http\Controllers;
use Auth;
use App\Equipe;
use App\Evenement;
use App\visibilEvent;
use Illuminate\Http\Request;

class EventController extends Controller
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

    $events=Evenement::orderBy('created_at', 'DESC')->get();
    $vis=visibilEvent::orderBy('created_at', 'DESC')->where('all','1')->get();
   	return view('evenements',array('events'=>$events,'vis'=>$vis));
   }


   public function creerEvent(Request $request)
   {
     $data=$request->all();

     $active=0;

     $titre=$data['titre'];
     $date_event=$data['date_event'];
     $lieu=$data['lieu'];
     $description=$data['description'];
     $id_equipe=$data['nom_eq'];
     $created_by=$data['created_by'];
     if(isset($data['all']))
     {
      $all=$data['all'];
     }else
     {
      $all=0;
     }
     // la creation du post :
            $event = new Evenement(['titre' => $titre,
                                    'date_event'=>$date_event,
                                    'lieu' => $lieu,
                                    'description' => $description,
                                    'active'=>$active,
                                    'created_by'=>$created_by,
                                      ]);
            $event->orderBy('created_at','desc');
            $event->save();
           // associate foreign key:
            //$event->equipe()->associate($id_equipe); 
               
               $visibilEvent= new visibilEvent(['evenement_id'=>$event->id,
                'all'=>$all,]);
               $visibilEvent->equipe()->associate($id_equipe);
                $visibilEvent->save();
           return redirect()->action('EventController@index');

   }

}


