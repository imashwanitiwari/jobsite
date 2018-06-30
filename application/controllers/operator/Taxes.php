<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Taxes extends MY_Controller {

public function index(){

     $this->load->view('include/header');
	 $this->load->view('operator/taxes');
	 $this->load->view('include/footer');
}

public function add_tax(){

     $this->load->view('include/header');
	 $this->load->view('operator/add_tax');
	 $this->load->view('include/footer');

}

}