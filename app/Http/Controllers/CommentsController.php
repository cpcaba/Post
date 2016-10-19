<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Comment;
use App\Post;
use App\User;

class CommentsController extends Controller
{
  /**
   * Display a listing of the resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function index($id=0)
  {
    if($id == 0){
      $comments=Comment::with('Post')->get();
    }
    else
    { //solo los comments realcionados con $id
      $post=Post::find($id);
      $comments=$post->comments;
    }
    return view('comments')->with('id',$id)->with('data',$comments);

  }

  public function create($id)
  {
    $post=Post::find($id);
    $comment = New Comment;
    $users = User::all();
    return view('createcomment')->with('comment', $comment)->with('post', $post)->with('user',$users );

    //$arreglo = ('users'=>$users, 'cates' => $cates, 'tags'=> $tags);
    // load the view and pass the datos
    //return view('nuevopost')->with('data',$arreglo);

  }


  public function edit($id)
  {
    $comment=Comment::find($id);
    $post=$comment->post;
    $user=$comment->user;
    return view('createcomment')->with('post', $post)->with('user', $user)->with('comment', $comment);
  }

  /**
   * Update the specified resource in storage.
   *
   * @param  \Illuminate\Http\Request  $request
   * @param  int  $id
   * @return \Illuminate\Http\Response
   */
  public function update(Request $request, $id)
  {
    // validate
    // read more on validation at http://laravel.com/docs/validation
    // validate
    // read more on validation at http://laravel.com/docs/validation
    $rules = array(
        'description'  => 'required',
    );
}

  public function destroy($id)
  {
    // delete
    $comments=Comment::find($id);
    $comment->delete();
    return redirect('/comments')->with('message', 'Eliminado exitosamente');
  }
}
