<?php

namespace Database\Seeders;

use App\Models\Disorder;
use Illuminate\Database\Seeder;

class DisorderSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Disorder::factory(100)->create();
    }
}
