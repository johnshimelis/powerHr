<?php

namespace Database\Factories;

use App\Models\Therapist;
use Illuminate\Database\Eloquent\Factories\Factory;

class TherapistFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Therapist::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'first_name' => $this->faker->name(),
            'last_name' => $this->faker->name(),
            'title' => $this->faker->title(),
            'gender' => rand(0, 1),
            'date_of_birth' => $this->faker->date(),
            'is_approved' => rand(0, 1),

            'profile_photo_path' => $this->faker->filePath(),
            'license_issue_date' => $this->faker->date(),
            'cv_path' => $this->faker->filePath('public/assets'),
            'alma_mater' => $this->faker->name,

            'bio' => $this->faker->text(100),
            'work_hour_begin' => $this->faker->time(),
            'work_hour_end' => $this->faker->time(),
            'user_id' => rand(1, 100),
        ];
    }
}
