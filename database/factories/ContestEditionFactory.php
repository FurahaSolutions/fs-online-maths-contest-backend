<?php

namespace Database\Factories;

use App\Models\Contest;
use App\Models\ContestEdition;
use Carbon\Carbon;
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
        $dateTime = $this->faker->dateTime;
        $year = (new Carbon($dateTime))->format('Y');
        return [
            'name' => $contest->name.$year,
            'description' => $this->faker->paragraph,
            'status' => ['in-progress', 'upcoming', 'completed', 'cancelled'][array_rand([0, 1, 2, 3])],
            'edition' => array_rand([1, 2, 3, 4, 5, 6, 7, 8, 9]),
            'contest_id' => $contest->id,
            'event_date_time' => $dateTime
        ];
    }
}
