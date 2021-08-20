<?php

namespace App\Http\Controllers;

use App\Models\Therapist;
use Illuminate\Http\Request;
use App\Models\Disorder;
use Auth;

class TherapistController extends Controller
{
  //register Therapist Profile 
  public function register_profile(Request $req){
      $req->validate(
          ['first_name'=>'required|min:3|max:50',
           'last_name'=>'required|min:3|max:50',
           'title'=>'required|min:2|max:15',
           'gender'=>'required',
           'date_of_birth'=>'required|date',
           'alma_meter'=>'required|min:5',
           'bio'=>'required',
           'work_hour_begin'=>'required',
           'work_hour_end'=>'required'
          ]
      );
         return response(Therapist::create($req->all,201));
    }
    //return specific therapist
    public function fetch_profile($id){
         $therapist=Therapist::find($id);
         return response($therapist,201);
    }
    //return all therapist 
    public function all_therpist(){
        $all_therapists=Therapist::all();
        return response($all_therapists,201);
    }
    //Therapist with its specilization
    public function all_therapists_with_disorder_specialization(){
         $all_therapist_with_disorder_specialization=Therapist::with('disorders')->get();
         return response($all_therapist_with_disorder_specialization);
    }
    //Specific therapy with specialization
    public function therapist_with_specialization($id){
        $therapist_with_disorder_specialization=Therapist::find($id)->disorders;
        return response($therapist_with_disorder_specialization,201);
    }
    //Return 1 for updated else 0 for error
    public function update_therapist_profile(Request $req,$id){
        $therapist_update=Therapist::find($id)->update($req->all());
        return response($therapist_update,200);
    }
    public function therapist_disorder_speciality_insertion(Request $req){
        if (Auth::check()){
            if(Auth::user()->role!="Psychiatry"){
                return response("unauthorized acess",401);
            }

            else{
                $therapist_id=Therapist::where('user_id',$req->user()->id)->get()[0]->id;
                $therapist=Therapist::find($therapist_id);
                if(!Disorder::where('name',$req->name)->get()){
                    $disorder_speciality=Disorder::create($req->all());
                    
                    }
                else{
                    $disorder_speciality=Disorder::where('name',$req->name)->get();
                    }
                    $therapy_speciality=$therapist->disorders()->attach($disorder_speciality[0]->id);
                    return response()->json(
                           ["message"=>'therapist disorder speciality added successfully',
                    ]
                );

            }

    }
}
}