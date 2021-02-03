<?php

namespace App\Http\Controllers;

use App\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(){
        //tiene la conexion de post
        //representa la cantidad de registro por pagina
        $data['posts'] = Post::paginate(5);
        return view("post.index", $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(){
        return view("post.create");
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request){
        // $data = $request ->all(); //tiemne la informacion que se envia al formulario
        //para excluir el token que trae data, si no lo excluimos sale error ya que no es un campo de nuestr BD, lo inserta a la base de datos
        $data = $request -> except('_token');
        // var_dump($data); //me da la informacion de la variable
        Post::insert($data); //insertamos la info que viene de data
        // die(); //hace que se detenga el codgo

        return redirect() ->route("post.index"); //te redirecciona al index

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function show(Post $post)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\post  $post
     * @return \Illuminate\Http\Response
     */
    public function edit($id){
        //va a la base de datos segun el id
        $data = Post::findOrFail($id);
        return view("post.edit")->with(["post"=> $data]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id){
        $data = $request -> except('_token', '_method');
        //where primero consulta la data a la base de datos y actuliza, busca por id (en este caso) que sea igual al id que estamos pasandole
        Post::where('id', '=', $id)->update($data);
        return redirect() ->route("post.index");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function destroy($id){
        Post::destroy($id);
        return redirect() ->route("post.index");
    }
}
