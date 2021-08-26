<?php

namespace Database\Factories;

use App\Models\Admin;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
class AdminFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Admin::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'first_name'=>$this->faker->name(),
            'last_name'=>$this->faker->name(),
            'gender'=>rand(0,1),
            'profile_pic_path'=>basename($this->faker->image(storage_path('app/public'))),
        ];
    }
}
