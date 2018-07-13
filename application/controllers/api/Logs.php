<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Logs extends CI_Controller
{
        public function __construct()
        {
            parent::__construct();
            $this->load->library('api');
            $this->load->model('api/logs_model');
            $this->load->model('insert');
            $this->load->model('where');
        }
        public function get_activity($op_id =null, $type = 1)
        {
            if($this->api->authentication())
            {
                if(isset($_POST['START_VALUE'], $_POST['END_VALUE'] ,$_POST['ORDER']) && $op_id != null)
                {
                    if($type !=2)
                    {
                        $start_limit = is_int($_POST['START_VALUE']) ? $_POST['START_VALUE'] : 0;
                        $end_limit = ($_POST['END_VALUE'] > 100) ? 100 : $_POST['END_VALUE'];
                    }
                    else{
                        $start_limit = 0;
                        $end_limit = 100;
                    }
                    $order = ($_POST['ORDER'] == 2) ? "DESC": "ASC";
                    switch ($type) {
                        case 2:
                        $where = "OP_ID = '".$op_id."' AND DATE BETWEEN ".$_POST['START_VALUE']." AND ".$_POST['END_VALUE'];
                            break;
                        
                        default:
                            $where = "OP_ID = ".$op_id;
                            break;
                    }
                    if($data = $this->logs_model->get_activity($order, $where, $end_limit , $start_limit))
                    {
                        $response = array("errors" => array("count" => 0, null),"status"=>1);
                        foreach((array)$data as $data):
                            $response['data'][]= $data;
                        endforeach;
                        echo json_encode($response);
                    }
                    else{
                        echo $this->api->errors(102);
                    }
                }
                else{
                    echo $this->api->errors(101);
                }
            }
            else{
                echo $this->api->errors(100)."<pre>";
                //print_r($_POST['api_key']);
            }
        }
        
}