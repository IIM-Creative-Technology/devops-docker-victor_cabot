<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMatchesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('matches', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_equipeA');
            $table->unsignedBigInteger('id_equipeB');
            // $table->foreign('id_equipeA')->references('id')->on('equipes');
            // $table->foreign('id_equipeB')->references('id')->on('equipes');
            $table->timestamps();
        });

        Schema::table('matches', function (Blueprint $table) {

            $table->foreign('id_equipeA')->references('id')->on('equipes');

            $table->foreign('id_equipeB')->references('id')->on('equipes');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('matches');
    }
}
