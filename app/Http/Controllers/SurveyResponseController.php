<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\SurveyResponse;
use App\Models\Question;
use App\Models\Answer;
class SurveyResponseController extends Controller
{

     public function storeResponse(Request $req,$answer_id)
     {
         if($req->user()->role="Patient"){
         $answer=Answer::find($answer_id);
         $survey_response=SurveyResponse::create(
             [
                 'patient_id'=>$req->user()->id,
                 'question_id'=>$answer->question()->id,
                 'answer_id'=>$answer_id,
             ]  
         );
         return response()->json([
             'message'=>'your selected value stored succesfully',
             'stored'=>$survey_response
         ]);
     }
    }
     public function fetchresponse(Request $req)
     {
         if($req->user()->role="Patient"){
         $q_and_a=SurveyResponse::where('patient_id',$req->user()->id)->get();
         return response()->json(
             [
                 "question and answer"=>$q_and_a
             ]
         );
     }
    }   
}
