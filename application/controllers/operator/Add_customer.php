<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Add_customer extends MY_Controller {
	
	public function __construct(){
		
		parent::__construct();
		$this->load->model('add_cust_model');
		
	}

	
	public function index()
	
	{
     $data2['cust'] = 1;	
	 $data2['subs_no']=$this->add_cust_model->subscription_no();
	 $data2['products']=$this->add_cust_model->products();
	 $this->load->helper('select');
	 $this->load->view('include/header',$data2);
	 $this->load->view('operator/addcustomer_ver2',$data2);
	 $this->load->view('include/footer',$data2);
	}
	
	public function add_cust(){
		
		if ($this->form_validation->run('customer') == FALSE)
		{
			$data['cust'] = 1;	
			//$data2['pack_names']=$this->add_cust_model->packnames();
			$data2['subs_no']=$this->add_cust_model->subscription_no();
			$this->load->helper('select');
			$this->load->view('include/header');
			$this->load->view('operator/addcustomer_ver2',$data2);
			$this->load->view('include/footer',$data);
		}
		else
		{
			$this->add_cust_model->add_customer();
			
		}
    
	 			
	}

	public function show_ala(){
		
		$id=$_POST['ID'];	
		$data=$this->add_cust_model->ala_channels($id); 
		//echo json_encode($data);

		
	
					
	   }
	

	   public function show_walk_order(){
		
		$id=$_POST['ID'];	
		$data=$this->add_cust_model->walking_order($id); 
		echo json_encode($data);

		
	
					
	   }
	 
	   
	   public function show_mso_packs_ala(){
		
		$id=$_POST['ID'];	
		$data['data']=$this->add_cust_model->packnames($id); 
		$data['ala']=$this->add_cust_model->ala_channels($id);
		$this->load->view('operator/scripts/select_packs',$data);
		
	
					
	   }
	  
	   
	   public function show_mso_packs_ala2(){
		
		$id=$_POST['ID'];	
		$data['data']=$this->add_cust_model->packnames($id); 
		$data['ala']=$this->add_cust_model->ala_channels($id);
		$this->load->view('operator/scripts/select_packs2',$data);
		
	
					
	   }
}








