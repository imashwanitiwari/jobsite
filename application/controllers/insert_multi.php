<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Insert_multi extends CI_Controller{
	
				public function index()
				{
                    $num_tables=$this->input->post('insert_multi_helper_total_table');
                    $true=$this->input->post('insert_multi_helper_true');
                    $false=$this->input->post('insert_multi_helper_false');
                   $validation=$this->input->post('insert_multi_helper_validation');
                   $load=$this->input->post('insert_multi_helper_controller');
                    unset($_POST['insert_multi_helper_total_table']);
                    unset($_POST['insert_multi_helper_true']);
                    unset($_POST['insert_multi_helper_false']);
                    unset($_POST['insert_multi_helper_controller']);
                    unset($_POST['insert_multi_helper_validation']);
                    $post=$this->input->post();
                    // $array=$this->input->post();
                    if($validation!="")
                    {
                        $this->load->library('form_validation');;
                        if ($this->form_validation->run('signup'))
						{

                                for ($i=0;$i<=$num_tables;$i++)
                                {
                                        
                                    $table='set_multi_table'.$i;
                                    $table=$_POST[$table];
                                    $feilds='set_multi_feilds'.$i;
                                    $feilds=$_POST[$feilds];
                                    $feilds=explode(',',$feilds);
                                    $size=sizeof($feilds);
                                    $array=array();
                                    echo '<pre>';
                                    // var_dump($feilds);
                                    for($j=0;$j<$size;$j++){
                                        // $feilds=$feilds[$i];
                                        // $array[$feilds]=$value;
                                        $value=$feilds[$j];
                                        $value=$_POST[$value];
                                        
                                        
                                        
                                    $array[$feilds[$j]]=$value;
                                        // echo ($feilds[$i].$value);  
                                    }
                                    echo '<pre> = '.$table.' = ';
                                    print_r($array);

                                    //calling model for insertion
                                    $this->load->model('insert');
                                
                                        
                                                $insert = $this->insert->index($table,$array);
                                                if($insert)
                                                {
                                                    $this->session->set_flashdata('function_success',TRUE);
                                                    // redirect($true);
                                                }


                                                else 
                                                {
                                                    $this->session->set_flashdata('function_feild',TRUE);
                                                    return redirect($false);
                                                }
                                        
                                        

                                }
                            
                            }
                            else
                             {
                                // echo '<pre>' ;
                                // $flash=array_keys($post);
                                $error=validation_errors();
                                $this->session->set_flashdata('error',$error);
                                return redirect($load);
                            }

                    
				// 	$this->load->model('insert');
				// 	if($this->input->post())
				// 		{
				// 			$this->load->library('form_validation');
							
							
				// 				$insert = $this->insert->index($table,$array);
				// 				if($insert)
				// 				{
				// 					$this->session->set_flashdata('controller_success',true);
				// 					return redirect($true);
				// 				}
				// 				else 
				// 				{
				// 					$this->session->set_flashdata('controller_feild',true);
				// 					return redirect($false);
				// 				}
						
				// 		}
				// else {
				// 	return redirect('dashboard');
                // }
                }
				}

	}
	
	
