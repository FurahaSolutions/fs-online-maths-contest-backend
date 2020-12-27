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

    public function getDetails() {

        $questions = [];
        foreach ($this->questions as $question) {
            $questions[] = $question->getDetails();
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
            'questions' => $questions
        ];
    }

    public function verifyCode($code) {
        return $this->event_code == $code;
    }
}
