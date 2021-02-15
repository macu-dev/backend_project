<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model{
    public function genero(){
        echo "<h1>entro</h1>";
        return $this->belongsTo('App\Genero', 'genero_id');
        //nos ayuda poder acceder a los registros de categorias
    }
    //
}
