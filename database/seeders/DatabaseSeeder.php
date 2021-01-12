<?php

namespace Database\Seeders;

use App\Models\ContestEdition;
use App\Models\ContestQuestion;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(UserSeeder::class);
        $this->call(ContestSeeder::class);
        $this->call(ContestEditionSeeder::class);
        $this->call(ContestEditionEventSeeder::class);
        $this->call(ContestQuestionSeeder::class);
        $this->call(ContestQuestionAnswerSeeder::class);
        $this->call(QuestionEventAttemptSeeder::class);
    }
}
