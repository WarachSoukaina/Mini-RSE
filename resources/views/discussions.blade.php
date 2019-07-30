@extends('master')

@section('content')
 <main class="app-content">
      @if(isset($group))
      <div class="row">
        <div class="col-md-5">
          <div class="widget-small primary"><i class="icon fa fa-users fa-3x"></i>
            <div class="info">
              <h4>Nombre de membres</h4>
              <p><b>{{$nbr_gp}}</b></p>
            </div>
          </div>
        </div>
        
        <div class="col-md-5">
          <div class="widget-small warning"><i class="icon fa fa-files-o fa-3x"></i>
            <div class="info">
              <h4>Nombre de documents partagé</h4>
              <p><b>10</b></p>
            </div>
          </div>
        </div>
       
      </div>
        
      <div class="row">
        <div class="col-md-10">
          <div class="tile">

            <h3 class="tile-title">Discussion en cours de ({{$group_actu->name}}):</h3>
            <hr>
            <!--recupperation des messages :-->
            <div class="messanger">
              <div class="messages">

                @if(isset($messages))
                @foreach($messages as $msg)
                  @if(Auth::user()->id!=$msg->user_id)

                  @foreach($users as $user)
                  @if($user->id==$msg->user_id)
                <div class="message"><a href="/membre/{{$user->id}}" target="_blank"><img src="images/userpicture/{{$user->photo}}" width="50"></a>
                  @endif
                  @endforeach
                  <p class="info">{{$msg->message}}</p>
                </div>
                @endif
                      @if(Auth::user()->id==$msg->user_id)
                <div class="message me"><img src="images/userpicture/{{Auth::user()->photo }}" width="50">
                  <p class="info">{{$msg->message}}</p>

                </div>
                @endif

                @endforeach
               @endif
               <br><br>
              </div>
              <div>

               <!--l'envoie de messages :-->

              	<form class="sender" action="/envoyerMsg" method="post">
                <input type="text" placeholder="Envoyer le message" name="msg" required>
                <input type="text" name="from" hidden value="{{Auth::user()->id }}">
                <input type="text" name="to" hidden value="1"><!--id_group-->
                <input type="hidden" name="_token" value="{{csrf_token()}}">
          		<button class="btn btn-primary" type="button" data-toggle="tooltip" data-placement="top" title="" data-original-title="partager un document"><i class="fa fa-lg fa-fw fa-file-text"></i></button>
          		&nbsp;
                <button class="btn btn-primary" type="submit"><i class="fa fa-lg fa-fw fa-paper-plane" data-toggle="tooltip" data-placement="top" title="" data-original-title="Envoyer"></i></button>
                </form>
              </div>
            </div>
          </div>
        </div>
              </div>


@else

<div class="row">
          <div class="col-lg-12">
            <div class="bs-component">
              <div class="alert alert-dismissible alert-success">
                <button class="close" type="button" data-dismiss="alert">×</button>
                <h4>Notification!</h4>
                <br>
                <h5><center>{{$notif}}</center></h5>
              </div>
            </div>
          </div>
        </div>

@endif


    </main>

    
@endsection