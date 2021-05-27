<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePeopleTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('people', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('last_name');
            $table->unsignedInteger('age');
            $table->string('blood');
            $table->string('born')->nullable();
            $table->string('born_place');
            $table->string('cellphone');
            $table->string('city');
            $table->string('country');
            $table->string('eye_color');
            $table->string('father_name');
            $table->string('gender');
            $table->string('height');
            $table->string('national_code');
            $table->string('religion');
            $table->string('system_id');
            $table->unsignedInteger('weight');
            $table->string('avatar');
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
        Schema::dropIfExists('people');
    }
}
