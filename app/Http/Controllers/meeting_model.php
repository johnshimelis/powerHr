<?php

class CommonModels {
    /*********
     * 
     * FROM common models
     * 
     */

    function generate_random_string($length = 12)
    {
        $str                  = "";
        $characters         = array_merge(range('a', 'z'), range('0', '9'));
        $max                = count($characters) - 1;
        for ($i = 0; $i < $length; $i++) {
            $rand = mt_rand(0, $max);
            $str .= $characters[$rand];
        }
        return $str;
    }

    function get_jitsi_server_domain()
    {
        $jitsi_server   =   '';
        $jitsi_domain   =   preg_replace("(^https?://)", "", $jitsi_server);
        $jitsi_domain   =   preg_replace("(^http?://)", "", $jitsi_domain);
        $jitsi_domain   =   str_replace("/", "", $jitsi_domain);
        return $jitsi_domain;
    }

    public function verify_meeting_code($meeting_code = '')
    {
        if ($meeting_code == "" || $meeting_code == NULL) :
            return false;
        endif;
        $query  = $this->db->get_where('meeting', array('meeting_code' => $meeting_code));
        if ($query->num_rows() > 0) :
            return true;
        endif;
        return false;
    }

    /*
    Meeting functions
    */

    function create_meeting($data = array(), $history = false)
    {
        $this->db->insert("meeting", $data);
        if ($history) :
            $history_data['meeting_code']   = $data['meeting_code'];
            $history_data['user_id']        = $data['user_id'];
            $history_data['joined_at']      = $data['created_at'];
            $this->db->insert("meeting_history", $history_data);
        endif;
        return true;
    }

    public function get_meeting_num_rows($meeting_code = '')
    {
        if ($meeting_code != "" && $meeting_code != NULL) :
            $this->db->like("meeting_code", $meeting_code, "both");
        endif;
        return $this->db->get('meeting')->num_rows();
    }

    public function get_meetings($meeting_code = '', $limit = NULL, $start = NULL)
    {
        if ($meeting_code != "" && $meeting_code != NULL) :
            $this->db->like("meeting_code", $meeting_code, "both");
        endif;
        $this->db->order_by('meeting_id', "DESC");
        $this->db->limit($limit, $start);
        return $this->db->get('meeting')->result_array();
    }

    function get_meeting_info($meeting_code = '')
    {
        $query = $this->db->get_where("meeting", array("meeting_code" => $meeting_code));
        if ($query->num_rows() > 0) :
            return $this->db->get_where("meeting", array("meeting_code" => $meeting_code))->first_row();
        else :
            $meeting_info                   =   new stdClass();
            $meeting_info->meeting_code     =    $meeting_code;
            $meeting_info->meeting_title    = "Anonymous Meeting";
            $meeting_info->user_id          = 0;
            $meeting_info->created_at       = "Unknown";
            return $meeting_info;
        endif;
    }

    function generate_meeting_code($length = 10)
    {
        $str                    = get_app_config("meeting_prefix");
        $characters             = array_merge(range('a', 'z'), range('A', 'Z'), range('0', '9'));
        $max                    = count($characters) - 1;
        for ($i = 0; $i < $length; $i++) {
            $rand   = mt_rand(0, $max);
            $str   .= $characters[$rand];
        }
        return $str;
    }

    public function get_meeting_history_num_rows($meeting_code = '')
    {
        if ($meeting_code != "" && $meeting_code != NULL) :
            $this->db->where("meeting_code", $meeting_code);
        endif;
        return $this->db->get('meeting_history')->num_rows();
    }

    public function get_meeting_history($meeting_code = '', $limit = NULL, $start = NULL)
    {
        if ($meeting_code != "" && $meeting_code != NULL) :
            $this->db->where("meeting_code", $meeting_code);
        endif;
        $this->db->order_by('meeting_history_id', "DESC");
        $this->db->limit($limit, $start);
        return $this->db->get('meeting_history')->result_array();
    }

