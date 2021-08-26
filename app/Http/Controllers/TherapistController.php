<?php

namespace App\Http\Controllers;

use App\Models\Therapist;
use Illuminate\Http\Request;
use App\Models\Disorder;
use App\Models\User;
use Auth;

class TherapistController extends Controller
{
    public function completeProfile()
    {

        // needs to hold first name, last name, initials, gender, DOB, address,
        // city, phone number, 
        // approved mil degmo ende flag yinur

    }



    public function selectTherapist()
    {
        // return all the therapists selected with their 
        // full name, alma mater, any personal info
        // and a view schedule button besides it
        //register Therapist Profile 
    }
    
    public function register_profile(Request $req)
    {
        $req->validate(
            [
                'first_name' => 'required|min:3|max:50',
                'last_name' => 'required|min:3|max:50',
                'title' => 'required|min:2|max:15',
                'gender' => 'required',
                'date_of_birth' => 'required|date',
                'alma_mater' => 'required|min:5',
                'bio' => 'required',
                'work_hour_begin' => 'required',
                'work_hour_end' => 'required'
            ]
        );
        if (Auth::check()) {
            if (Auth::user()->role == "Therapist") {
                if ($req->user()->is_profile_complete != 1) {
                    $therapist = Therapist::create([
                        'first_name' => $req->first_name,
                        'last_name' => $req->last_name,
                        'title' => $req->title,
                        'gender' => $req->gender,
                        'date_of_birth' => $req->date_of_birth,
                        'profile_photo_path' => $req->profile_photo_path,
                        'cv_path' => $req->cv_path,
                        'alma_mater' => $req->alma_mater,
                        'license_issue_date' => $req->license_issue_date,
                        'bio' => $req->bio,
                        'is_approved' => rand(0, 1),
                        'work_hour_begin' => $req->work_hour_begin,
                        'work_hour_end' => $req->work_hour_end,
                        'user_id' => $req->user()->id
                    ]);
                    User::find(Auth::user()->id)->update(['is_profile_complete' => 1]);
                    return response($therapist, 201);
                } else {
                    return response("Your Profile is completed");
                }
            }
        }
    }
    public function remove_therapist_speciality($id)
    {
        $therapist = Therapist::find($id);
        $therapist->disorders()->detach();
        return response()->json(
            [
                'message' => 'Therapist deleted succesfully'
            ]
        );
    }
    //return specific therapist
    public function fetch_profile($id)
    {
        $therapist = Therapist::find($id);
        return response($therapist, 201);
    }
    //return all therapist 
    public function all_therpist()
    {
        $all_therapists = Therapist::all();
        return response($all_therapists, 201);
    }
    //Therapist with its specilization
    public function all_therapists_with_disorder_specialization()
    {
        $all_therapist_with_disorder_specialization = Therapist::with('disorders')->get();
        return response($all_therapist_with_disorder_specialization);
    }
    //Specific therapy with specialization
    public function therapist_with_specialization($id)
    {
        $therapist_with_disorder_specialization = Therapist::find($id)->disorders;
        return response($therapist_with_disorder_specialization, 201);
    }
    //Return 1 for updated else 0 for error
    public function update_therapist_profile(Request $req, $id)
    {
        $therapist_update = Therapist::find($id)->update($req->all());
        return response($therapist_update, 200);
    }
    //Therapist Add his disorder Speciality
    public function therapist_disorder_speciality_insertion(Request $req)
    {
        if (Auth::check()) {
            if (Auth::user()->role != "Therapist") {
                return response("unauthorized acess", 401);
            } else {
                $validate = $req->validate(
                    ['name' => 'required']
                );
                $therapist_id = Therapist::where('user_id', $req->user()->id)->get()[0]->id;
                $therapist = Therapist::find($therapist_id);
                if (!Disorder::where('name', $req->name)->get()) {
                    $disorder_speciality = Disorder::create($req->all());
                } else {
                    $disorder_speciality = Disorder::where('name', $req->name)->get();
                }
                $therapy_speciality = $therapist->disorders()->attach($disorder_speciality[0]->id);
                return response()->json(
                    ["message" => 'therapist disorder speciality added successfully',]
                );
            }
        }
    }
}
