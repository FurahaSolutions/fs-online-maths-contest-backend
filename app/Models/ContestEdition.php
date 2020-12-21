<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * @method static paginate(int $size)
 */
class ContestEdition extends Model
{
    use HasFactory;

    protected $fillable = ['event_date', 'description', 'edition','name', 'status', 'event_date_time'];

    public function contest() {
        return $this->belongsTo(Contest::class);
    }

    public function contestEvents() {
        return $this->hasMany(ContestEditionEvent::class);
    }

    public function getDetails() {
        $events = $this->contestEvents;
        $eventsResponse = [];
        foreach ($events as $event) {
            $eventsResponse[] = $event->getDetails();
        }
        return [
            'id' => $this->id,
            'contestId' => $this->contest_id,
            'description' => $this->description,
            'edition' => $this->edition,
            'name' => $this->name,
            'status' => $this->status,
            'contestName' => $this->contest->name,
            'contestDescription' => $this->contest->description,
            'createdAt' => $this['created_at'],
            'eventDateTime' => $this['event_date_time'],
            'events' => $eventsResponse
        ];
    }
}
