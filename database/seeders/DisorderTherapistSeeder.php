<?php

namespace Database\Seeders;

use App\Models\Disorder;
use App\Models\DisorderTherapist;
use App\Models\Therapist;
use CreateDisorderTherapistTable;
use Illuminate\Database\Seeder;

class DisorderTherapistSeeder extends Seeder
{
    
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // $disorders = Disorder::factory(20)->create(); //factory(App\Models\Disorder::class, 20)->create();
        // $therapists = Therapist::factory(20)->create(); //factory(App\Models\Therapist::class, 20)->create();
        DisorderTherapist::factory(20)->create();
        // $disorders->first()->therapists()->sync($therapists);
    }
}
