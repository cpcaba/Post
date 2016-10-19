<!DOCTYPE html>
<html>
    <head>
        <title>Post</title>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">
        <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Lato:100" >
        <link rel='stylesheet' href="css/css.css" />
    </head>
    <body>
     <header>
        <div class="container">
            <h1>Comentarios</h1>
        </div>
      </header>

      <section>
         <div class="container">
            <div class="panel panel-default">
              @if(empty($id))
                 <div class="panel-heading"></div>
              @else
                  <div class="panel-heading">Post: {{$data[0]->post->name}} - Autor: {{$data[0]->post->user->name}} </div>
              @endif
                  <table class="table">
                      <th>Id_Comentario</th>
                      @if(empty($id))
                        <th>Nombre del Post</th>
                      @endif
                      <th>Contenido</th>
                      <th>Autor del Comentario</th>

                      @foreach($data as $comment)
                      <tr>
                        <td>{{$comment->id}}</td>
                        @if(empty($id))
                          <td>{{ $comment->post->name}}</td>
                        @endif
                        <td>{{$comment->description}}</td>
                        <td>{{$comment->user->name}}</td>
                        <td>
                          <!-- boton editar un post-->
                          <a href="/comment/{{$comment->id}}/edit">
                          <button type="button" class="btn btn-default" aria-label="Left Align">
                                <span class="glyphicon  glyphicon-edit" aria-hidden="true"></span>
                          </button>
                          </a>
                           <!-- boton Eliminar un post -->
                          <form class="delete" action="/comment/{{$comment->id}}" method="POST">    <!-- agregar la action en routes.php  -->
                            <input type="hidden" name="_method" value="DELETE">
                            <input type="submit" class='btn btn-default' value="Eliminar">
                            <input type="hidden" name="_token" value="{{ csrf_token() }}">
                          </form>

                        </td>
                      </tr>
                    @endforeach
              </div>
            </div>
        </section>
      </body>
</html>
