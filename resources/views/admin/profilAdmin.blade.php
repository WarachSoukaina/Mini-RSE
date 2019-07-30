@extends('admin.master_admin')
@section('content')
 <main class="app-content">
  <div class="col-lg-7">
            <div class="bs-component">
              <div class="card">
                <h4 class="card-header">Le profile Administrateur :</h4>
                <br><br><br>
                <div class="info">
                <center><img class="user-img app-sidebar__user-avatar" src="http://127.0.0.1:8000/images/userpicture/default.jpg" alt="user image" width="130"></center>

                </div>
                <div class="card-body">
                 <center>
                  <p class="card-text">
                    <h5 class="card-title">Nom : {{ Auth::user()->name }}</h5>
                    <br>
              <h6 class="card-subtitle text-muted"> Poste  : Administrateur </h6><br>
              <h6 class="card-subtitle text-muted"> E-mail : {{ Auth::user()->email }}</h6><br>
              <br>

                  </p>
                  </center>
                </div>
                <div class="card-footer text-muted"></div>
              </div>
            </div>
          </div>
     
    </main>

@endsection