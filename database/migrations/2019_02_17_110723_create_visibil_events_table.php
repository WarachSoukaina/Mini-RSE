<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateVisibilEventsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('visibil_events', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('equipe_id')->unsigned()->references('id')->on('equipes');
            $table->integer('evenement_id')->unsigned()->references('id')->on('evenements');
            $table->boolean('all')->default(0);
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
        Schema::dropIfExists('visibil_events');
    }
}
