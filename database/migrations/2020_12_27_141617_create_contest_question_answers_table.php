<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateContestQuestionAnswersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('contest_question_answers', function (Blueprint $table) {
            $table->id();
            $table->string('description');
            $table->boolean('is_correct');
            $table->foreignId('contest_question_id');
            $table->timestamps();
            $table->softDeletes();
            $table->foreign('contest_question_id')->references('id')->on('contest_questions');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('contest_question_answers');
    }
}
