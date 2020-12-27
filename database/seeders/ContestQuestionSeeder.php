<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class ContestQuestionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\Models\ContestQuestion::factory(300)->create();
    }
}
