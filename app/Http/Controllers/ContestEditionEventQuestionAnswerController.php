<?php

namespace App\Http\Controllers;

use App\Models\ContestEditionEvent;
use Illuminate\Http\Request;

class ContestEditionEventQuestionAnswerController extends Controller
{
    public function store(ContestEditionEvent $contestEditionEvent) {
        return $contestEditionEvent->saveQuestionAnswers(request()->all());
        return [
            'message' => 'Responses successfully saved'
        ];
    }
}
