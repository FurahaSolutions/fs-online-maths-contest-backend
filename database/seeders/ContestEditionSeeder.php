<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class ContestEditionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $seeds = 0;
        while ($seeds < 12) {
            $seeds = \App\Models\ContestEdition::count();
            try {
                \App\Models\ContestEdition::factory(2)->create();

            } catch (\Exception $exception) {
            }
        }

    }
}
