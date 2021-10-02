<?php

namespace App\Http\Controllers;

use App\Models\Meeting;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class MeetingController extends Controller
{

    function createAndJoinMeeting(Request $request)
    {
        $user_id =   Auth::id();
        $meeting_code =   $request->meeting_code;
        $meeting_title =   $request->meeting_title;
        dd($user_id);
        if (empty($meeting_title) || $meeting_title == '' || $meeting_title == NULL) {
            $meeting_title = "Untitled";
        }

        $meeting = Meeting::create([
            'meeting_title' => $meeting_title,
            'meeting_code' => $meeting_code,
            'user_id' => $user_id
        ]);

        $this->api_v100_model->create_meeting($data, true);

        $response['status']     = 'success';
        $response['message']    = 'Meeting created.';



        $response['status']     = 'error';
        $response['message']    = 'Invalid meeting code.';

        $this->response($response, 200);
    }
}
