@extends('master')

@section('content')
<main class="app-content">
      
      <div class="row">
        <div class="col-md-12"><!-- Trigger the modal with a button -->
  <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#myModal"><b>+</b> Créer un evenement </button>
        	<br>
        	<br>
        				 

  <!-- Modal -->
  <div class="modal fade " id="myModal" role="dialog" >
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
        
        <div class="modal-body">
          <p><h3> Créer un événement :</h3></p>
			<form action="/creerEvent" method="post">
                <div class="form-group">
                  <label class="control-label">Titre :</label>
                  <input class="form-control" type="text" placeholder="Entrer le titre de l'evenement" name="titre">
				 <input type="hidden" name="_token" value="{{csrf_token()}}"><br>

                </div>
                <div class="form-group">
                  <label class="control-label">Lieu :</label>
                  <input class="form-control" type="text" placeholder="Entrer le lieu de l'evenement" name="lieu">
                </div>
                <div class="form-group">
                  <label class="control-label">La date :</label>
                  <input class="form-control" type="datetime-local" placeholder="Entrer la date de l'evenement" name="date_event" >
                </div>
                <div class="form-group">
                  <label class="control-label">Description :</label>
                  <textarea class="form-control" rows="4" placeholder="..." name="description"></textarea>
                </div>
                
                <div class="form-group">
                  <label class="control-label">Visible par :</label>
                  
                </div>
                <div class="form-group">
                  <div class="form-check">
                    <label class="form-check-label">
                      <input class="form-check-input" type="checkbox" value="1" checked disabled> Votre équipe
                      <input type="text" name="nom_eq" value="{{Auth::user()->equipe_id }}" hidden>
                    </label>
                    <br>
                    <label class="form-check-label">
                      <input class="form-check-input" type="checkbox" value="1" name="all">Tout l'entreprise
                    </label>
                  </div>
                </div>
                <input type="hidden" name="created_by" value="{{Auth::user()->name }}">
					<button type="submit" class="btn btn-primary"> Créer </button>
										&nbsp;&nbsp;&nbsp;
				      <button type="button" class="btn btn-default" data-dismiss="modal">Annuler</button>

              </form>
				      
				      
        </div>
        
      </div>
      
    </div>
  </div>
			@if(isset($events))
				@foreach($events as $event)
        @if($event->active!=0 )
          <div class="tile">
            <h3 class="tile-title">{{$event->titre}} </h3>
            <h5>à {{$event->date_event}} , {{$event->lieu}} </h5>
            <div class="tile-body">{{$event->description}}</div>
            <div class="tile-footer"><a class="btn btn-primary" href="#">lire plus ...</a>
              &nbsp;&nbsp;&nbsp;&nbsp;
            
                        
            <button class="btn btn-default" disabled style="color: #28a745"> publié </button>
            &nbsp;&nbsp;&nbsp;
            @foreach($vis as $vi)
                @if($vi->all==1&& $event->id==$vi->evenement_id)
                <button class="btn btn-default" disabled style="color: #00635a;"> visible par toute l'entreprise</button>
                
                @elseif($vi->equipe_id==Auth::user()->equipe_id)
                
                <button class="btn btn-default" disabled style="color: #00635a;">visible par votre équipe </button>
                 @endif
                @endforeach   
@elseif($event->active==0 && $event->created_by==Auth::user()->name)
<div class="tile">
<h3 class="tile-title">{{$event->titre}} </h3>
            <h5>à {{$event->date_event}} , {{$event->lieu}} </h5>
            <div class="tile-body">{{$event->description}}</div>
            <div class="tile-footer"><a class="btn btn-primary" href="#">lire plus ...</a>
              &nbsp;&nbsp;&nbsp;&nbsp;

<button class="btn btn-default" disabled> n'est pas publié</button>
          

            @endif
            </div>
          </div>
			@endforeach
          @endif
        </div>
        
        <div class="clearfix"></div>
        
          </div>
        </div>
      </div>
    </main>
@endsection