<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {

	
	public function index()
	
	{   
       	 $data['page_title'] = 'DCNTV - Cable TV Billing Software';
         $this->load->view('admin/login',$data);
	}
	public function login_validation()
				{
					$table=$this->input->post('table');
					unset($_POST['table']);
					$array=$this->input->post();
					$this->load->model('where');
					if($this->input->post())
					{
					$login = $this->where->check_where($table,$array);
					if($login)
					{
						$session_array=array (

							'dcn_admin_signed_in' => true,
							'name' => $login->NAME,
							'dcn_id' => $login->ID,
							'username' => $login->USER_NAME
						);
						$this->session->set_userdata($session_array);
						return redirect('admin/dashboard');
					}
					else 
					{
						$this->session->set_flashdata('login_feild',"Sorry! Username and Password are not matching. Please fill correct details");
						return redirect('admin/login');
					}
				}
				else {
					return redirect('admin/dashboard');
				}
				}
}
