<?php

namespace Database\Factories;

use App\Models\ContestQuestion;
use App\Models\ContestQuestionAnswer;
use Illuminate\Database\Eloquent\Factories\Factory;

class ContestQuestionAnswerFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = ContestQuestionAnswer::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $questionIds = ContestQuestion::all()->pluck('id');
        return [
            'description' => $this->faker->sentence,
            'is_correct' => $this->faker->boolean,
            'contest_question_id' => $questionIds[array_rand($questionIds->toArray())]
        ];
    }
}
