<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Broadcaster extends CI_Controller {
	
	
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
	 $this->load->view('admin/broadcaster');

	 //includin footer
	 $this->load->view('include/admin/footer');
			
    }
    
    //add function to recive and add the broadcaster form

    public function add()
    {
        $this->load->library('form_validation');
        $this->form_validation->set_message('is_unique', 'This %s already exists!');
        $this->form_validation->set_message('matches', 'Passwords are not matching!');
        if($this->form_validation->run('normal_form'))
        {
            //code here
            unset($_POST['PASSCONF']);
            $array=$this->input->post();
            $this->load->model('insert');
            $query=$this->insert->index("broadcaster",$array);
            if($query)
            {
                $this->load->library('session');
                $this->session->set_flashdata('add_broadcaster',TRUE);
                return redirect('admin/broadcaster');
            }
        }
        else 
        {
             //including header file
	 $this->load->view('include/admin/header');

	 //including add_channel view
	 $this->load->view('admin/broadcaster');

	 //includin footer
	 $this->load->view('include/admin/footer');
			
        }
    }

}