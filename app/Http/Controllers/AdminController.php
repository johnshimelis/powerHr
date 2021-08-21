<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Models\Admin;
use Illuminate\Models\Patient;
use Illuminate\Models\Therapist;
class AdminController extends Controller
{
    // ONLY LOGGEDIN ADMIN CAN REGISTER OTHER ADMIN 
    public function register_admin(Request $req){
        if(Auth::check()){
            if($req->user()->role=="Admin"){
                $admin=Admin::create([
                    'first_name'=>$req->first_name,
                    'last_name'=>$req->last_name,
                    'gender'=>$req->gender,
                    'profile_pic_path'->$req->profile_pic_path,
                    'user_id'=>$req->user()->id
                ]);
                User::find(Auth::user()->id)->update(['is_profile_complete'=>1]);
                return response($therapist,201);
            }
        }
    }
    // LoggedIn Admin DELETE OTHER ADMIN 
    public function remove_admin($id){
        if(Auth::check()){
            if($req->user()->role=="Admin"){
                  $admin=Admin::find($id);
                  $user=User::find($admin->user_id);
                  $admin->delete();
                  $user->delete();

            }
            return response()->json([
                "message"=>"account deleted succesfully",
            ]);
        }
    }
    // UPDATE ADMIN PROFILE
    public function update_profile(Request $req,$id){
        if(Auth::check()){
            if($req->user()->role=="Admin"){
                  $admin=Admin::find($id);
                  $user=User::find($admin->user_id);
                  $admin->update([
                      'first_name'=>$req->first_name,
                      'last_name'=>$req->last_name,
                      'gender'=>$req->gender,
                      'profile_pic_path'=>$req->profile_pic_path,
                  ]);
                  $user->update([
                      'email'=>$req->email,
                      'password'=>$req->password,
                      'role'=>$req->role
                  ]);
                  return response()->json([
                      'message'=>'account updated succesfully'
                  ]);
            }
        }
    }
    // Return All Admins
    public function all_admin(){
          return response()->json(
              [
              "Admins"=>Admin::all(),
              ]
          );
    }
    // Return All Patients
    public function all_students(){
        return response()->json(
            [
              "Patients"=>Patient::all()
            ]
        );
    }
    // Remove Patient
    public function remove_patient($id){
       $patient=Patient::find($id);
       $patient->user()->delete();
       $patient->delete();
    }
    //Find Patient By Name
    public function find_patient($name){
        return response()->json(
            [
                'patient'=>Patient::where('first_name','like','%'.$name.'%')->get()
            ]
        );
    }
    // Return All Approved Therapist 
    public function all_therapist(){
        $therapist=Therapist::where('is_approved',1)->get();
        return response()->json(
            [
                'Therapists'=>$therapist
            ]
        );
    }
    //Return All Un Approved Therapist
    public function therapist_unapproved(){
         $therapist=Therapist::where('is_approved',0);
         return response()->json(
             [
                'unApproved therapist'=>$therapist 
             ]
             );
    } 
    // Remove Therapist
    public function remove_therapist($id){
        $therapist=Therapist::find($id);
        $therapist->user()->delete();
        $therapist->delete();
       return response()->json(
           [
               "message"=>"therapist deleted Succesfully"
           ]
       );
    }
    // Search Therapist
    public function search_therapist($name){
        $therapist=Therapist::where('first_name','like','%'.$name.'%')->get();
        return response()->json(
            [
                "therapist"=>$therapist
            ]
        );
    }
    // Approve therapist
    public function approve_therapist($id){
        $is_approved=Therapist::find($id)->is_approved;
        if($is_approved){
            return response()->json(
                [
                    'message'=>'approved therapist'
                ]
            );
        }
        else{
            $therapist=Therapist::find($id);
            $therapist->update(
                [
                    'is_approved'=>1
                ]
            );
            return response()->json(
                [
                    'message'=>'approved succesfully',
                    'therapist'=>$therapist
                ]
            );
        }
        
    }

}
