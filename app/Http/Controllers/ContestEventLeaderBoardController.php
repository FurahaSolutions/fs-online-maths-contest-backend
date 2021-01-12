<?php

namespace App\Http\Controllers;

use App\Models\ContestEditionEvent;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ContestEventLeaderBoardController extends Controller
{
    public function index(ContestEditionEvent $contestEditionEvent) {

        $leaderBoard = DB::select(DB::raw('SELECT userId, firstName, lastName, sum(points) as points FROM (
          SELECT
            u.id as userId,
            u.first_name as firstName,
            u.last_name as lastName,
            q.points as points,
            q_a.contest_question_id,
            q_a.contest_question_answer_id
          FROM
            event_question_answer as q_a,
            users as u,
            contest_questions as q,
            contest_question_answers as a
          WHERE
            u.id = q_a.user_id AND
            q.id = q_a.contest_question_id AND
            a.id = q_a.contest_question_answer_id AND
            q_a.contest_edition_event_id = '.$contestEditionEvent->id.' AND
            a.is_correct = 1
          ) as points_tables
        GROUP BY userId
        ORDER By points DESC'));
        return response()->json(
            [
                'event' => $contestEditionEvent->getDetails(),
                'leaderboard' => $leaderBoard
            ]
        );
    }
}
