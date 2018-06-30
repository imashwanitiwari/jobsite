<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Complaints extends MY_Controller {

public function index(){


    $this->load->view('include/header');
    $this->load->helper('select_helper');
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
    $this->load->helper('select_helper');
    $this->load->view('operator/all_complaints');
    $this->load->view('include/footer');


}



}