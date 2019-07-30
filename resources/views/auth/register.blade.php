<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Main CSS-->
    <link rel="stylesheet" type="text/css" href="admin/css/main.css">
    <!-- Font-icon css-->
    <link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <title>Créer compte</title>
  </head>
  <body>
    <section class="material-half-bg">
      <div class="cover"></div>
    </section>
    <section class="login-content">
      <div class="logo">
        <h1>Mini-RSE</h1>
      </div>

 <div class="col-md-6">
          <div class="tile">
            <h3 class="tile-title"><i class="fa fa-lg fa-fw fa-user"></i> Créer votre compte ici :</h3>
            <div class="tile-body">
              <form class="login-form" method="POST" action="{{ route('register') }}">
                        {{ csrf_field() }}
                                <div class="form-group">
                            <label for="name" class="control-label  ">Nom :</label>

                            <div class="">
                                <input id="name" type="name" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" name="name" value="{{ old('name') }}" required>

                                @if ($errors->has('name'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="email" class="control-label  ">E-mail :</label>

                            <div class="">
                                <input id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" required>

                                @if ($errors->has('email'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="date_ne" class="control-label  ">Date de naissance :</label>

                            <div class="">
                                <input id="date_ne" type="date" class="form-control" name="date_ne"  required>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="poste" class="control-label  ">Votre poste :</label>

                            <div class="">
                              <select name="poste" class="custom-select" id="select_postes">
                               
                                <option value="collaborateur">collaborateur</option>
                                <option value="chef d'équipe">chef d'équipe</option>
                                <option value="chef de projet">chef de projet</option>
                                <option value="chef de département">chef de département</option>
                              </select>
                                
                            </div>
                        </div>
                        
                        <div class="form-group"  id="div_eq">
                            <label for="eqp" class="control-label  ">équipe (Quelle équipe ?) :</label>
                            @if(isset($equipes))
                            <div class="">
                                <select name="nom_eq" class="custom-select" id="select_equipes">
                                    @foreach ($equipes as $equipe) 
                             
                                  <option value="{{ $equipe->id}}">{{ $equipe->nom_eq }}</option>
                                                                @endforeach
                                </select>
                                
                            </div>
                            @endif
                        </div>
                        <div class="form-group" >
                            <label for="dep" class="control-label  ">Département :</label>
                                                @if(isset($departements))
                            <div class="">
                              <select name="nom_dep" class="custom-select" id="select_departs">
                                    @foreach ($departements as $departement) 
                             
                                  <option value="{{ $departement->id}}">{{ $departement->nom_dep }}</option>
                                                                @endforeach
                                </select>
                                
                            </div>
                            @endif
                        </div>
                       
                        <input type="hidden" name="active" value="0">
                            
                        <div class="form-group">
                            <label for="password" class="control-label  ">Mot de passe :</label>

                            <div class="">
                                <input id="password" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" required>

                                @if ($errors->has('password'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="password-confirm" class="control-label  ">Confirmer Mot de passe :</label>

                            <div class="">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required>
                            </div>
                        </div>
                                
                        <div class="form-group ">
                            <div class="">
                                <button type="submit" class="btn btn-primary">
                                Valider
                                </button>
                            </div>
                        </div>

                    </form>

            </div>
            
          </div>
        </div>

    <!--*************************************************-->

    </section>


    <!-- Essential javascripts for application to work-->
    <script src="admin/js/jquery-3.2.1.min.js"></script>
    <script src="admin/js/popper.min.js"></script>
    <script src="admin/js/bootstrap.min.js"></script>
    <script src="admin/js/main.js"></script>
    <!-- The javascript plugin to display page loading on top-->
    <script src="admin/js/plugins/pace.min.js"></script>

   
  </body>
</html>