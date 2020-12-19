<?php

namespace Database\Factories;

use App\Models\Contest;
use App\Models\ContestEdition;
use Illuminate\Database\Eloquent\Factories\Factory;

class ContestEditionFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = ContestEdition::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $contestId = array_rand(Contest::all()->pluck('id')->toArray());
        $contest = Contest::find($contestId + 1);
        return [
            'name' => $contest->name.$this->faker->year,
            'description' => $this->faker->paragraph,
            'status' => ['in-progress', 'upcoming', 'completed', 'cancelled'][array_rand([0, 1, 2, 3])],
            'edition' => $this->faker->randomDigit,
            'contest_id' => $contest->id
        ];
    }
}
