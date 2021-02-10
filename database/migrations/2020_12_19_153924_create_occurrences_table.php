<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOccurrencesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('occurrences', function (Blueprint $table) {
            $table->id();
            $table->date('from');
            $table->date('to');
            $table->decimal('kes_cost');
            $table->decimal('kes_cost_scholar')->default(0);
            $table->date('booking_start');
            $table->date('booking_end');
            $table->unsignedInteger('course_id');
            $table->unsignedInteger('venue_id');
            $table->decimal('tax');
            $table->decimal('usd_cost');
            $table->decimal('tax_scholar')->default(0);
            $table->decimal('usd_cost_scholar')->default(0);
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
        Schema::dropIfExists('occurrences');
    }
}
