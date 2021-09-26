<?php

namespace Database\Factories;

use App\Models\Organization;
use Illuminate\Database\Eloquent\Factories\Factory;

class OrganizationFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Organization::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'organization_id' => rand(0,10),
            'owner_id' => rand(0,10),
            'name' => $this->faker->name,
            'gender' => 'male',
            'status' => 1
            // 'latitude' => 'latitude',
            // 'longitude' => " longitude"
        ];
    }
}
