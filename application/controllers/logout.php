<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Logout extends CI_CONTROLLER {
	
	
	
	public function index(){
		
		$this->session->sess_destroy();
		$data['page_title'] = 'DCNTV - Cable TV Billing Software';
		$this->load->view('home',$data);
		
		
	}
	
	
	
	
	
}