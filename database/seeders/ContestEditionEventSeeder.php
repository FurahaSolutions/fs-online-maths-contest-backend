<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class ContestEditionEventSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\Models\ContestEditionEvent::factory(40)->create();
    }
}
