@extends('master')

@section('content')


	 <main class="app-content">
    
      <!-- Containers-->
      <div class="tile mb-4">
        <div class="row">
          <div class="col-lg-12">
            <div class="page-header">
              <h2 class="mb-3 line-head" id="containers">Les Projets en cours ...</h2>
            </div>
            
          </div>
        </div>
        
        <div class="row">
          <div class="col-lg-8">
            <div class="bs-component">
              <ul class="list-group">
                <li class="list-group-item active">Les projets de votre équipe :</li>

                <table class="table table-bordered">
              <thead>
                <tr>
                  
                  <th>#Intitulé du projet </th>
                  <th>#Chef de projet</th>
                  
                </tr>
              </thead>
              @if(isset($projets))
              <tbody>
              	@foreach($projets as $projet)
                <tr>
					<td>{{$projet->nom_projet}}</td>
                	@foreach($users as $user)
								@if($projet->chef_projet==$user->id)
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