<?php

namespace Database\Seeders;

use App\Models\Salon;
use Illuminate\Database\Seeder;

class SalonSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      Salon::factory(100)->create();
    }
}
