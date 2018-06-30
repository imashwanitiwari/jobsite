<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Insert_nologin extends CI_Controller{
	
				public function index()
				{
                    $table=$this->input->post('insert_helper_table');
                    $true=$this->input->post('insert_helper_true');
                    $false=$this->input->post('insert_helper_false');
                    unset($_POST['insert_helper_table']);
                    unset($_POST['insert_helper_true']);
                    unset($_POST['insert_helper_false']);
					$array=$this->input->post();
					$this->load->model('insert');
					if($this->input->post())
						{
							$this->load->library('form_validation');
							
							
								$insert = $this->insert->index($table,$array);
								if($insert)
								{
									$this->session->set_flashdata('controller_success',true);
									return redirect($true);
								}
								else 
								{
									$this->session->set_flashdata('controller_feild',true);
									return redirect($false);
								}
						
						}
				else {
					return redirect('dashboard');
				}
				}

	}
	
	
