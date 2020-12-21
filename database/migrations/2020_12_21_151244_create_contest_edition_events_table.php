<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateContestEditionEventsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('contest_edition_events', function (Blueprint $table) {
            $table->id();
            $table->time('start_time');
            $table->double('event_period_in_minutes');
            $table->string('name');
            $table->string('event_code');
            $table->foreignId('contest_edition_id');
            $table->foreign('contest_edition_id')->references('id')->on('contest_editions');
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
        Schema::dropIfExists('contest_edition_events');
    }
}
