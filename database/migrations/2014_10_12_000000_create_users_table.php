<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->string('email')->unique();

            $table->string('poste');// collaborateur ou chef
            $table->date('date_ne');
            $table->boolean('active')->default(0);  
            $table->integer('equipe_id')->unsigned()->references('id')->on('equipes');
            $table->integer('departement_id')->unsigned()->references('id')->on('departements');
            $table->string('photo')->default('default.jpg');
            $table->string('password');

            $table->rememberToken();
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
        Schema::dropIfExists('users');
    }
}
