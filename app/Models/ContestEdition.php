<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ContestEdition extends Model
{
    use HasFactory;

    public function contest() {
        return $this->belongsTo(Contest::class);
    }

    public function getDetails() {
        return [
            'id' => $this->id,
            'contestId' => $this->contest_id,
            'description' => $this->description,
            'edition' => $this->edition,
            'name' => $this->name,
            'status' => $this->status,
            'contestName' => $this->contest->name,
            'contestDescription' => $this->contest->description,
            'createdAt' => $this['created_at']
        ];
    }
}
