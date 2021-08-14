<?php

namespace App\Http\Controllers;

use App\Models\Therapist;
use Illuminate\Http\Request;

class TherapistController extends Controller
{
    public function selectTherapist()
    {
        // return all the therapists selected with their 
        // full name, alma mater, any personal info
        // and a view schedule button besides it
    }

    public function viewSchedule($therpistId)
    {
        // return the right data structure for the schedules. time, date
    }
}
