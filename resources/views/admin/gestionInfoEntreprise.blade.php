@extends('admin.master_admin')

@section('content')
  
  <main class="app-content">
      <div class="app-title">
        <div>
          <h1><i class="fa fa-edit"></i> Gestion des inforamations d'entreprise :</h1>
          
        </div>
        
      </div>
      <div class="row">
        <div class="col-md-6">
          <div class="tile">
            <h3 class="tile-title">les informations sur l'équipe :</h3>
            <div class="tile-body">
              <form action="/admin/equipe" method="post">
                <div class="form-group">
                  <label class="control-label">Nom d'équipe :</label>
                  <input class="form-control" type="text" name="nom_eq" required>
                  <input type="hidden" name="_token" value="{{csrf_token()}}">

                </div>
                <div class="form-group">
                  <label class="control-label">Chef d'équipe :</label>
                  <select class="form-control" id="exampleSelect1" name="chef_eq">
                    @if(isset($users))
                    @foreach($users as $user)
                      <option value="{{$user->id}}">{{$user->name}}</option>
                      @endforeach
                      @endif
                    </select>
                </div>
                <div class="tile-footer">
              <button class="btn btn-primary" type="submit"><i class="fa fa-fw fa-lg fa-check-circle"></i>Enregistrer </button>&nbsp;&nbsp;&nbsp;<a class="btn btn-secondary" href="#"><i class="fa fa-fw fa-lg fa-times-circle"></i>Annuler</a>
            </div>
                
              </form>
            </div>
            
          </div>
        </div>


        <div class="col-md-6">
          <div class="tile">
            <h3 class="tile-title">les informations sur les projets :</h3>
            <div class="tile-body">
              <form action="/admin/projets" method="post">
                <div class="form-group">
                  <label class="control-label">Nom de projet :</label>
                  <input class="form-control" type="text" name="nom_proj" required>
                  <input type="hidden" name="_token" value="{{csrf_token()}}">
                </div>
                <div class="form-group">
                  <label class="control-label">Chef de projet :</label>
                  <select class="form-control" id="exampleSelect1" name="chef_proj">
                      @if(isset($users))
                    @foreach($users as $user)
                      <option value="{{$user->id}}">{{$user->name}}</option>
                      @endforeach
                      @endif
                    </select>
                 </div>
                
                            <div class="tile-footer">
              <button class="btn btn-primary" type="submit"><i class="fa fa-fw fa-lg fa-check-circle"></i>Enregistrer </button>&nbsp;&nbsp;&nbsp;<a class="btn btn-secondary" href="#"><i class="fa fa-fw fa-lg fa-times-circle"></i>Annuler</a>
            </div>
              </form>
            </div>

          </div>
        </div>
        <div class="col-md-6">
          <div class="tile">
            <h3 class="tile-title">Les informations de départements :</h3>
            <div class="tile-body">
             <form action="/admin/depart" method="post">
                <div class="form-group">
                  <label class="control-label">Nom de département :</label>
                  <input class="form-control" type="text" name="nom_dep" required>
                  <input type="hidden" name="_token" value="{{csrf_token()}}">
                </div>
                <div class="form-group">
                  <label class="control-label">Chef de département :</label>
                  <select class="form-control" id="exampleSelect1" name="chef_dep">
                    @if(isset($users))
                    @foreach($users as $user)
                      <option value="{{$user->id}}">{{$user->name}}</option>
                      @endforeach
                      @endif
                    </select>
                 </div>
                 <div class="tile-footer">
              <div class="row">
                <div class="col-md-8 col-md-offset-3">
                  <button class="btn btn-primary" type="submit"><i class="fa fa-fw fa-lg fa-check-circle"></i>Enregistrer</button>&nbsp;&nbsp;&nbsp;<a class="btn btn-secondary" href="#"><i class="fa fa-fw fa-lg fa-times-circle"></i>Annuler</a>
                </div>
              </div>
            </div>
               </form>
            </div>
            
          </div>
        </div>
        <div class="clearix"></div>
        <div class="col-md-6">
          <div class="tile">
            <h3 class="tile-title">les informations sur l'entreprise :</h3>
            <div class="tile-body">
              <form  action="/admin/ste" method="post">
                <div class="form-group ">
                  <label class="control-label">Nom d'entreprise :</label>
                  <input class="form-control" type="text" name="nom_entrep" required>
                  <input type="hidden" name="_token" value="{{csrf_token()}}">
                </div>
                <br>
                <div class="form-group ">
                  <label class="control-label">Description d'entreprise :</label>
                  
                <textarea class="form-control"  name="descrp" required>
                  
                </textarea>
                </div>

                <div class="form-group col-md-4 align-self-end">
                  <button class="btn btn-primary" type="submit"><i class="fa fa-fw fa-lg fa-check-circle"></i>Enregistrer</button>
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>
    </main>


@endsection