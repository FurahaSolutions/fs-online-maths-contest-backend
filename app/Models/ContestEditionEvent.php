<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ContestEditionEvent extends Model
{
    use HasFactory;
    protected $fillable = ['start_time', 'event_period_in_minutes', 'name', 'event_code'];

    public function getDetails() {
        return [
            'name' => $this->name,
            'startTime' => $this->start_time,
            'eventPeriodInMinutes' => $this->event_period_in_minutes
        ];
    }

    public function verifyCode($code) {
        return $this->event_code == $code;
    }
}
