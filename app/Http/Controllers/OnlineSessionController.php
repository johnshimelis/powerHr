<?php

namespace App\Http\Controllers;

use App\Models\OnlineSession;
use Illuminate\Http\Request;

class OnlineSessionController extends Controller
{
    public function startSession( $var = null)
    {
        // webrtc code
        //it probably needs this server code as a bridge between the deveices
    }

    public function sessionOver( $var = null)
    {
        # code...
    }
}
