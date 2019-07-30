@extends('master')

@section('content')

 <main class="app-content">
      <div class="row user">
        <div class="col-md-12">

<div class="row">
        <div class="col-md-8">
          <div class="tile">
            <h3 class="tile-title">Bienvenue <u>{{Auth::user()->name}}</u></h3>
            <ul>
              <li>Built with Bootstrap 4, SASS and PUG.js</li>
              <li>Fully responsive and modular code</li>
              <li>Seven pages including login, user profile and print friendly invoice page</li>
              <li>Smart integration of forgot password on login page</li>
              <li>Chart.js integration to display responsive charts</li>
              <li>Widgets to effectively display statistics</li>
              <li>Data tables with sort, search and paginate functionality</li>
              <li>Custom form elements like toggle buttons, auto-complete, tags and date-picker</li>
              <li>A inbuilt toast library for providing meaningful response messages to user's actions</li>
            </ul>
            <p>Vali is a free and responsive admin theme built with Bootstrap 4, SASS and PUG.js. It's fully customizable and modular.</p>
            <p>Vali is is light-weight, expendable and good looking theme. The theme has all the features required in a dashboard theme but this features are built like plug and play module. Take a look at the <a href="http://pratikborsadiya.in/blog/vali-admin" target="_blank">documentation</a> about customizing the theme colors and functionality.</p>
            <p class="mt-4 mb-4"><a class="btn btn-success mr-2 mb-2" href="/" target="_blank"><i class="fa fa-home"></i>L'accueil générale</a></p>
          </div>
        </div>
       
       <div class="col-md-4">
           <div class="tile">
               <u><h6>les infos de l'entreprise </h6></u>
               @if(isset($infos))
                  Societé : <h6> {{$infos->nom}}</h6>
                  
                 Description : <h6>{{$infos->description}}</h6>

               @endif
               <br>
               
           </div>

       </div>
      </div>
    </main>
@endsection
