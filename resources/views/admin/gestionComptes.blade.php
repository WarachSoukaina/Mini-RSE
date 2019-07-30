@extends('admin.master_admin')

@section('content')


 <main class="app-content">
      <div class="row ">

        <div class="col-md-12">
          <div class="tile">
            <h3 class="tile-title">Les comptes utilisateur : </h3>
            <div class="table-responsive">
              <table class="table">
                <thead>
                  <tr>
                    <th>#id</th>
                    <th>Nom </th>
                    <th>E-mail</th>
                    <th>Poste</th>
                    <th>Etat de compte</th>
                  </tr>
                </thead>
                <tbody>
                  @if(isset($users))
                  @foreach($users as $user)
                  <tr>

                    <td>{{$user->id}}</td>
                    <td>{{$user->name}}</td>
                    <td>{{$user->email}}</td>
                    <td>{{$user->poste}}</td>
                    <td>@if($user->active==1)

              <button class="btn btn-success" type="button">Active</button>
              @else
              <form method="post" action="/admin/approuver">
                <input type="hidden" name="active" value="1">
                 <input type="hidden" name="_token" value="{{csrf_token()}}">

                <input type="hidden" name="id_user" value="{{$user->id}}">
              <button class="btn btn-warning" type="submit">à approuver</button>
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
        </div>
        
</div>
</main>
@endsection