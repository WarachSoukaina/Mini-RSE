@extends('admin.master_admin')

@section('content')
    <main class="app-content">
      
      <div class="row">
      
        <div class="clearfix"></div>
        
        <div class="col-md-12">
          <div class="tile">
            <h3 class="tile-title">Les membres de  {{$group->name}}:</h3>
            <div class="table-responsive">
              <table class="table">
                <thead>
                  <tr>
                    <th>#id</th>
                    <th>Nom :</th>
                    <th>Poste :</th>
                    <th> Profile</th>
                  </tr>
                </thead>
                <tbody>
                @if(isset($m))
                @foreach($m as $mb)
                  <tr>
                    <td>{{$mb->id}}</td>
                    <td>{{$mb->name}}</td>
                    <td>{{$mb->poste}}</td>
                    <td><a href="/admin/membre/{{$mb->id}}">@lien</a></td>
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