<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

use App\Models\User;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        User::factory(10)->create();
        $this->call(DisorderSeeder::class);
        $this->call(QuestionSeeder::class);
        $this->call(AnswerSeeder::class);
<<<<<<< HEAD
<<<<<<< HEAD
        $this->call(TherapistSeeder::class);
        $this->call(DisorderTherapistSeeder::class);
=======
>>>>>>> SurveyApi
    }
=======
        $this->call(TherapistSeeder::class);
        }
>>>>>>> surveycontroller update
}
