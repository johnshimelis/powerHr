<?php

namespace Database\Factories;

use App\Models\Answer;
use Illuminate\Database\Eloquent\Factories\Factory;

class AnswerFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     * @var string
     */
    protected $model = Answer::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'answer' => $this->faker->text(40) ,
<<<<<<< HEAD
            'score' => rand(0, 4),
=======
            'score'=>rand(1,5),
>>>>>>> SurveyApi
            'question_id' => rand(1, 100)
        ];
    }
}
