<?php

namespace Database\Seeders;

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
        // $this->call(DisorderSeeder::class);
        // $this->call(QuestionSeeder::class);
        // $this->call(AnswerSeeder::class);
        // $this->call(TherapistSeeder::class);
        // $this->call(DisorderTherapistSeeder::class);
        // $this->call(AdminSeeder::class);
        // $this->call(DisorderTherapistSeeder::class);
     
        
}
}
