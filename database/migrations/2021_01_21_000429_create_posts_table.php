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
            $table->text('title');
            $table->text('summary');
            $table->text('image');
            $table->text('description');
            $table->text('author');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('posts');
    }
}
