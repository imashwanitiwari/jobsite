<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Reports extends CI_Controller
{
     public function __construct()
        {
            parent::__construct();
            $this->load->library('api');
            $this->load->model('insert');
            $this->load->model('where');
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
}        