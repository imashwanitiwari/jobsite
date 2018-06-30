<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Dashboard extends CI_Controller {
	
	
	public function __construct(){
		parent::__construct();
		if(!$this->session->has_userdata('dcn_admin_signed_in'))
			{
				return redirect('admin/login');
			}
	}
	
	public function index(){
		
		$this->load->view('include/admin/header');
		$this->load->view('admin/dashboard');
		$this->load->view('include/admin/footer');
		
	}
	
	
	
	
	

	
}