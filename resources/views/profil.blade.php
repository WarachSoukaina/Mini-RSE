@extends('master')
@section('content')
 <main class="app-content">
      <div class="row user">
        <div class="col-md-12">
          <div class="profile">
            <div class="info">
            	<img class="user-img" src="images/userpicture/{{Auth::user()->photo }}">
              <h4>{{Auth::user()->name }}</h4>
              <p>{{Auth::user()->poste }}</p>
					 <!-- Trigger the modal with a button -->
  <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#myModal">Editer votre photo par <u>ici</u></button>

  <!-- Modal -->
  <div class="modal fade " id="myModal" role="dialog" >
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
        
        <div class="modal-body">
          <p>Choisissez une photo :</p>

          <form action="/editerImage" method="POST" files="true" enctype="multipart/form-data">
				<input class="form-control" type="file"  name="picture" required >
				 <input type="hidden" name="_token" value="{{csrf_token()}}"><br>

				      <button type="submit" class="btn btn-primary"> Valider </button>

				      <button type="button" class="btn btn-default" data-dismiss="modal">annuler</button>
				      </form>
        </div>
        
      </div>
      
    </div>
  </div>

            
         
        </div>
        <div class="col-md-8 ">
          <div class="tab-content">
           
            <div class="tab-pane active" id="user-settings">
              <div class="tile user-settings">
                <h4 class="line-head">Mon profile :</h4>
                <form action="/editer" method="post">
                  <div class="row mb-4">
                    <div class="col-md-2">
                      <label>Nom :  </label>
                      <input class="form-control" type="text" value="{{Auth::user()->name }}" name="nom" > 
                    </div>
                    
                  </div>
                  <div class="row">
                    <div class="col-md-7 mb-2">
                      <label>E-mail :</label>
                      <input class="form-control" type="text" value="{{Auth::user()->email }}" name="email">
                    </div>
                    <div class="clearfix"></div>
                    
                  </div>

                  <div class="row">
                    <div class="col-md-7 mb-2">
                      <label>Poste :</label>
                      <input class="form-control" type="text" value="{{Auth::user()->poste }}" name="poste">
                    </div>
                    <div class="clearfix"></div>
                    
                  </div>

                  <div class="row">
                    <div class="col-md-7 mb-2">
                      <label>Date de naissance :</label>
                      <input class="form-control" type="text" value="{{Auth::user()->date_ne }}" name="date_ne">
                    </div>
                    <div class="clearfix"></div>
                    
                  </div>

                  <div class="row">
                    <div class="col-md-7 mb-2">
                      <label>Mon équipe :</label>
                     
                      @if(isset($equipes))
                           
                       <select name="nom_eq" class="custom-select" id="inputGroupSelect01">
                              @if(isset($eq)) <option value="{{$eq->id}}" selected>{{$eq->nom_eq}}</option>
                              @endif
                                    @foreach ($equipes as $equipe) 
                             
                                  <option value="{{ $equipe->id}}">{{ $equipe->nom_eq }}</option>
                                    @endforeach
                        </select>
                                
                            
                            @endif
                      
                    </div>
                    <div class="clearfix"></div>
                    
                  </div>

                  <div class="row">
                    <div class="col-md-7 mb-2">
                      <label>Département :</label>

                       @if(isset($departements))
                            
                              <select name="nom_dep" class="custom-select" id="inputGroupSelect01">
                                @if(isset($dep))
                                <option value="{{$dep->id}}" selected>{{$dep->nom_dep}}</option>
                                @endif
                                    @foreach ($departements as $departement) 
                             
                                  <option value="{{ $departement->id}}">{{ $departement->nom_dep }}</option>
                                  @endforeach

                                </select>
                                
                            
                            @endif
                     
                    </div>
                    <div class="clearfix"></div>
                    
                  </div>
                      
                  <div class="row mb-9">
                    <div class="col-md-9">
                      {{ csrf_field() }}
                      <button class="btn btn-primary" type="submit"><i class="fa fa-fw fa-lg fa-check-circle"></i> Editer </button>
                    </div>
                  </div>
                </form>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  
    </main>

@endsection