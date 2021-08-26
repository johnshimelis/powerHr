<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Answer;
use App\Models\Question;
use App\Models\Therapist;

class SurveyController extends Controller
{
    public function questions()
    {
        $all_quest = Question::all();
        $quest_and_answer = array();
        foreach ($all_quest as $quest) {
            $question = $quest;
            $answer = Answer::where("question_id", $quest->id)->get();
            array_push($quest_and_answer, $question, $answer);
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
    #ALL QUESTION WITH THEIR ANSWER
    public function questions_and_associated_answers()
    {
        $quest_and_answer = Question::with('answers')->get();
        return response($quest_and_answer, 201);
    }
    #SPECIFIC QUESTION ANSWER
    public function get_answers_from_question($id)
    {
        $answers = Question::find($id)->answers;
        return $answers;
    }
    #ADD SURVEY QUESTION
    public function add_survey_question(Request $req)
    {
        $req->validate([
            'question' => 'required',
        ]);
        $quest = Question::create([
            'question' => $req['question']
        ]);
        return response($quest);
    }
    #ADD SURVEY ANSWERS
    public function add_survey_answer(Request $req, $id)
    {
        $req->validate([
            'answer' => 'required|min:3',
            'score' => 'required'
        ]);
        $question = Question::find($id);
        $answer_ = new Answer;
        $answer_->answer = $req->answer;
        $answer_->score = $req->score;
        return response($question->answers()->save($answer_), 201);
    }
    #UPDATE SURVEY QUESTION
    public function update_survey_question(Request $req, $id)
    {
        $quest = Question::find($id);
        $quest->update($req->all());
        return response($quest, 201);
    }

    // public function update_survey_answer(Request $req,){

    // }
    #UPDATE SURVEY ANSWER
    public function update_survey_answer(Request $req, $id)
    {
        $answer = Answer::find($id);
        $answer->update($req->all());
        return response($answer, 201);
    }
    #DELETE SURVEY QUESTION WITH RELATED ANSWERS 
    public function delete_survey($id)
    {
        $question = Question::find($id);
        $question->answers()->delete();
        return response($question->delete());
    }
}
