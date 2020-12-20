<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * @method static find(array|int|string $contestId)
 */
class Contest extends Model
{
    use HasFactory;

    public function editions() {
        return $this->hasMany(ContestEdition::class);
    }

    public function getDetails() {
        return [
            'id' => $this->id,
            'name' => $this->description
        ];
    }
}
