<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Customers extends CI_Controller
{
    public function __construct()
        {
            parent::__construct();
            $this->load->library('api');
            $this->load->library('form_validation');
            $this->load->model('insert');
            $this->load->model('api/Customers_model');
            $this->load->model('where');
        }
    public function delete_customer($cid = null, $op_id = null, $del_state = null)
    {
        if($this->api->authentication())
        {
            if($cid != null && $op_id != null && $del_state != null && ($del_state == "1" || $del_state == "2"))
            {
                if($this->where->check_where_num("subscribers","ID = ".(int)$cid." AND OP_ID = ".(int)$op_id." AND IS_DELETED IN (0,1)"))
                {
                    if($this->where->update_where("subscribers", ["ID" => (int)$cid , "OP_ID" => (int)$op_id], ["IS_DELETED" => (int)($del_state)]))
                        {
                           echo json_encode(array("errors"=>array("count"=>0,null), "status"=>1));
                        }
                    else {
                        echo $this->api->errors(104);
                    }
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
            echo $this->api->errors(100);
        }
    }
    public function deleted_cutomer_list($op_id = null)
    {
        if($this->api->authentication())
        {
            if($op_id != null)
            {
                    if($data = $this->Customers_model->deleted_customers($op_id))
                        {
                            foreach((array)$data as $data):
                                $response[] = $data;
                            endforeach;
                           echo json_encode(array("errors"=>array("count"=>0,null), "status"=>1,"data"=>$response));
                        }
                    else {
                        echo $this->api->errors(102);
                    }
            }
            
            else{
                echo $this->api->errors(101);
            }
        }
        else{
            echo $this->api->errors(100);
        }
    }
    
}
?>