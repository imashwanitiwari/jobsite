<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Add_area extends MY_Controller {

	public function index(){
	 if($this->session->userdata('dcn_signed_in'))
	 {
	    $this->load->view('include/header');
	    $this->load->view('operator/add_area');
	    $this->load->view('include/footer');
	 }
	else 
	redirect('/home');	

	}
	
	public function addArea(){
	  $this->load->model('add_area_model');
      $this->add_area_model->addarea();	
		
		
	}

	public function area_list(){
		$this->load->library('datatables');
		$this->datatables->select('ID,NAME,TOTAL_HOUSES,REMARK')->from('areas')->where_in('areas.OP_ID',$this->session->userdata('dcn_id'));
        echo $this->datatables->generate();
	}

	public function edit_area(){

		$data=array(
			'NAME'=>$_POST['edit_area'],
			'TOTAL_HOUSES'=>$_POST['edit_houses'],
			'REMARK'=>$_POST['edit_remark'],
		
		  );
		  

		  $this->db->where(array('ID'=>$_POST['AREA_ID'],'OP_ID'=>$this->session->userdata('dcn_id')));
		  $this->db->update('areas', $data);
		  $this->session->set_flashdata('edit_area', '1');
		  redirect('/operator/add_area');	  

        //print_r($_POST);

	}
	
}