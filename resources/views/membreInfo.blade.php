@extends('master')
@section('content')
 <main class="app-content">
  <div class="col-lg-7">
            <div class="bs-component">
              <div class="card">
                <h4 class="card-header">Les informations personnelles de membre :</h4>
                <br><br><br>
                <div class="info">
                <center><img class="user-img app-sidebar__user-avatar" src="http://127.0.0.1:8000/images/userpicture/{{$user->photo }}" alt="user image" width="130"></center>

                </div>
                <div class="card-body">
                 <center>
                  <p class="card-text">
                    <h5 class="card-title">Nom : {{$user->name }}</h5>
                    <br>
              <h6 class="card-subtitle text-muted"> Poste actuel : {{$user->poste }}</h6><br>
              <h6 class="card-subtitle text-muted"> E-mail : {{$user->email }}</h6><br>
              <h6 class="card-subtitle text-muted"> Date de naissance : {{$user->date_ne }}</h6><br>

                  </p>
                  </center>
                </div>
                <div class="card-footer text-muted"></div>
              </div>
            </div>
          </div>
     
    </main>

@endsection