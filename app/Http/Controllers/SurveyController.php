<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Answer;
use App\Models\Question;
use App\Models\Therapist;
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

    public function assess(Request $request)
    {

        //store the result some how for further analysis, maybe sometype of scoring system **optional**
       $type = $request->traumaType;
       $therapist = Therapist::all();
    //    $therapist->qualification == $type->disorder;
        return response()->json($therapist);
        // after extracting the qualification of the therapist,
        // filter only the therapists with the $type = $therapistQualification
        // respond with an array of the list of therapists
    }

    public function insertSurveyQuestion()
    {
        // block request for non admin users
        // filter the incoming data and input 
    }
}
