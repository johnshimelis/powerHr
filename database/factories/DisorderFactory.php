<?php

namespace Database\Factories;

use App\Models\Disorder;
use Illuminate\Database\Eloquent\Factories\Factory;

class DisorderFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Disorder::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        
        return [
            'name' => $this->faker->text(15)
        ];
    }
}
