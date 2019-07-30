<?php

namespace App\Http\Controllers;
use App\Equipe;
use App\Evenement;
use App\visibilEvent;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\DB;

class GestionEventController extends Controller
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
       
            $events = DB::table('visibil_events')
            ->join('evenements', 'visibil_events.evenement_id', '=', 'evenements.id')
            ->select('evenements.*', 'visibil_events.all','visibil_events.equipe_id')->orderBy('created_at','desc')->get();
            
    return view('admin.gestionEvent',array('events'=>$events));
        
    }


   public function creerEvent(Request $request)
   {
     $data=$request->all();

     $active=1;

     $titre=$data['titre'];
     $date_event=$data['date_event'];
     $lieu=$data['lieu'];
     $description=$data['description'];
     $id_equipe=0;
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
           return redirect()->action('GestionEventController@index');

   }

   public function activer(Request $request)
    {
        $data = $request->all();

        $id_event= $data['id_event'];
        $active= $data['active'];

        $event = Evenement::find($id_event);
                //update table users  
        $event->active=$active;
                     $event->save();

       return redirect()->action('GestionEventController@index');
    }

}
