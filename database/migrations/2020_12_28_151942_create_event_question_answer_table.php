<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEventQuestionAnswerTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('event_question_answer', function (Blueprint $table) {
            $table->id();
            $table->foreignId('contest_question_answer_id')->nullable();
            $table->foreign('contest_question_answer_id')->references('id')->on('contest_question_answers');
            $table->foreignId('user_id');
            $table->foreign('user_id')->references('id')->on('users');
            $table->foreignId('contest_question_id');
            $table->foreign('contest_question_id')->references('id')->on('contest_questions');
            $table->foreignId('contest_edition_event_id');
            $table->foreign('contest_edition_event_id')->references('id')->on('contest_edition_events');
            $table->integer('attempt')->default(1);
            $table->unique([
                'user_id',
                'contest_question_id',
                'contest_edition_event_id',
                'attempt'
            ], 'one_answer_per_attempt');
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
        Schema::dropIfExists('event_question_answer');
    }
}
