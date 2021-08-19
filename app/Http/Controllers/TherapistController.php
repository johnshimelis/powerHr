<?php

namespace App\Http\Controllers;

use App\Models\Therapist;
use Illuminate\Http\Request;

class TherapistController extends Controller
{
<<<<<<< HEAD
    public function completeProfile()
    {

        // needs to hold first name, last name, initials, gender, DOB, address,
        // city, phone number, 
        // approved mil degmo ende flag yinur

    }



=======
>>>>>>> SurveyApi
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
<<<<<<< HEAD

    public function updateWorkingHours(){
        //manipulate the value work hour begin and end to fit their time
    }
=======
>>>>>>> SurveyApi
}
