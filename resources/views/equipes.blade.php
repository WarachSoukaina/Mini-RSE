@extends('master')

@section('content')


	 <main class="app-content">
    
      <!-- Containers-->
      <div class="tile mb-4">
        <div class="row">
          <div class="col-lg-12">
            <div class="page-header">
              <h2 class="mb-3 line-head" id="containers">Les équipes de l'entreprise ...</h2>
            </div>
            
          </div>
        </div>
        
        <div class="row">
          <div class="col-lg-8">
            <div class="bs-component">
              <ul class="list-group">
                <li class="list-group-item active">Les équipes :</li>

                <table class="table table-bordered">
              <thead>
                <tr>
                  
                  <th>#Nom d'équipe </th>
                  <th>#Chef d'équipe</th>
                  
                </tr>
              </thead>
              @if(isset($equipes))
              <tbody>
              	@foreach($equipes as $equipe)
                <tr>
					<td>{{$equipe->nom_eq}}</td>
                	@foreach($users as $user)
								@if($user->id==$equipe->chef_eq)
								<td>{{$user->name}}</td> 
								@endif
							@endforeach
					 

					 
                  
                  
                </tr>
@endforeach
                @endif
              </tbody>
            </table>
               
               
              </ul>
            </div>
          </div>
         
          
        </div>
    </main>
@endsection

