<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateInhousesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('inhouses', function (Blueprint $table) {
            $table->id();
            $table->timestamps();            
            $table->unsignedInteger('course_id');
            $table->unsignedInteger('category_id');
            $table->string('preferred');
            $table->string('group');
            $table->string('name');
            $table->string('email');
            $table->string('phone');
            $table->string('designation');
            $table->string('company');
            $table->unsignedInteger('country');
            $table->string('people');
            $table->date('date');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('inhouses');
    }
}
