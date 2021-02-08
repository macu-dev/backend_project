<?php

namespace App\Http\Controllers;

use App\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class PostController extends Controller{
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


    public function search(Request $request){
        $data = $request->input('search');
        $query = Post::select()
            ->where('title','like', "%$data%")
            ->orWhere('author','like', "%$data%")
            ->get();
            //con like me va a atrreae la palabra que coincida
        return view("post.index")->with(["posts" => $query]);
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
        $data = $request -> except('_token'); //esto es un arreglo

        if($request->hasFile('image')){
            $data['image']  = $request->file('image')->store('uploads', 'public');         //accedemos a la image, le deicmos al request que tome la imagen y que guarde una image en la carperta uploadas dentro de public
        } //para verificar la image


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
    public function show($id){
        $data = Post::findOrFail($id);
        return view('post.show')->with(['post' => $data]);
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

        if($request->hasFile('image')) {
            $post = Post::findOrFail($id); //busca en el registro de la base de la datos
            Storage::delete("public/$post->image"); //eliminamos la img anterior
            $data['image']  = $request->file('image')->store('uploads', 'public'); //guardamos la nueva image
        }

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
        //mandamos un mensaje de seccion
        return redirect() ->route("post.index")->with('eliminar', 'ok');
    }



}