    function check_availability_to_host_meeting()
    {
        $app_mode = get_app_config("app_mode");
        if ($app_mode == "free") :
            if (get_app_config("app_mandatory_login") != "true") :
                return true;
            else :
                if ($this->session->userdata('login_status') == "1") :
                    return true;
                else :
                    return false;
                endif;
            endif;
        endif;

        if ($app_mode == "academic") :
            if ($this->session->userdata('login_status') != "1") :
                return false;
            else :
                if ($this->session->userdata('login_type') == "teacher" || $this->session->userdata('login_type') == "admin") :
                    return true;
                else :
                    return false;
                endif;
            endif;
        endif;
        return true;
    }

    function check_availability_to_join_meeting()
    {
        if (get_app_config("app_mandatory_login") != "true") :
            return true;
        else :
            if ($this->session->userdata('login_status') == "1") :
                return true;
            else :
                return false;
            endif;
        endif;
    }

    function create_meeting_join_history($data = array())
    {
        $history_data['meeting_code']   = $data['meeting_code'];
        if ($data['user_id'] != "" && $data['user_id'] != NULL) :
            $history_data['user_id']        = $data['user_id'];
        endif;

        if ($data['nick_name'] != "" && $data['nick_name'] != NULL) :
            $history_data['nick_name']        = $data['nick_name'];
        endif;

        $history_data['joined_at']      = date("Y-m-d H:i:s");
        $this->db->insert("meeting_history", $history_data);
    }



    // dashboard
    function get_host_meeting_today()
    {
        $this->db->like("created_at", date("Y-m-d"), "both");
        return $this->db->get('meeting')->num_rows();
    }

    function get_join_meeting_today()
    {
        $this->db->like("joined_at", date("Y-m-d"), "both");
        return $this->db->get('meeting_history')->num_rows();
    }

    function get_user_login_today()
    {
        $this->db->like("last_login", date("Y-m-d"), "both");
        return $this->db->get('user')->num_rows();
    }

    function get_total_user()
    {
        return $this->db->get('user')->num_rows();
    }

    function yearly_join_meeting_chart_data()
    {
        $year   =    date("Y");
        $data   =   "";
        for ($i = 1; $i < 13; $i++) :
            if ($i != 1) :
                $data .= ',';
            endif;
            if ($i < 10) :
                $i = '0' . $i;
            endif;
            $data .= $this->get_join_meeting_count($year . '-' . $i);
        endfor;
        return $data;
    }

    function get_join_meeting_count($data)
    {
        $this->db->like("joined_at", $data, "both");
        return $this->db->get('meeting_history')->num_rows();
    }

    function yearly_host_meeting_chart_data()
    {
        $year   =    date("Y");
        $data   =   "";
        for ($i = 1; $i < 13; $i++) :
            if ($i != 1) :
                $data .= ',';
            endif;
            if ($i < 10) :
                $i = '0' . $i;
            endif;
            $data .= $this->get_host_meeting_count($year . '-' . $i);
        endfor;
        return $data;
    }

    function get_host_meeting_count($data)
    {
        $this->db->like("created_at", $data, "both");
        return $this->db->get('meeting')->num_rows();
    }

    function get_days_of_this_month()
    {
        $days   =   cal_days_in_month(CAL_GREGORIAN, date("m"), date("Y")) + 1;
        $data   =   "";
        for ($i = 1; $i < $days; $i++) :
            if ($i != 1) :
                $data .= ',';
            endif;
            $data .= '"' . $i . ' ' . date("M") . '"';
        endfor;
        return $data;
    }

    function joined_meeting_this_month_chart_data()
    {
        $days       =   cal_days_in_month(CAL_GREGORIAN, date("m"), date("Y")) + 1;
        $yearmonth  =   date("Y-m");
        $data       =   "";
        for ($i = 1; $i < $days; $i++) :
            if ($i != 1) :
                $data .= ',';
            endif;
            $data .= $this->get_join_meeting_count($yearmonth . '-' . $i);
        endfor;
        return $data;
    }

    function hosted_meeting_this_month_chart_data()
    {
        $days       =   cal_days_in_month(CAL_GREGORIAN, date("m"), date("Y")) + 1;
        $yearmonth  =   date("Y-m");
        $data       =   "";
        for ($i = 1; $i < $days; $i++) :
            if ($i != 1) :
                $data .= ',';
            endif;
            $data .= $this->get_host_meeting_count($yearmonth . '-' . $i);
        endfor;
        return $data;
    }
}