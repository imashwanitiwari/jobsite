<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Complaints extends MY_Controller {

public function index(){


    $this->load->view('include/header');
    $this->load->helper('select');
    $this->load->view('operator/complaints');
    $this->load->view('include/footer');


}


public function show_sub_issue(){

$issue_id=$_POST['ID'];
$this->load->helper('select_helper');
option_dif_where('issue_sub',array('ISSUE_ID'=>$issue_id),'ID','NAME');

}

public function all_complaints(){


    $this->load->view('include/header');
    $this->load->helper('select');
    $this->load->view('operator/all_complaints');
    $this->load->view('include/footer');


}

public function edit_complaint(){
	
	$data=array(
	
	'ISSUE'=>$_POST['ISSUE_ID']."-".$_POST['SUB_ISSUE_ID'],
	'PROBLEM'=>$_POST['PROBLEM'],
	'TITLE'=>$_POST['TITLE'],
	'REG_DATE'=>$_POST['REG_DATE'],
	'RESOLVE_DETAILS'=>$_POST['RESOLVE_DETAILS'],
	'OP_ID'=>$_SESSION['dcn_id'],
	
	'PRIORITY'=>$_POST['PRIORITY']
	);
	
	$this->db->update('complaints',$data,array('COMP_NO' =>$_POST['COMPP_NO']));
	
	echo "complain edited successfully";
}

}