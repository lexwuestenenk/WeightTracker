<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('workout_exercises', function (Blueprint $table) {
            $table->unsignedBigInteger('workout_exercises_id');
            $table->unsignedBigInteger('workout_id');
            $table->foreign('workout_exercises_id')->references('id')->on('exercises');
            $table->foreign('workout_id')->references('id')->on('workouts');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('workout_exercises');
    }
};
