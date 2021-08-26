<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Therapist;
use App\Models\Admin;
use App\Models\Disorder;
use App\Models\Patient;
class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $disorders=Disorder::factory(10)->create();
        User::factory(10)->create(
            ['is_profile_complete'=>1]
            )->each(function($user) use ($disorders){
            if($user->role=="Therapist"){
            Therapist::factory(1)->create([
                'user_id'=>$user->id
            ])->each(function($therapy) use ($disorders){
              $therapy->disorders()->attach($disorders->random(2,3));
            });}
            else if($user->role=="Admin"){
                Admin::factory(1)->create([
                    'user_id'=>$user->id
                ]);
            }
            else{
                Patient::factory(1)->create([
                    'user_id'=>$user->id,
                ]);
            }

        });
    }
}
