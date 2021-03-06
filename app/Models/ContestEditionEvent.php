<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ContestEditionEvent extends Model
{
    use HasFactory;
    protected $fillable = ['start_time', 'event_period_in_minutes', 'name', 'event_code'];

    public function contestEdition() {
        return $this->belongsTo(ContestEdition::class);
    }
    public function contest() {
        return $this->contestEdition->belongsTo(Contest::class);
    }

    public function questions() {
        return $this->hasMany(ContestQuestion::class);
    }

    public function getDetails($includeQuestions = null) {

        $questions = [];
        if ($includeQuestions === true) {
            foreach ($this->questions as $question) {
                $questions[] = $question->getDetails();
            }
        }

        return [
            'id' => $this->id,
            'name' => $this->name,
            'startTime' => $this->start_time,
            'eventPeriodInMinutes' => $this->event_period_in_minutes,
            'contestEditionId' => $this->contestEdition->id,
            'contestEditionName' => $this->contestEdition->name,
            'contestEditionEdition' => $this->contestEdition->edition,
            'contestEditionDescription' => $this->contestEdition->description,
            'contestId' => $this->contest->id,
            'contestName' => $this->contest->name,
            'contestDescription' => $this->contest->description,
            'questions' => $questions,
            'totalPoints' => $this->questions->pluck('points')->sum()
        ];
    }

    public function verifyCode($code) {
        return $this->event_code == $code;
    }

    public function contestQuestionsAttempts(){
        return $this->belongsToMany(ContestQuestion::class, 'event_question_answer')->withPivot([
            'contest_question_answer_id', 'user_id', 'contest_edition_event_id', 'attempt'
        ]);
    }

    public function saveQuestionAnswers(array $questionAnswers)
    {
        foreach ($questionAnswers as $questionAnswer) {
            $this->contestQuestionsAttempts()->save(
                ContestQuestion::find($questionAnswer['questionId']),
                ['contest_question_answer_id' => $questionAnswer['answerId'], 'user_id' => auth()->id()]);
        }
    }

    public function getAttempts()
    {
        return $this->contestQuestionsAttempts;
    }
}
