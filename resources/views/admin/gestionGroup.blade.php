@extends('admin.master_admin')

@section('content')
  
  <main class="app-content">
      <div class="app-title">
        <div>
          <h1><i class="fa fa-edit"></i> Gestion des Groupes :</h1>
          
        </div>
        
      </div>
      <div class="row">
        <div class="col-md-8">
          <div class="tile">
            <h3 class="tile-title">les informations de groupe :</h3>
            <div class="tile-body">
              <form method="post" action="/admin/creerGroupe">
                <div class="form-group">
                  <label class="control-label">Nom de groupe :</label>
                  <input class="form-control" type="text" name="nom_grp" required>
                  <input type="hidden" name="_token" value="{{csrf_token()}}">

                </div>
                <div class="form-group">
                  <label class="control-label">Ajouter un membre :</label>
                  <select class="form-control" id="exampleSelect1" name="membre">
                      @if(isset($users))
                    @foreach($users as $user)
                      <option value="{{$user->id}}">{{$user->name}}</option>
                      @endforeach
                      @endif
                    </select>
                </div>
                <div class="tile-footer">
              <button class="btn btn-primary" type="submit"><i class="fa fa-fw fa-lg fa-check-circle"></i>Créer </button>&nbsp;&nbsp;&nbsp;<a class="btn btn-secondary" href="#"><i class="fa fa-fw fa-lg fa-times-circle"></i>Annuler</a>
            </div>
                
              </form>
            </div>
            
          </div>
        </div>


        <div class="clearix"></div>
       <div class="tile col-md-12">
           

            <h3 class="tile-title">La liste des Groupes :</h3>
            <table class="table">
              <thead>
                <tr>
                  <th>#id</th>
                  <th>Nom de groupe </th>
                  <th>consulter le groupe</th>
                  
                </tr>
              </thead>
              <tbody>
                @if(isset($groups))
                @foreach($groups as $group  )
                <tr class="table-info">
                  <td>{{$group->id}}</td>
                  <td>{{$group->name}}</td>
                  <td><a href="/admin/membres/{{$group->id}}">#les membres </a></td>
                  
                </tr>
                @endforeach
                @endif
               
              </tbody>
            </table>
          </div>
      </div>
    </main>


@endsection