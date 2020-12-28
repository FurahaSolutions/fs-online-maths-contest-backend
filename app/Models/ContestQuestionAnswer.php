<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * @property mixed id
 * @property mixed description
 * @property mixed is_correct
 */
class ContestQuestionAnswer extends Model
{
    use HasFactory, softDeletes;

    public function getDetails($withCorrectAnswer = false) {

        $response = [
            'id' => $this->id,
            'description' => $this->description,
        ];
        if ($withCorrectAnswer === true) {
            $response['isCorrect'] = $this->is_correct;
        }
        return $response;
    }
}
