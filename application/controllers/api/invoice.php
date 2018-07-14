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
                            $ac_id = $this->where->select_where("accounts",["REFRENCE"=>$data['REF']],"ID");
                            $discount = $this->where->select_where("accounts",["REFRENCE"=>$data['DISCOUNT_REF']],"AMOUNT");
                            $tax = $this->where->select_where("accounts","REFRENCE LIKE '%invoice_".$ac_id[0]['ID']."_tax%'","AMOUNT,CR_ID");
                            $tax_data = array();
                            foreach((array)$tax as $tax):
                                $tax_name = $this->where->select_where("accouting_ledgers","ID='". $tax['CR_ID']."' GROUP BY NAME","NAME,COUNT(NAME) AS TOTAL_TAX");
                                $tax_data[] = array("NAME"=>$tax_name[0]['NAME'],"AMOUNT"=>$tax['AMOUNT']);
                            endforeach;
                            $account_ref = $this->where->select_where("accounts",["REFRENCE"=>$data['REF']],"AMOUNT");
                            $response['data'][] = array("ID"=>$data['ID'],"PRODUCT_ID"=>$data['PRODUCT_ID'],"QUANTITY"=>$data['QUANTITY'],"PRODUCT"=>$products[0]['NAME'],"DATE"=>$data['DATE'],
                                                            "INVOICE_NO"=>$data['INVOICE_NO'],"OP_ID"=>$data['OP_ID'],"REF"=>$data['REF'],"AMOUNT"=>$account_ref[0]['AMOUNT'],
                                                            "TYPE"=>$data['TYPE'],"SUBSCRIBER_ID"=>$data['SUBSCRIBER_ID'], "RATE" => $data['RATE'], "DISCOUNT" => $discount[0]['AMOUNT'], "DISCOUNT_SCOPE" => $data['DISCOUNT_SCOPE']
                                                        , "TAX" => $tax_data, "TOTAL_TAX"=>$tax_name[0]['TOTAL_TAX']);
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
                                                     "STATUS" => $data['STATUS'], "SUBSCRIBER_ID" => $data['SUBSCRIBER_ID'], "AMOUNT" => $data['AMOUNT'], "CLOSING_DATE" => $data['CLOSING_DATE'], "DISCOUNT" => $data['DISCOUNT']);
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
        public function open_invoice()
        {
            if($this->api->authentication())
                {
                    if(isset($_POST['OP_ID'], $_POST['SUBSCRIBER_ID']))
                    {
                        $invoice_no = $this->where->select_where("invoice_summary","OP_ID=".$_POST['OP_ID'],"MAX(INVOICE_NO) AS LAST_INVOICE");
                        $data = array(
                            "INVOICE_NO" => $invoice_no[0]['LAST_INVOICE']+1,
                            "SUBSCRIBER_ID" => $_POST['SUBSCRIBER_ID'],
                            "STATUS" => 0,
                            "OP_ID" => $_POST['OP_ID']
                        );
                        $id = $this->insert->index("invoice_summary",$data);
                        $response = array("status"=>1,"response"=>array("ENTRY_ID"=>$id,"INVOICE_NO"=>$invoice_no[0]['LAST_INVOICE']+1),"errors"=>array("count"=>0,null));
                        echo json_encode($response);
                    }
                    else{
                        echo $this->api->errors(101);
                    }
                }
            else
                {
                    echo $this->api->errors(100);
                }
        }

        public function close_invoice()
        {
            if($this->api->authentication())
                {
                    if(isset($_POST['OP_ID'], $_POST['SUBSCRIBER_ID'], $_POST['INVOICE_NO']))
                    {
                        if($this->where->update_where("invoice_summary",["OP_ID"=>$_POST['OP_ID'], "SUBSCRIBER_ID"=>$_POST['SUBSCRIBER_ID'],"INVOICE_NO"=>$_POST['INVOICE_NO']],["STATUS"=>1]))
                        {
                        $response = array("status"=>1,"errors"=>array("count"=>0,null));
                        echo json_encode($response);
                        }
                        else{
                            echo $this->api->errors(104);
                        }
                    }
                    else{
                        echo $this->api->errors(101);
                    }
                }
            else
                {
                    echo $this->api->errors(100);
                }
        }


        public function add_invoice_elements()
        {
            if($this->api->authentication())
                {
                    if(isset($_POST['OP_ID'], $_POST['SUBSCRIBER_ID'], $_POST['INVOICE_NO'], $_POST['PRODUCT_ID'], $_POST['QUANTITY'], $_POST['REF'], $_POST['TYPE'], $_POST['RATE'], $_POST['DISCOUNT_REF'], $_POST['DISCOUNT_SCOPE']) && !in_array("",$_POST))
                    { 
                        // $invoice_no = $this->where->select_where("invoice_summary","OP_ID=".$_POST['OP_ID'],"MAX(INVOICE_NO) AS LAST_INVOICE");
                        // $data = array(
                        //     "INVOICE_NO" => $invoice_no[0]['LAST_INVOICE']+1,
                        //     "SUBSCRIBER_ID" => $_POST['SUBSCRIBER_ID'],
                        //     "STATUS" => 0,
                        //     "OP_ID" => $_POST['OP_ID']
                        // );
                        // $id = $this->insert->index("invoice_summary",$data);
                        // $response = array("status"=>1,"response"=>array("ENTRY_ID"=>$id,"INVOICE_NO"=>$invoice_no[0]['LAST_INVOICE']+1),"errors"=>array("count"=>0,null));
                        // echo json_encode($response);
                        if(sizeof($_POST<=11))
                        {
                          if($this->where->check_where_num("accounts","REFRENCE='".$_POST['REF']."'")==1 && $this->where->check_where_num("invoice","REF='".$_POST['REF']."'")==0 && $this->where->check_where_num("invoice_summary","INVOICE_NO=".$_POST['INVOICE_NO']." AND OP_ID = ".$_POST['OP_ID']." AND SUBSCRIBER_ID = ".$_POST['SUBSCRIBER_ID']." AND STATUS = 0") && $this->where->check_where_num("products",["ID"=>$_POST['PRODUCT_ID'],"VISIBLE"=>$_POST['OP_ID']])==1)
                          {
                            $account_ref = $this->where->select_where("accounts",["REFRENCE"=>$_POST['REF']],"AMOUNT");
                            if((int)$account_ref[0]['AMOUNT'] == (int)($_POST['QUANTITY']*$_POST['RATE']))
                            {
                            unset($_POST['api_key']);
                            $id=$this->insert->index("invoice",$_POST);
                                if($id>=1)
                                {
                                $response = array("status"=>1,"response"=>array("ENTRY_ID"=>$id),"errors"=>array("count"=>0,null));
                                echo json_encode($response);
                                $final_amount = $this->where->select_where("accounts","REFRENCE IN (SELECT REF FROM invoice WHERE INVOICE_NO =".$_POST['INVOICE_NO'].") AND REFRENCE !=''","SUM(AMOUNT) AS AMOUNT");
                                $final_tax = $this->where->select_where("accounts","REFRENCE LIKE '%tax_".$_POST['INVOICE_NO']."' AND REFRENCE !=''","SUM(AMOUNT) AS AMOUNT");
                                $final_discount = $this->where->select_where("accounts","REFRENCE IN (SELECT DISCOUNT_REF FROM invoice WHERE INVOICE_NO =".$_POST['INVOICE_NO'].") AND REFRENCE !=''","SUM(AMOUNT) AS AMOUNT");
                                $this->where->update_where("invoice_summary",["INVOICE_NO"=>$_POST['INVOICE_NO']],["AMOUNT" => $final_amount[0]['AMOUNT'],"TAX"=>$final_tax[0]['AMOUNT'], "DISCOUNT"=>$final_discount[0]['AMOUNT']]);
                                }
                                else
                                {
                                    echo $this->api->errors(104);
                                }
                            }
                            else {
                              echo  $this->api->errors(304);
                            }
                          }
                          else{
                            echo $this->api->errors(303);  
                          }   
                        }
                        else
                        {
                            echo $this->api->errors(103);
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
        public function add_tax()
        {
            if($this->api->authentication())
                {
                    if(isset($_POST['OP_ID'], $_POST['PRODUCT_ID'], $_POST['ACCOUNT_ID'], $_POST['RATE'], $_POST['RATE_TYPE']) && !in_array("",$_POST))
                    {
                        if($this->where->check_where_num("products",["ID" => $_POST['PRODUCT_ID']]) == 1 && $this->where->check_where_num("accouting_ledgers",["ID"=>$_POST['ACCOUNT_ID']]) == 1 && $this->where->check_where_num("tax",["PRODUCT_ID"=>$_POST['PRODUCT_ID'], "ACCOUNT_ID"=>$_POST['ACCOUNT_ID'], "STATUS"=> 1, "VISIBLE" => $_POST['OP_ID'] ]) == 0)
                        {
                            $data = array(
                                "PRODUCT_ID" => $_POST['PRODUCT_ID'],
                                "ACCOUNT_ID" => $_POST['ACCOUNT_ID'],
                                "RATE" => $_POST['RATE'],
                                "RATE_TYPE" => $_POST['RATE_TYPE'],
                                "STATUS" => 1,
                                "VISIBLE" => $_POST['OP_ID']
                            );
                            $id = $this->insert->index("tax",$data);
                            $response = array("status"=>1,"response"=>array("ENTRY_ID"=>$id),"errors"=>array("count"=>0,null));
                            echo json_encode($response);
                        }
                        else{
                            echo $this->api->errors(303);
                        }
                    }
                    else{
                        echo $this->api->errors(101);
                    }
                }
            else
                {
                    echo $this->api->errors(100);
                }
        }
        public function remove_tax()
        {
            if($this->api->authentication())
                {
                    if(isset($_POST['OP_ID'], $_POST['TAX_ID']))
                    {
                        if($this->where->check_where_num("tax",["ID" => $_POST['TAX_ID'],"VISIBLE"=>$_POST['OP_ID'],"STATUS"=>1]) == 1)
                        {
                            if($this->where->update_where("tax",["ID" => $_POST['TAX_ID'],"VISIBLE"=>$_POST['OP_ID']],["STATUS"=>0,"CLOSING_DATE"=>date('Y-m-d H-i-s')]))
                            {
                            $response = array("status"=>1,"errors"=>array("count"=>0,null));
                            echo json_encode($response);
                            }
                        }
                        else{
                            echo $this->api->errors(303);
                        }
                    }
                    else{
                        echo $this->api->errors(101);
                    }
                }
            else
                {
                    echo $this->api->errors(100);
                }
        }
}