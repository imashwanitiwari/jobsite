<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Invoice extends CI_Controller
{
     public function __construct()
        {
            parent::__construct();
            $this->load->library('api');
            $this->load->model('insert');
            $this->load->model('where');
        }

     public function get_invoice_details() 
       {
        if($this->api->authentication())
            {
                if(isset($_POST['OP_ID'], $_POST['INVOICE_NO']))//validating all reqiured feild either recieved or not
                {
                    if($this->where->check_where_num("invoice_summary","INVOICE_NO IN (".$_POST['INVOICE_NO'].") AND OP_ID=".$_POST['OP_ID']))
                        {
                        
                        $response_count=$this->where->check_where_num("invoice","INVOICE_NO IN (".$_POST['INVOICE_NO'].") AND OP_ID=".$_POST['OP_ID']);
                        $data = $this->where->select_where("invoice","INVOICE_NO IN (".$_POST['INVOICE_NO'].") AND OP_ID=".$_POST['OP_ID'],"*");

                       
                        if($response_count)
                        {
                            $response = array("status"=>"1","errors"=>array("count"=>0,null),"response"=>array("count"=>$response_count));
                            foreach((array) $data as $data):
                            $products = $this->where->select_where("products",["ID"=>$data['PRODUCT_ID']],"NAME");
                            if($products[0]['NAME'][0]=="@")
                            {
                                $product_ref = substr($products[0]['NAME'],1);
                                $product = explode('_',$product_ref);
                            // print_r($product);
                                $products = $this->where->select_where($product[0],["ID"=>$product[1]],"NAME");
                            }
                            $account_ref = $this->where->select_where("accounts",["REFRENCE"=>$data['REF']],"AMOUNT");
                            $response['data'][] = array("ID"=>$data['ID'],"PRODUCT_ID"=>$data['PRODUCT_ID'],"QUANTITY"=>$data['QUANTITY'],"PRODUCT"=>$products[0]['NAME'],"DATE"=>$data['DATE'],
                                                            "INVOICE_NO"=>$data['INVOICE_NO'],"OP_ID"=>$data['OP_ID'],"REF"=>$data['REF'],"AMOUNT"=>$account_ref[0]['AMOUNT'],
                                                            "TYPE"=>$data['TYPE'],"SUBSCRIBER_ID"=>$data['SUBSCRIBER_ID']);
                            endforeach;
                                            echo json_encode($response);
                        }
                        else
                        {
                            echo $this->api->errors(102);
                        }
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
    public function get_invoice() 
    {
     if($this->api->authentication())
         {
             if(isset($_POST['OP_ID'],$_POST['START_DATE'],$_POST['END_DATE'],$_POST['BY'], $_POST['BY_ID']))//validating all reqiured feild either recieved or not
             {
                 if($_POST['BY']=='OP_ID')
                     {
                     $response_count=$this->where->check_where_num("invoice_summary","DATE(DATE) BETWEEN '".$_POST['START_DATE']."' AND '".$_POST['END_DATE']."' AND OP_ID=".$_POST['OP_ID']);
                     $data = $this->where->select_where("invoice_summary","DATE(DATE) BETWEEN '".$_POST['START_DATE']."' AND '".$_POST['END_DATE']."' AND OP_ID=".$_POST['OP_ID'],"*");

                     }
                 else {
                     $response_count=$this->where->check_where_num("invoice_summary","DATE(DATE) BETWEEN '".$_POST['START_DATE']."' AND '".$_POST['END_DATE']."' AND OP_ID=".$_POST['OP_ID']." AND ".$_POST['BY']."=".$_POST['BY_ID']);
                     $data = $this->where->select_where("invoice_summary","DATE(DATE) BETWEEN '".$_POST['START_DATE']."' AND '".$_POST['END_DATE']."' AND OP_ID=".$_POST['OP_ID']." AND ".$_POST['BY']."=".$_POST['BY_ID'],"*");
                 }
                 if($response_count)
                 {
                     $response = array("status"=>"1","errors"=>array("count"=>0,null),"response"=>array("count"=>$response_count));
                     foreach((array) $data as $data):
                        $response['data'][] = array("ID" => $data['ID'], "DATE" => $data['DATE'], "INVOICE_NO" => $data['INVOICE_NO'], "OP_ID" => $data['OP_ID'],
                                                     "STATUS" => $data['STATUS'], "SUBSCRIBER_ID" => $data['SUBSCRIBER_ID'], "AMOUNT" => $data['AMOUNT'], "CLOSING_DATE" => $data['CLOSING_DATE']);
                     endforeach;
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