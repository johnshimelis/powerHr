<?php

namespace Database\Seeders;

use App\Models\Therapist;
use Illuminate\Database\Seeder;

class TherapistSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

      Therapist::factory(100)->create();
    }
}
