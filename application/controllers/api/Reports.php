<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Reports extends CI_Controller
{
     public function __construct()
        {
            parent::__construct();
            $this->load->library('api');
            $this->load->library('form_validation');
            $this->load->model('insert');
            $this->load->model('where');
            $this->load->model('api/reports_model');
        }
     public function lineman()
     {
         if($this->api->authentication())
         {
             if(isset($_POST['START_DATE'], $_POST['END_DATE'], $_POST['SORT_BY'], $_POST['STAFF_ID']))
             {
                switch ($_POST['SORT_BY']) {
                    case 'AREA':
                    $where_clause = "STAFF_ID IN (".implode(',',$_POST['STAFF_ID']).") AND AREA_ID IN (".implode(',',$_POST['AREA_ID']).") AND DATE(DATE) BETWEEN '".$_POST['START_DATE']."' 
                    AND '".$_POST['END_DATE']."' GROUP BY DATE(DATE)";
                    $data = $this->where->select_where("accounts",$where_clause,"SUM(AMOUNT) AS AMOUNT, COUNT(DISTINCT CR_ID) AS TOTAL , DATE(DATE) AS DATE");
                        break;
                    default:
                    $where_clause = "STAFF_ID IN (".implode(',',$_POST['STAFF_ID']).") AND DATE(DATE) BETWEEN '".$_POST['START_DATE']."' 
                    AND '".$_POST['END_DATE']."' GROUP BY DATE(DATE)";
                    $data = $this->where->select_where("accounts",$where_clause,"SUM(AMOUNT) AS AMOUNT, COUNT(DISTINCT CR_ID) AS TOTAL, DATE(DATE) AS DATE");
                    
                        break;
                  
                }
                $response_count = $this->where->check_where_num("accounts",$where_clause);    
                if($response_count)
                {
                    $response = array("status"=>"1","errors"=>array("count"=>0,null),"response"=>array("count"=>$response_count));
                    foreach((array) $data as $data):
                        $response['data'][] = array("DATE" => $data['DATE'], "AMOUNT" => $data['AMOUNT'], "CUST"=> $data['TOTAL'] );
                    endforeach;
                    /* echo $response_count; */
                    
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

     public function due_customers(){
         if($this->api->authentication())
         {   
            if(isset($_POST['AREA_ID'], $_POST['DUE_DATE'], $_POST['MIN_BAL'], $_POST['MAX_BAL'] ,$_POST['BAL_TYPE'], $_POST['OP_ID']))
            {
                $false_value = "0";
                $false_clause = "NOT IN";
                $true_claue = "IN";
                $area_clause = ($_POST['AREA_ID'] == $false_value) ? $false_clause : $true_claue;
                $due_date_clause = ($_POST['DUE_DATE'] == $false_value) ? "NOT LIKE" : ">";
                switch ($_POST['BAL_TYPE']) {
                    case $false_value:
                        $bal_query = 1;
                        break;
                    case "1" :
                        $bal_query = "accouting_ledgers.AMOUNT BETWEEN ".$_POST['MIN_BAL']." AND ".$_POST['MAX_BAL'];
                        break;
                    case "2" :
                        $bal_query = "accouting_ledgers.AMOUNT > ".$_POST['MIN_BAL'];
                        break;
                    case "3" :
                        $bal_query = "accouting_ledgers.AMOUNT < ".$_POST['MAX_BAL'];
                        break;
                    default:
                        $area_clause = $true_claue;
                        break;
                }
                if($data = $this->reports_model->due_customers($area_clause, $due_date_clause, $bal_query))
                {
                    $response = array("errors"=>array("count"=>0,null),"status"=>1);
                    foreach((array) $data as $data):
                        $response['data'][] = $data;
                    endforeach;
                    echo json_encode($response);
                }
                else {
                    echo $this->api->errors(102);
                }

            }
            else {
                echo $this->api->errors(101);
            }
        }
        else{
            echo $this->api->errors(100);
        }
     }
}        