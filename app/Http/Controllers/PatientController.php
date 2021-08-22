<?php

namespace App\Http\Controllers;

use App\Models\Patient;
use Illuminate\Http\Request;

class PatientController extends Controller
{ 
    // Register New Patient
    public function register_patient(Request $req){
        if(Auth::check()){
            if(Auth::user()->role=="Patient"){
                if($req->user()->is_profile_complete!=1){
                      $patient=Patient::create([
                          'first_name'=>$req->first_name,
                          'last_name'=>$req->last_name,
                          'gender'=>$req->gender,
                          'date_of_birth'=>$req->date_of_birth,
                          'level_of_study'=>$req->level_of_study,
                          'profile_pic_path'=>$req->profile_pic_path,
                          'selected_therapist'=>$req->selected_therapist,
                          'user_id'=>$req->user()->id
                      ]);
                      User::find(Auth::user()->id)->update(['is_profile_complete'=>1]);
                      return response($patient,201);
                      }
                 else{
                     return response("Your Profile is completed");
                 }
            }
        }
    }
    // Return All Patients
    public function all_patients(){
        return reponse()->json(
            [
                'patients'=>Patient::all()
            ]
        );
    }
    // Return Specific Patient
    public function patient($id){
        return response()->json(
            [
                'patient'=>Patient::find($id)
            ]
        );
    }
    // Update Patient
    public function update_profile(Request $req,$id){
       $patient=Patient::find($id)->update($req->all());
       return response()->json([
           'message'=>'update succesfully'
       ]);
    }
    // Delete Patient
    public function delete_patient($id){
      $patient=Patient::find($id);
      $patient->user()->delete();
      $patient->delete();
      return response()->json(
          [
              'message'=>'deleted succesfully'
          ]
      );

    }
}
    