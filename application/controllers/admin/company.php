<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Company extends CI_Controller {
	
	
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

	 //including header file
	 $this->load->view('include/admin/header');

	 //including add_channel view
	 $this->load->view('admin/company');

	 //includin footer
	 $this->load->view('include/admin/footer');
			
    }
    
    public function company_vc(){
		//including helper for options
        $this->load->helper('select');
	 //including header file
	 $this->load->view('include/admin/header');

	 //including add_channel view
	 $this->load->view('admin/company_vc');

	 //includin footer
	 $this->load->view('include/admin/footer');
			
    }
    
    //add function to recive and add the broadcaster form

    public function add()
    {
        $this->load->library('form_validation');
        $this->form_validation->set_message('is_unique', 'This %s already exists!');
        if($this->form_validation->run('add_company'))
        {
            //code here
            $array=$this->input->post();
            $this->load->model('insert');
            $query=$this->insert->index("companies",$array);
            if($query)
            {
                $this->load->library('session');
                $this->session->set_flashdata('add_company',TRUE);
                return redirect('admin/company');
            }
        }
        else 
        {
             //including header file
	 $this->load->view('include/admin/header');

	 //including add_channel view
	 $this->load->view('admin/company');

	 //includin footer
	 $this->load->view('include/admin/footer');
			
        }
    }
    public function add_vc()
    {
        $this->load->helper('select');
        $this->load->library('form_validation');
        $this->form_validation->set_message('is_unique', 'This %s already exists!');
        if($this->form_validation->run('add_vc'))
        {
            //code here
            $array=$this->input->post();
            $this->load->model('insert');
            $query=$this->insert->index("company_vc",$array);
            if($query)
            {
                $this->load->library('session');
                $this->session->set_flashdata('add_company_vc',TRUE);
                return redirect('admin/company/company_vc');
            }
        }
        else 
        {
             //including header file
	 $this->load->view('include/admin/header');

	 //including add_channel view
	 $this->load->view('admin/company_vc');

	 //includin footer
	 $this->load->view('include/admin/footer');
			
        }
    }

}