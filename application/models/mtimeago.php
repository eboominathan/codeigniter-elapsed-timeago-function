<?php
class Mtimeago extends CI_Model{
    function __construct() {
        parent::__construct();
    }

    function SaveForm($form_data) {
        $this->db->insert('visitor_name', $form_data);
        if ($this->db->affected_rows() == '1') {
            return $this->db->insert_id();
        }
        return FALSE;
    }

    public function GetAllInfo($data = null, $num = null, $offset = null) {
        $this->db->order_by('id', 'DESC');
        if ($data != null)
            $this->db->where($data);
        return $this->db->get('visitor_name', $num, $offset)->result_array();
    }

    public function Delete($data) {
        if ($this->db->delete('visitor_name', $data))
            return "successfully removed";
        else
            return "deletion unsuccessful";
    }

    public function GetInfoByRow($data = null) {
        $this->db->order_by('id', 'DESC');
        $this->db->where($data);
        $query = $this->db->get('visitor_name')->row();
        return $query;
    }

    public function Manage($data, $where, $type) {
        $this->db->where($where);
        if ($this->db->update('visitor_name', $data))
            return True;
        else
            return False;
    }
    
    function time_ago($ptime) {
        $today = time();
        $createdday = strtotime($ptime); //mysql timestamp of when post was created  
        $datediff = abs($today - $createdday);
        $difftext = "";
        $years = floor($datediff / (365 * 60 * 60 * 24));
        $months = floor(($datediff - $years * 365 * 60 * 60 * 24) / (30 * 60 * 60 * 24));
        $days = floor(($datediff - $years * 365 * 60 * 60 * 24 - $months * 30 * 60 * 60 * 24) / (60 * 60 * 24));
        $hours = floor($datediff / 3600);
        $minutes = floor($datediff / 60);
        $seconds = floor($datediff);
        //year checker  
        if ($difftext == "") {
            if ($years > 1)
                $difftext = $years . " years ago";
            elseif ($years == 1)
                $difftext = $years . " year ago";
        }
        //month checker  
        if ($difftext == "") {
            if ($months > 1)
                $difftext = $months . " months ago";
            elseif ($months == 1)
                $difftext = $months . " month ago";
        }
        //month checker  
        if ($difftext == "") {
            if ($days > 1)
                $difftext = $days . " days ago";
            elseif ($days == 1)
                $difftext = $days . " day ago";
        }
        //hour checker  
        if ($difftext == "") {
            if ($hours > 1)
                $difftext = $hours . " hours ago";
            elseif ($hours == 1)
                $difftext = $hours . " hour ago";
        }
        //minutes checker  
        if ($difftext == "") {
            if ($minutes > 1)
                $difftext = $minutes . " minutes ago";
            elseif ($minutes == 1)
                $difftext = $minutes . " minute ago";
        }
        //seconds checker  
        if ($difftext == "") {
            if ($seconds > 1)
                $difftext = $seconds . " seconds ago";
            elseif ($seconds == 1)
                $difftext = $seconds . " second ago";
        }
        return $difftext;
    }
}