<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateHouseModelsTable extends Migration
{
    public function up()
    {
        Schema::create('house_models', function (Blueprint $table) {
            $table->id();
            $table->string('ville');
            $table->enum('type_maison', ['2_pieces', '3_pieces', 'entrer_coucher']);
            $table->string('quartier');
            $table->unsignedDecimal('loyer', 10, 2);
            $table->json('options')->nullable();
            $table->string('image')->nullable(); // Vous pouvez utiliser ceci pour stocker le chemin de l'image.
            $table->unsignedBigInteger('user_id');
            $table->foreign('user_id')->references('id')->on('users');

            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('house_models');
    }
}
