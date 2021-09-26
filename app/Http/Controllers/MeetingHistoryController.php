<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MeetingHistoryController extends Controller
{
    // public function meeting_history_by_user_id_get() {        
    //     $user_id                  =   $this->input->get('user_id');
    //     if(!empty($user_id) && $user_id !='' && $user_id !=NULL && is_numeric($user_id)):
    //         $page               =   $this->input->get('page');
    //         $response           =   $this->api_v100_model->get_meeting_history($user_id,$page);
    //     else:
    //         $response['status']     = 'error';
    //         $response['message']    = 'Invalid user id.';
    //     endif;            
    //     $this->response($response,200);
    // }
    public function index()
    {
        # code...
    }
    public function create()
    {
        # code...
    }
    public function store(Request $request)
    {
        # code...
    }
    public function show($id)
    {
        # code...
    }
    public function edit($id)
    {
        # code...
    }
    public function update(Request $request, $id)
    {
        # code...
    }
    public function destroy()
    {
        # code...
    }
}
