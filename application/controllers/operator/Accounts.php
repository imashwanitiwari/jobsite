<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Accounts extends MY_Controller {


    public function __construct(){
		
		parent::__construct();
		//$this->load->model('accounts');
		
	}

public function bill_datatables(){

   $this->load->library('datatables');
   $this->datatables->select('REFRENCE,DATE,AMOUNT')->from('accounts')->where('DR_ID=(select ACCOUNT_ID from subscribers where SUBSCRIPTION_NO='.$_POST['SUBSCRIPTION_NO'].' AND OP_ID='.$_SESSION['dcn_id'].')');
   echo $this->datatables->generate();


}


public function generate_invoice(){
       
    $this->load->helper('html');
    $this->load->model('accounts_model');
    $data['data']=$this->accounts_model->get_op_cust_details();  
    $this->load->view('accounts/invoice',$data);



    }



}