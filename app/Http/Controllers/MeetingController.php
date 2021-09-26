<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MeetingController extends Controller
{
    public function create_meetting_post(Request $request)
    {
        $user_id                  =   $request->input('user_id');
        $meeting_code             =   $request->input('meeting_code');
        $meeting_title            =   $request->input('meeting_title');
        if (empty($meeting_title) || $meeting_title == '' || $meeting_title == NULL) {
            $meeting_title        = "Untitled";
        }
        $user_id                  =   $this->input->post('user_id');
        $meeting_code             =   $this->input->post('meeting_code');
        $meeting_title            =   $this->input->post('meeting_title');
        if (empty($meeting_title) || $meeting_title == '' || $meeting_title == NULL) {
            $meeting_title        = "Untitled";
        }

        if (!empty($meeting_code) && $meeting_code != '' && $meeting_code != NULL) {
            $is_valid_user_id         = $this->api_v100_model->validate_user_by_id($user_id);
            if ($is_valid_user_id) {
                $data['meeting_title']  = $meeting_title;
                $data['meeting_code']   = $meeting_code;
                $data['user_id']        = $user_id;
                $data['created_at']     = date("Y-m-d H:i:s");
                $this->api_v100_model->create_meeting($data);

                $response['status']     = 'success';
                $response['message']    = 'Meeting created.';
            } else {
                $response['status']     = 'error';
                $response['message']    = 'Invalid user ID.Login again then try.';
            }
        } else {
            $response['status']     = 'error';
            $response['message']    = 'Invalid meeting code.';
        }
        return  $this->response($response, 200);
    }

    function join_meetting_post()
    {
        $user_id                  =   $this->input->post('user_id');
        $meeting_code             =   $this->input->post('meeting_code');
        $nick_name                =   $this->input->post('nick_name');
        if (empty($user_id) || $user_id == '' || $user_id == NULL) :
            $user_id             = 0;
        endif;

        $history_data['user_id']            =   $user_id;
        $history_data['meeting_code']       =   $meeting_code;
        $history_data['nick_name']          =   $nick_name;

        if (!empty($meeting_code) && $meeting_code != '' && $meeting_code != NULL) :
            if (get_app_config("allow_unauthorized_meeting_code") != "true") :
                $verify_meeting_code         = $this->common_model->verify_meeting_code($meeting_code);
                if ($verify_meeting_code) :
                    // create history
                    $this->common_model->create_meeting_join_history($history_data);

                    $response['status']     = 'success';
                    $response['message']    = 'Meeting joined.';
                else :
                    $response['status']     = 'error';
                    $response['message']    = 'Unauthorize meeting ID not allowed by system.';
                endif;
            else :
                // create history
                $this->common_model->create_meeting_join_history($history_data);

                $response['status']     = 'success';
                $response['message']    = 'Meeting joined.';

            endif;
        else :
            $response['status']     = 'error';
            $response['message']    = 'Invalid meeting code.';
        endif;
        $this->response($response, 200);
    }

    function create_and_join_meetting_post()
    {
        $user_id                  =   $this->input->post('user_id');
        $meeting_code             =   $this->input->post('meeting_code');
        $meeting_title            =   $this->input->post('meeting_title');
        if (empty($meeting_title) || $meeting_title == '' || $meeting_title == NULL) :
            $meeting_title        = "Untitled";
        endif;
        if (empty($user_id) || $user_id == '' || $user_id == NULL) :
            $user_id             = 0;
        endif;
        if (!empty($meeting_code) && $meeting_code != '' && $meeting_code != NULL) :
            if (get_app_config("app_mandatory_login") == "true") :
                $is_valid_user_id         = $this->api_v100_model->validate_user_by_id($user_id);
                if ($is_valid_user_id) :
                    $data['meeting_title']  = $meeting_title;
                    $data['meeting_code']   = $meeting_code;
                    $data['user_id']        = $user_id;
                    $data['created_at']     = date("Y-m-d H:i:s");
                    $this->api_v100_model->create_meeting($data, true);

                    $response['status']     = 'success';
                    $response['message']    = 'Meeting created.';
                else :
                    $response['status']     = 'error';
                    $response['message']    = 'Invalid user ID.Login again then try.';
                endif;
            else :
                $data['meeting_title']  = $meeting_title;
                $data['meeting_code']   = $meeting_code;
                $data['user_id']        = $user_id;
                $data['created_at']     = date("Y-m-d H:i:s");
                $this->api_v100_model->create_meeting($data, true);

                $response['status']     = 'success';
                $response['message']    = 'Meeting created.';

            endif;
        else :
            $response['status']     = 'error';
            $response['message']    = 'Invalid meeting code.';
        endif;
        $this->response($response, 200);
    }

    /**
     * 
     * ADMIN SIDE OF MEETING CONTROLLER
     */


    // meeting
    function meeting($param1 = '', $param2 = '')
    {
        // active menu session
        $this->session->unset_userdata('active_menu');
        $this->session->set_userdata('active_menu', '3');
        if ($param1 == 'add') {
            $data['meeting_title']  = $this->input->post('meeting_title');
            $data['meeting_code']   = $this->input->post('meeting_code');
            $data['user_id']        = $this->session->userdata("user_id");
            $data['created_at']     = date("Y-m-d H:i:s");

            $this->db->insert('meeting', $data);
            $this->session->set_flashdata('success', 'Meeting create successed');
            redirect(base_url() . 'admin/meeting/', 'refresh');
        }
        if ($param1 == 'update') {
            $data['meeting_title']  = $this->input->post('meeting_title');
            $this->db->where('meeting_id', $param2);
            $this->db->update('meeting', $data);
            $this->session->set_flashdata('success', 'Meeting update successed.');
            redirect(base_url() . 'admin/meeting/', 'refresh');
        }
        $meeting_code           = $this->input->get('meeting_code');
        $search_string = '';
        if ($meeting_code != "" && $meeting_code != NULL) :
            $filter['meeting_code '] = $meeting_code;
            $search_string .= 'meeting_code=' . $meeting_code;
            $data['meeting_code'] = $meeting_code;
        endif;
        $total_rows     = $this->common_model->get_meeting_num_rows($meeting_code);
        // page
        $config                     = $this->common_model->pagination();
        $config["base_url"]         = base_url() . "admin/meeting?" . $search_string;
        $config["total_rows"]       = $total_rows;
        $config["per_page"]         = 15;
        $config["uri_segment"]      = 3;
        //$config['use_page_numbers'] = TRUE;
        $config['page_query_string'] = TRUE;
        $this->pagination->initialize($config);
        $data['last_row_num']       =  $this->uri->segment(3);
        $page                       = ($this->input->get('per_page') != "" || $this->input->get('per_page') != NULL) ? $this->input->get('per_page') : 0;
        //($this->uri->segment(3)) ? $this->uri->segment(3) : 0;   
        $data["meetings"]              = $this->common_model->get_meetings($meeting_code, $config["per_page"], $page);
        $data["links"]              = $this->pagination->create_links();
        $data['total_rows']         = $config["total_rows"];
        $data['page_name']          = 'meeting';
        $data['page_title']         = 'Manage Meetings';
        $this->load->view('admin/index', $data);
    }

    

    // meeting
    function meeting_history($param1 = '', $param2 = '')
    {
        // active menu session
        $this->session->unset_userdata('active_menu');
        $this->session->set_userdata('active_menu', '4');
        $meeting_code           = $this->input->get('meeting_code');
        $search_string = '';
        if ($meeting_code != "" && $meeting_code != NULL) :
            $filter['meeting_code '] = $meeting_code;
            $search_string .= 'meeting_code=' . $meeting_code;
            $data['meeting_code'] = $meeting_code;
        endif;
        $total_rows     = $this->common_model->get_meeting_history_num_rows($meeting_code);
        // page
        $config                     = $this->common_model->pagination();
        $config["base_url"]         = base_url() . "admin/meeting_history?" . $search_string;
        $config["total_rows"]       = $total_rows;
        $config["per_page"]         = 15;
        $config["uri_segment"]      = 3;
        //$config['use_page_numbers'] = TRUE;
        $config['page_query_string'] = TRUE;
        $this->pagination->initialize($config);
        $data['last_row_num']       =  $this->uri->segment(3);
        $page                       = ($this->input->get('per_page') != "" || $this->input->get('per_page') != NULL) ? $this->input->get('per_page') : 0;
        //($this->uri->segment(3)) ? $this->uri->segment(3) : 0;   
        $data["meeting_histories"]  = $this->common_model->get_meeting_history($meeting_code, $config["per_page"], $page);
        $data["links"]              = $this->pagination->create_links();
        $data['total_rows']         = $config["total_rows"];
        $data['page_name']          = 'meeting_history';
        $data['page_title']         = 'Meetings History';
        $this->load->view('admin/index', $data);
    }

    function room_join_meeting($meeting_code = '')
    {
        $meeting_code = preg_replace('/[^A-Za-z0-9\-]/', '', $meeting_code);
        // login check
        if (get_app_config("app_mandatory_login") == "true") :
            if ($this->session->userdata('login_status') != 1) :
                $this->session->set_flashdata('error', 'Login required.');
                $this->session->unset_userdata('login_redirect_url');
                $this->session->set_userdata('login_redirect_url', base_url("room/" . $meeting_code));
                redirect(base_url('login'), 'refresh');
            endif;
        endif;

        // meeting code check
        if ($meeting_code == '' || $meeting_code == NULL) :
            $this->session->set_flashdata('error', 'Invalid meeting ID');
            redirect(base_url() . 'room', 'refresh');
        endif;

        // unauthorized meeting code check
        if (get_app_config("allow_unauthorized_meeting_code") != 'true') :
            if ($this->common_model->verify_meeting_code($meeting_code) === false) :
                $this->session->set_flashdata('error', 'unauthorized meeting ID is not allowed by admin.');
                redirect(base_url() . 'room', 'refresh');
            endif;
        endif;
        $data['meeting_code']         =    $meeting_code;
        $data['nick_name']             =    "";
        $data['user_id']             =    $this->session->userdata("user_id");
        $this->common_model->create_meeting_join_history($data);

        $data['meeting_info']         =     $this->common_model->get_meeting_info($meeting_code);
        $this->load->view('room', $data);
    }

    function room_join_by_post_meeting_code()
    {
        $meeting_code                 = $this->input->post("meeting_code");
        if ($meeting_code != '' || $meeting_code != NULL) :
            redirect(base_url() . 'room/' . $meeting_code, 'refresh');
        else :
            $this->session->set_flashdata('error', 'Invalid meeting ID');
            redirect(base_url() . 'room/', 'refresh');
        endif;
    }

    function room_create_and_join_by_post_meeting_code()
    {
        $user_id                  =   $this->session->userdata("user_id");
        $meeting_code             =   $this->input->post('meeting_code');
        $meeting_title            =   $this->input->post('meeting_title');
        if ($meeting_code != '' || $meeting_code != NULL) :
            if (empty($meeting_title) || $meeting_title == '' || $meeting_title == NULL) :
                $meeting_title        = "Untitled";
            endif;
            if (empty($user_id) || $user_id == '' || $user_id == NULL) :
                $user_id             = 0;
            endif;
            if (get_app_config("app_mandatory_login") == "true") :
                $is_valid_user_id         = $this->common_model->validate_user_by_id($user_id);
                if ($is_valid_user_id) :
                    $data['meeting_title']  = $meeting_title;
                    $data['meeting_code']   = $meeting_code;
                    $data['user_id']        = $user_id;
                    $data['created_at']     = date("Y-m-d H:i:s");
                    $this->common_model->create_meeting($data, true);
                else :
                    $this->session->set_flashdata('error', 'Invalid user ID.Login again then try.');
                    redirect(base_url() . 'room/', 'refresh');
                endif;
            else :
                $data['meeting_title']  = $meeting_title;
                $data['meeting_code']   = $meeting_code;
                $data['user_id']        = $user_id;
                $data['created_at']     = date("Y-m-d H:i:s");
                $this->common_model->create_meeting($data, true);
            endif;
            redirect(base_url() . 'room/' . $meeting_code, 'refresh');
        else :
            $this->session->set_flashdata('error', 'Invalid meeting ID');
            redirect(base_url() . 'room/', 'refresh');
        endif;
    }
}
