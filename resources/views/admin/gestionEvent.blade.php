@extends('admin.master_admin')

@section('content')
<main class="app-content">
      
      <div class="row">

                <div class="col-md-12">
                    <div class="app-title">
        <div>

          <h1><i class="fa fa-th-list"></i> &nbsp; Gestion des événements : </h1>

        </div>

        
      </div>
          <div class="tile">
             <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#myModal"><b>+</b> Créer un événement </button>
            <br><br><br>

            <h3 class="tile-title">La liste des événements</h3>
            <table class="table">
              <thead>
                <tr>
                  
                  <th>Titre</th>
                  <th>Date</th>
                  <th>Crée par </th>
                  <th>Visible par</th>                  
                  <th>Etat </th>
                </tr>
              </thead>
              <tbody>
                
      @if(isset($events))
        @foreach($events as $event)
                <tr class="table-success">
                  
                  <td>{{$event->titre}}</td>                  
                  <td>{{$event->date_event}}</td>
                  <td>{{$event->created_by}}</td>

            
                  <td>@if($event->all==1)
                    tout
                   @else 
                    une equipe
                    @endif
                  </td>
                 
                 
                  <td>@if($event->active==1)

              <button class="btn btn-success" type="button">Active</button>
              @else
              <form method="post" action="/admin/activerEvent">
                <input type="hidden" name="active" value="1">
                <input type="hidden" name="id_event" value="{{$event->id}}">
                 <input type="hidden" name="_token" value="{{csrf_token()}}">
              <button class="btn btn-warning" type="submit">à activer</button>
              </form> 
              @endif

              </td>
                  
                </tr>
                @endforeach
               @endif
              </tbody>
            </table>
          </div>
        </div>
        <div class="clearfix"></div>
              </div>

              <!-- Modal -->
  <div class="modal fade " id="myModal" role="dialog" >
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
        
        <div class="modal-body">
          <p><h3> Créer un événement :</h3></p>
            <form action="/admin/creerEvent" method="post">
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
                      <input class="form-check-input" type="checkbox" value="1" name="all" checked>Tout l'entreprise
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
    </main>
@endsection