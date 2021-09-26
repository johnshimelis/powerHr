<?php

namespace App\Http\Controllers;

use App\Models\Organization;
use App\Models\Booking;
use App\Models\Service;
use App\Models\Employee;

use Illuminate\Support\Facades;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;

class ScheduleController extends Controller
{
    public function createSession(Request $req)
    {
        // if(Auth::check()){
        //     $schedule=Schedule::create([
        //         'date'=>$req->date,
        //         'time'=>$req->time,
        //         'type'=>$req->type
        //     ]);
        // }
        // save the schedule info into the schedule table. 
        // It can include date, time, type, client the schedule is with
    }

    public function remind()
    {
        // send an email when the time is due for the session to begin
    }

    // the therapy functions as follows
    // 1. the user has a 1 hour session 
    // 2. both online and physical sessions are treated the same
    // 3. the schedule runs at the same time for either preselected weeks 
    // or when the therapists deems it fit 
    // maybe have some type of scoring system to track progress ***very optional***

    public function completeTherapy($var = null)
    {
        // - decided by the therapist
        // - when this happens the schedule would be cleared for other patients
    }
}
