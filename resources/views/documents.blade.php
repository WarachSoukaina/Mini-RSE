@extends('master')

@section('content')
    <main class="app-content">
      
      <div class="row">
      
        <div class="clearfix"></div>
        
        <div class="col-md-12">
          <div class="tile">
            <h3 class="tile-title">Les documents partagés :</h3>
            <div class="table-responsive">
              <table class="table">
                <thead>
                  <tr>
                    <th>#</th>
                    <th>Nom du document</th>
                    <th>Partagé par :</th>
                    <th>Lien </th>
                  </tr>
                </thead>
                <tbody>
                  <tr>
                    <td>1</td>
                    <td>devis.pdf</td>
                    <td>Ahmed</td>
                    <td><a href="">@doc</a></td>
                  </tr>
                  <tr>
                    <td>2</td>
                    <td>compte rendu.pdf</td>
                    <td>Salma</td>
                    <td><a href="">@doc</a></td>
                  </tr>
                  <tr>
                    <td>3</td>
                    <td>Image5.jpg</td>
                    <td>Soukaina</td>
                    <td><a href="">@doc</a></td>
                  </tr>
                  <tr>
                    <td>4</td>
                    <td>devis.pdf</td>
                    <td>Ahmed</td>
                    <td><a href="">@doc</a></td>
                  </tr>
                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>
    </main>

@endsection