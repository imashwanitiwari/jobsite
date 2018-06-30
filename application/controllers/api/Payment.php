<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Payment extends CI_Controller
{
        public function __construct()
        {
            parent::__construct();
            $this->load->library('api');
            $this->load->model('insert');
            $this->load->model('where');
        }
        public function get_balance()
        {
            
            if($this->api->authentication())
            {
                if(isset($_POST['OP_ID']) && isset($_POST['SUBSCRIPTION_NO']))
                {    
                    $data = $this->where->select_where("subscribers",["SUBSCRIPTION_NO"=>$_POST['SUBSCRIPTION_NO'],"OP_ID"=>$_POST['OP_ID']],"ACCOUNT_ID,FIRST_NAME,LAST_NAME");
                    if($data)
                        {
                            $account_id = $data[0]['ACCOUNT_ID'];
                            $debit = $this->where->select_where("accounts",["DR_ID"=>$account_id],"SUM(AMOUNT) AS DEBIT");
                            $debit = $debit[0]['DEBIT'];
                            $credit = $this->where->select_where("accounts",["CR_ID"=>$account_id],"SUM(AMOUNT) AS CREDIT");
                            $credit = $credit[0]['CREDIT'];
                            $balance = $debit-$credit;
                            $response = array("status"=>1,"errors"=>array("count"=>0,null),"response"=>array("balance"=>$balance,"FIRST_NAME"=>$data[0]['FIRST_NAME'],"LAST_NAME"=>$data[0]['LAST_NAME']));
                            echo json_encode($response);
                        }
                    else
                    {
                       echo $this->api->errors(102);
                    }
                }
                else
                {
                   echo $this->api->errors(101);
                }    
            }
            else
            {
                echo $this->api->errors(100);
            }
        }



        public function add_money()
        {
            if($this->api->authentication())
            {
               
                if(isset($_POST['DR_ID']) && isset($_POST['CR_ID']) && isset($_POST['PARTICULAR']) && isset($_POST['AMOUNT']) && isset($_POST['REFRENCE']) && isset($_POST['DATE']) && isset($_POST['OP_ID']) && isset($_POST['STAFF_ID']) && isset($_POST['AREA_ID']))
                {
                    if($_POST['AMOUNT']>1)
                
                        {
                            if(sizeof($_POST)>10)
                            {
                                echo $this->api->errors(103);
                            }
                            else
                            {
                                unset($_POST['api_key']);
                                $validate = $this->where->check_where("subscribers",["ACCOUNT_ID"=>$_POST['CR_ID'],"OP_ID"=>$_POST['OP_ID']]);
                                if($validate && $this->where->check_where("accouting_ledgers",["ID"=>$_POST['DR_ID']]))
                                    {
                                       // unset($_POST['OP_ID']); 
                                        $id = $this->insert->index('accounts',$_POST);
                                            $response = array("status"=>1,"response"=>array("ENTRY_ID"=>$id),"errors"=>array("count"=>0,null));
                                            echo json_encode($response);
                                    }
                                else
                                {
                                echo $this->api->errors(102);
                                }
                            }
                        }
                        else
                {
                    echo $this->api->errors(105);
                }
                    
                }
                else
                        {
                            echo $this->api->errors(101);
                        }
            }
            else {
                echo $this->api->errors(100);
            }
        }
}