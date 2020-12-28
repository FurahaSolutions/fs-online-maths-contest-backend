<?php

namespace Database\Seeders;

use App\Models\ContestQuestion;
use Illuminate\Database\Seeder;

class ContestQuestionAnswerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $questionIds = ContestQuestion::all()->pluck('id');
        $questionCount = sizeof($questionIds);
        foreach ($questionIds as $key => $questionId) {
            echo floor( 100 * $key/ $questionCount)."% Done" . "\r";
            \App\Models\ContestQuestionAnswer::factory(5)->create([
                'contest_question_id' => $questionId
            ]);
        }
    }
}
