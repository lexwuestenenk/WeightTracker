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
        Schema::create('can_have_exercises', function (Blueprint $table) {
            $table->foreignId('exercises_id');
            $table->foreignId('can_have_exercise_id');
            $table->string('can_have_exercise_type');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('can_have_exercises');
    }
};
