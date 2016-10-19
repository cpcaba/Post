<!DOCTYPE html>
<html>
    <head>
        <title>Nuevo Post</title>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">
        <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Lato:100" >
        <link rel='stylesheet' href="css/css.css" />
    </head>
    <body>
      <!--CREAR NUEVO POST-->
        <div class="container">
                @if (count($errors) > 0)
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                  <div class='form-group'>
                    <label>Nombre Post</label>
                      <p>{{$post->name}}</p><br>
                  </div>
                  <div class='form-group'>
                    <label>Descripcion</label>
                      <p>{{$post->desc}} </p><br>
                  </div>
                  <div class='form-group'>
                    <label>Autor</label>
                    <p>{{$post->user->name}}</p>
                  </div>

                  @if(empty($comment->id))
                     <h1>Nuevo Comentario</h1>
                     <form action="/comments" method="POST">    <!-- agregar la action en routes.php  -->
                  @else
                     <h1>Modificar Comentario</h1>
                     <form action="/comments/{{$comment->id}}" method="POST">    <!-- agregar la action en routes.php  -->
                     <input type="hidden" name="_method" value="PUT">     <!-- forzar  que se ejecute PUT y no POST-->
                   @endif
                   <div class='form-group'>
                     <label>Comentario</label>
                     <textarea class="form-control" name="text" id="text" cols='50' rows ='10'>{{$comment->text}}</textarea>
                   </div>
                   <div class='form-group'>
                     <label>Autor</label>
                     <select name= "data3" class="form-control">
                         @foreach( $data3 as $user )
                             @if($user->id==$post->user_id)
                                 <option  value={{$user->id}} selected='selected' >{{$user->name}}</option>
                             @else
                                 <option  value={{$user->id}}> {{$user->name}} </option>
                             @endif
                         @endforeach
                     </select>
                   </div>
                  <div class='form-group'>
                    <label></label>
                    <input type="submit" class='btn btn-default' value="Enviar"><br>
                  </div>
                  <input type="hidden" name="_token" value="{{ csrf_token() }}">
                </form>
        </div>
        <!--fin CREAR NUEVO POST-->
    </body>
</html>
