<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Company_service extends CI_Controller {
	
	
	public function __construct(){
		parent::__construct();
		if(!$this->session->has_userdata('dcn_admin_signed_in'))
			{
				return redirect('admin/login');
			}
	}
	
	
	//index funtion
	
	
	public function index(){
		//including helper for options
	 $this->load->helper('select');

	 //including header file
	 $this->load->view('include/admin/header');

	 //including add_channel view
	 $this->load->view('admin/company_service');

	 //includin footer
	 $this->load->view('include/admin/footer');
			
	}





	//add channel company function help to add new channel company



	public function add_company_service()
	{
		//cearting array of all post values
		$array=$this->input->post();


		//loading insertion model
		$this->load->model('insert');

		//calling inserting function to insert data
		$query=$this->insert->index('company_services',$array);


		if($query==TRUE)
		{

			//if inserted successfuly
			$this->session->set_flashdata('add_company_service',TRUE);
			return redirect('admin/company_service');
		}
		else
		{
			//if not inserted
			echo "This Channel Can't Be Create	";
		}
	}
	
	




	//add channel type help to add new channel type


	public function add_service()
	{

			//cearting array of all post values
			$array=$this->input->post();

		//checking form validations

		$this->load->library('form_validation');
		$this->form_validation->set_message('is_unique', 'This %s already exists!');
		if($this->form_validation->run('add_service'))
		{
		
		
			//loading insertion model
			$this->load->model('insert');
	
		
			//calling inserting function to insert data
			$query=$this->insert->index('services',$array);
	
	
			if($query)
			{
	
				//if inserted successfuly
				$this->session->set_flashdata('add_service',TRUE);
				return redirect('admin/company_service');
			}
			else
			{
				//if not inserted
				return redirect('admin/company_service');
			}
		}
		else
		{
			$this->session->set_flashdata('add_service_validation_fail',TRUE);
			$this->load->helper('select');

			//including header file
			$this->load->view('include/admin/header');
	   
			//including add_channel view
			$this->load->view('admin/company_service');
	   
			//includin footer
			$this->load->view('include/admin/footer');
		}

	}


	






}