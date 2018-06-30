<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Login extends CI_Controller{
	
			public function index()
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
						if($table=='lco')
						{

							$lco =true;
							$query=$this->db->query('select ID from operators where LCO_ID='.$login->ID);
							$all_firms=array();
							
							foreach($query->result() as $row){

								array_push($all_firms,$row->ID);

							}
							
							
							$dcn_id=$all_firms;
							$lco_id=$login->ID;
							$this->session->set_userdata('lco_id',$lco_id);
						}
						
						else 
						{
							$lco=false;
							$dcn_id=$login->ID;
						}
						


						$session_array=array (

							'dcn_signed_in' => true,
							'name' => $login->NAME,
							'dcn_id' => $dcn_id,
							'username' => $login->USER_NAME,
							'firm' =>$login->FIRM_NAME,
							'is_lco'=>$lco,
						);
						$this->session->set_userdata($session_array);
						return redirect('dashboard');
					}
					else 
					{
						$this->session->set_flashdata('login_feild',"Sorry! Username and Password are not matching. Please fill correct details");
						return redirect('home');
					}
				}
				else {
					return redirect('dashboard');
				}
				}

				public function signup()
				{
					$array=$this->input->post();
					$this->load->model('insert');
					if($this->input->post())
						{
							$this->load->library('form_validation');
						
							if ($this->form_validation->run('signup'))
							{
								$signup = $this->insert->index("signup",$array);
								if($signup)
								{
									$this->session->set_flashdata('signup_success',"You are very important to us, all information received will always remain confidential. We will contact you as soon as we review your message.");
									return redirect('signup');
								}
								else 
								{
									$this->session->set_flashdata('signup_feild','Sorry! Somthing went wrong we are unable to save your details. Please retry or Contact us Please');
									return redirect('home');
								}
							}
							else
							{
								$data['page_title'] = 'DCNTV - SignUp';
								 $this->load->view('signup',$data);
							}
						}
				else {
					return redirect('dashboard');
				}
				}

	}
	
	
