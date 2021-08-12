<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Answer;
use App\Models\Question;
class SurveyController extends Controller
{
    public function questions(){
       $all_quest=Question::all();
       $quest_and_answer=array();
       foreach($all_quest as $quest){
          $question=$quest;
          $answer=Answer::where("question_id",$quest->id)->get();
          array_push($quest_and_answer,$question,$answer);
       }
       return response()->json(
           $quest_and_answer
        );
        
    }
}
