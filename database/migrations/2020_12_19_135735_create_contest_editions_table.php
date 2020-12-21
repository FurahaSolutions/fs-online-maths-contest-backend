<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateContestEditionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('contest_editions', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->longText('description');
            $table->enum('status', ['in-progress', 'upcoming', 'completed', 'cancelled'])->default('upcoming');
            $table->integer('edition');
            $table->dateTime('event_date_time');
            $table->foreignId('contest_id')->nullable();
            $table->foreign('contest_id')->references('id')->on('contests');
            $table->unique(['contest_id', 'edition']);
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
        Schema::dropIfExists('contest_editions');
    }
}
