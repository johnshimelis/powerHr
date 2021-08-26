<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Question;
use App\Models\Answer;
class Q_A_Seeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Question::factory(15)->create()->each(function($question){
            Answer::factory(rand(1,5))->create([
                'question_id'=>$question->id
            ]);
        });
        
    }
}
