<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Post;
use App\Category;
use App\User;
use App\Tag;
class PostsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        //$post=Post::all();
        $post=Post::with('Category')->get();
        return view('post')->with('data',$post);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
      $post = New Post;
      $cates = Category::all();
      $tags = Tag::all();
      $users = User::all();
      return view('create')->with('post', $post)->with('data1', $cates)->with('data2',$tags )->with('data3', $users);

      //$arreglo = ('users'=>$users, 'cates' => $cates, 'tags'=> $tags);
      // load the view and pass the datos
      //return view('nuevopost')->with('data',$arreglo);


    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
      //validation


       //$request = Request::all();
      $post = new Post;
      $post->name =  $request->name;
      $post->desc =  $request->description;
      $post->text =  $request->text;
      $post->category_id=  $request->data1;
      $post->user_id=  $request->data3;
      $post->save();

      $post->tags()->attach( $request->data2);

      return redirect('/post')->with('message', 'Creado exitosamente');


    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {

      $post=Post::find($id);
      $cate = Category::all();
      $tags = Tag::all();
      $users = User::all();
      return view('create')->with('post', $post)->with('data1', $cate)->with('data2',$tags )->with('data3', $users);
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

      $post = Post::find($id);
      $post->name =  $request->name;
      $post->desc =  $request->description;
      $post->text =  $request->text;
      $post->category_id=  $request->data1;
      $post->user_id=  $request->data3;
      $post->save();

      //Syncing Associations
      $post->tags()->sync( $request->data2);  //https://laravel.com/docs/5.2/eloquent-relationships (Syncing Associations)

      // redirect
      return redirect('/post')->with('message', 'Modificado exitosamente');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
      // delete
     $post = Post::find($id);
     $post->delete();

     // redirect
      return redirect('/post')->with('message', 'Eliminado exitosamente');
    }
}
