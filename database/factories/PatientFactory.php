<?php

namespace Database\Factories;
use Illuminate\Support\Str;
use App\Models\Patient;
use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Therapist;
class PatientFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Patient::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $datetime=$this->faker->dateTimeBetween('-40 year','now');
        $level_of_study=array(
                'Diploma',
                'Degree',
                'HighSchool',
                'Elementary'
                );
        return [
            'first_name'=>$this->faker->name(),
            'last_name'=>$this->faker->name(),
            'gender'=>rand(0,1),
            'date_of_birth'=>$datetime,
            'level_of_study'=>$level_of_study[array_rand($level_of_study)],
            'profile_pic_path'=>basename($this->faker->image(storage_path('app/public'))),
        ];
    }
}
