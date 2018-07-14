<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Logs_model extends CI_Model {

    public function get_activity($order,$where,$end_limit,$start_limit)
    {
        $query = $this->db->where($where)
                         ->select("*")->order_by("ID",$order)->limit($end_limit,$start_limit)->get("cl_logs");
                if($query->num_rows()>0)
                    {
                        return $query->result_array();
                    }
                    else {
                        return false;
                    }
    }
}
