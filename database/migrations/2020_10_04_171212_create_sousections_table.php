<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSousectionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    
    {
        Schema::create('sousections', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('titlesection_id')->index();
            $table->unsignedBigInteger('user_id')->index();
            $table->string('title');
            $table->string('content', 255);
            $table->string('image');
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
        Schema::dropIfExists('sousections');
    }
}