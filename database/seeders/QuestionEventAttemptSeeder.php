<?php

namespace Database\Seeders;

use App\Models\ContestEditionEvent;
use App\Models\ContestQuestion;
use App\Models\User;
use Illuminate\Database\Seeder;

class QuestionEventAttemptSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $contests = ContestEditionEvent::pluck('id')->toArray();
        $usersCount = User::count();

        foreach (User::all() as $key => $user) {
            echo floor($key/$usersCount * 100) . "% Done\r";
            $noOfContests = random_int(0, 4);
            if ($noOfContests > 0) {
                $userAttendedContests = array_rand($contests, $noOfContests);
                if ($noOfContests === 1) {
                    $userAttendedContests = [$userAttendedContests];
                }
                foreach ($userAttendedContests as $userAttendedContest) {

                    $event = ContestEditionEvent::find($contests[$userAttendedContest]);
                    foreach ($event->questions as $question) {
                        $choices = $question->choices->pluck('id')->toArray();
                        $selectedChoice = random_int(0, 9) < 2 ? null : array_rand($choices);
                        $event->contestQuestionsAttempts()->save($question, [
                            'contest_question_answer_id' => $selectedChoice === null ? null : $choices[$selectedChoice],
                            'user_id' => $user->id]);
                    }

                }
            }
        }
    }
}
