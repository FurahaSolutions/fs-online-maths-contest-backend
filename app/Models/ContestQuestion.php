<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ContestQuestion extends Model
{
    use HasFactory, softDeletes;

    public function getDetails() {
        return [
            'id' => $this->id,
            'description' => $this->description,
            'points' => $this->points,
            'createdAt' => $this->created_at,
            'updatedAt' => $this->updated_at,
            'contestEditionEventId' => $this->contest_edition_event_id,
            'choices' => []
        ];
    }

}
