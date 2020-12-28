<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * @property mixed id
 * @property mixed description
 * @property mixed created_at
 * @property mixed points
 * @property mixed updated_at
 * @property mixed contest_edition_event_id
 * @property mixed choices
 */
class ContestQuestion extends Model
{
    use HasFactory, softDeletes;

    public function choices() {
        return $this->hasMany(ContestQuestionAnswer::class);
    }

    public function getDetails() {
        $choices = [];
        foreach ( $this->choices as $choice) {
            $choices[] = $choice->getDetails();
        }
        return [
            'id' => $this->id,
            'description' => $this->description,
            'points' => $this->points,
            'createdAt' => $this->created_at,
            'updatedAt' => $this->updated_at,
            'contestEditionEventId' => $this->contest_edition_event_id,
            'choices' => $choices
        ];
    }

}
