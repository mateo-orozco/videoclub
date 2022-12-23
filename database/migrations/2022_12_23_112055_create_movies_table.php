<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    


    public function up()
    {
        Schema::create('movies', function (Blueprint $table) {
            $table->id();

            $table->string('name');
            $table->timestamp('release_date');
            $table->string('actors');
            $table->string('description');

            $table->timestamps();
        });
    }

    
    

    public function down()
    {
        Schema::dropIfExists('movies');
    }
};
