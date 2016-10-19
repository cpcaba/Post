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
               @if(empty($post->id))
                  <h1>Nuevo Post</h1>
                  <form action="/post" method="POST">    <!-- agregar la action en routes.php  -->
               @else
                  <h1>Modificar Post</h1>
                  <form action="/post/{{$post->id}}" method="POST">    <!-- agregar la action en routes.php  -->
                  <input type="hidden" name="_method" value="PUT">     <!-- forzar  que se ejecute PUT y no POST-->
                @endif
                <form action="/post" method="POST">    <!-- agregar la action en routes.php  -->
                  <div class='form-group'>
                    <label>Nombre </label>
                      <input class="form-control" type="text" name="name" value="{{$post->name}}" ><br>
                  </div>
                  <div class='form-group'>
                    <label>Descripcion</label>
                      <input class="form-control" type="text" name="description" id="description" value= "{{$post->desc}}"><br>
                  </div>
                  <div class='form-group'>
                    <label>Comentario</label>
                    <textarea class="form-control" name="text" id="text" cols='50' rows ='10' >{{$post->text}}</textarea>
                  </div>
                  <div class='form-group'>
                    <label>Categoria</label>
                    <select name= "data1" class="form-control">
                        @foreach( $data1 as $cate )
                            @if($cate->id==$post->category_id)
                                <option value = {{$cate->id}} selected='selected' >{{$cate->name}} </option>
                            @else
                                <option value = {{$cate->id}} >{{$cate->name}} </option>
                            @endif
                        @endforeach
                    </select>
                  </div>
                  <div class='form-group'>
                    <label>Tag</label>
                    <select multiple name= "data2[]" class="form-control">
                        @foreach( $data2 as $tag )
                          @if($post->tags->contains($tag->id))  <!-- si en el conjunto de tags que tiene el post editado existe el tag_id instanciado por el foreach, lo marca selected-->
                            <option value = {{$tag->id}} selected='selected'> {{$tag->name_tag}} </option>
                          @else
                             <option value = {{$tag->id}}> {{$tag->name_tag}} </option>
                          @endif
                        @endforeach
                    </select>
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
