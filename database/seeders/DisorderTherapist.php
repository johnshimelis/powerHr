<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Therapist;
use App\Models\Disorder;
class DisorderTherapist extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = Therapist::factory()
            ->has(Disorder::factory()->count(3))
            ->create();
    }
}



