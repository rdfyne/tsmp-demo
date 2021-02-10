<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOnlineOccurrencesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('online_occurrences', function (Blueprint $table) {
            $table->id();
            $table->date('from');
            $table->date('to');
            $table->decimal('kes_cost');
            $table->date('booking_start');
            $table->date('booking_end');
            $table->unsignedInteger('course_id');
            $table->decimal('tax');
            $table->decimal('usd_cost');
            $table->softDeletes();
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
        Schema::dropIfExists('online_occurrences');
    }
}
