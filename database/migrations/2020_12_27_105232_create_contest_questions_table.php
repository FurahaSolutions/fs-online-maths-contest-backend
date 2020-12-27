<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateContestQuestionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('contest_questions', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->foreignId('contest_edition_event_id');
            $table->longText('description');
            $table->softDeletes();
            $table->double('points');
            $table->foreign('contest_edition_event_id')->references('id')->on('contest_edition_events');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('contest_questions');
    }
}
