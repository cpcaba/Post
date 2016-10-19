<!DOCTYPE html>
<html>
    <head>
        <title>Post</title>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">
        <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Lato:100" >
        <link rel='stylesheet' href="css/css.css" />
    </head>
    <body>

        <div class="container">
          @if (Session::has('message'))
              <script type="text/javascript">alert("Procesado Exitosamente!");</script>
          @endif
        </div>

          <header>
            <div class="container">
                <h1>BlogPost</h1>
                <div class="content">
                  <a href="/post/create">
                    <button  type="button" class="btn btn-default btn-md" aria-label="Left Align" >Nuevo Post</button>
                  </a>
                  <a href="/comments">
                    <button  type="button" class="btn btn-default btn-md" aria-label="Left Align">Comentarios</button>
                  </a>
                </div>
            </div>
          </header>

          <section>
             <div class="container">
                <div class="panel panel-default">
                  <div class="panel-heading">Posts</div>
                    <table class="table">
                          <th>Nombre</th>
                          <th>Descricion</th>
                          <th>Texto</th>
                          <th>Categoria</th>
                          <th>Autor</th>
                          <th>Tags</th>
                          <th>Opciones</th>
                          @foreach($data as $post)

                          <tr>
                            <td>{{$post->name}}</td>
                            <td>{{$post->desc}}</td>
                            <td>{{$post->text}}</td>
                            <td>{{$post->category->name}}</td>
                            <td>{{$post->user->name}}</td>
                            @if($post->tags->isEmpty())
                              <td>Vacio</td>
                            @else
                            <td>
                              @foreach($post->tags as $postag)
                                {{$postag->name_tag}} <br>
                              @endforeach
                            </td>
                            @endif
                            <td>
<!--
                              <a href="/post/{{$post->id}}/edit">
                              <button type="button" class="btn btn-default" aria-label="Left Align">
                                    <span class="glyphicon  glyphicon-edit" aria-hidden="true"></span>
                              </button>
                              </a>
                              <button type="button" class="btn btn-default" aria-label="Left Align">
                                    <span class="glyphicon glyphicon-list" aria-hidden="true"></span>
                              </button>
                              <button type="button" class="btn btn-default" aria-label="Left Align">
                                <span class="glyphicon glyphicon-trash" aria-hidden="true"></span>
                              </button>
-->
                                <!-- boton editar un post-->
                                <a href="/post/{{$post->id}}/edit">
                                <button type="button" class="btn btn-default" aria-label="Left Align">
                                      <span class="glyphicon  glyphicon-edit" aria-hidden="true"></span>
                                </button>
                                </a>
                                <!-- boton Mostrar comentarios -->
                                <a href="/comments/{{$post->id}}">
                                <button type="button" class="btn btn-default" aria-label="Left Align">
                                      <span class="glyphicon glyphicon-list" aria-hidden="true"></span>
                                </button>
                              </a>
                                <!-- boton Eliminar un post -->
                                <form class="delete" action="/post/{{$post->id}}" method="POST">    <!-- agregar la action en routes.php  -->
                                  <input type="hidden" name="_method" value="DELETE">
                                  <input type="submit" class='btn btn-default' value="Eliminar">
                                  <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                </form>
                             </td>
                          </tr>

                        @endforeach
                        </table>
                      </div>
                  </div>
                </div>
            </section>

        </body>
</html>
