<?php

namespace Database\Factories;

use App\Models\ContestEditionEvent;
use App\Models\ContestQuestion;
use Illuminate\Database\Eloquent\Factories\Factory;

class ContestQuestionFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = ContestQuestion::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $eventIds = ContestEditionEvent::all()->pluck('id');
        return [
            'description' => $this->faker->paragraph(2),
            'points' => [1, 2, 3, 4, 5][array_rand([0, 1, 2, 3, 4])],
            'contest_edition_event_id' => $eventIds[array_rand($eventIds->toArray())]
        ];
    }
}
