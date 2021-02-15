<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePostsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up(){
        Schema::create('posts', function (Blueprint $table) {
            // creando campos del table
            //./artisan migrate (es para generar la tabla en la base de datos)
            $table->id();
            //creamos un campo unsigned es unico o especial el campo
            $table->unsignedBigInteger('genero_id');
            $table->text('title');
            $table->text('summary');
            $table->text('image');
            $table->text('year');
            $table->text('author');
            $table->timestamps();
            $table->foreign('genero_id')->references('id')->on('generos')->onDelete('cascade');
        });

        // Schema::table('posts', function (Blueprint $table) {
        //     $table->foreign('genero_id')->references('id')->on('generos');
        //     //un atributo foreing a base de genero id la referncia atraves del id de la tabla generos
        // });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down(){
        Schema::dropIfExists('posts');
    }
}
