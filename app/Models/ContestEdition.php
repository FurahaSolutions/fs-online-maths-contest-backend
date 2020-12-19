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
}
