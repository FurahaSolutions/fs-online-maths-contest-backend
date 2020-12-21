<?php

namespace Database\Factories;

use App\Models\ContestEdition;
use App\Models\ContestEditionEvent;
use Illuminate\Database\Eloquent\Factories\Factory;

class ContestEditionEventFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = ContestEditionEvent::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $contestIds = ContestEdition::all()->pluck('id');
        return [
            'name' => $this->faker->domainWord,
            'start_time' => $this->faker->time(),
            'event_period_in_minutes' => [30, 45, 60, 90, 120][array_rand([0, 1, 2, 3, 4])],
            'event_code' => '1234',
            'contest_edition_id' => $contestIds[array_rand($contestIds->toArray())]
            //
        ];
    }
}
