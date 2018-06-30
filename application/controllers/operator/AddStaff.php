<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class AddStaff extends MY_Controller {
	
	public function __construct(){
		
		parent::__construct();
		$this->load->model('add_staff_model','staff');
		
	}

	
	public function index()
	
	{
     
     $this->load->view('include/header');
     $this->load->helper('select');
	 $this->load->view('operator/addStaff');
	 $this->load->view('include/footer');
	}
	
        public function add_member()
        {
        
             //print_r($_POST);
             if ($this->form_validation->run('staff'))
             {

               
               $this->staff->add_staff();
             }
                
                else
                {
                $this->load->view('include/header');
                $this->load->helper('select');
                $this->load->view('operator/addStaff');
                $this->load->view('include/footer');
                }

        }

    public function add_type(){
    
   
        $this->staff->add_staff_type();
    


    }


    public function staff_list(){
    
        $this->load->view('include/header');
        $this->load->helper('select');
        $this->load->view('operator/staff_list');
        $this->load->view('include/footer');


    }

    public function show_staff_list(){
    
        $this->load->library('datatables');
        $this->datatables->select('staff.ID as STAFF_ID,ADHAR,PAN,GST,F_NAME,L_NAME,ADDRESS,EMAIL,USER_NAME,staff_types.NAME as STAFF_TYPE,JOINING_DATE,areas.NAME as AREA_NAME')->from('staff')->where_in('staff.OP_ID',$this->session->userdata('dcn_id'))
        ->join('staff_types','staff_types.ID=staff.TYPE')
        ->join('area_staff','area_staff.STAFF_ID=staff.ID')
        ->join('areas','areas.ID=area_staff.AREA_ID');
        echo $this->datatables->generate();


    }

    public function edit_staff(){

        //print_r($_POST);
		 $data=array(
			'F_NAME'=>$_POST['F_NAME'],
			'L_NAME'=>$_POST['L_NAME'],
            'ADDRESS'=>$_POST['ADDRESS'],
            'EMAIL'=>$_POST['EMAIL'],
            'ADHAR'=>$_POST['ADHAR'],
            'PAN'=>$_POST['PAN'],
            'GST'=>$_POST['GST'],
            'USER_NAME'=>$_POST['USER_NAME'],
            'PASSWORD'=>$_POST['PASSWORD'],
            'TYPE'=>$_POST['TYPE']
		  );
		  
          
		  $this->db->where(array('ID'=>$_POST['STAFF_ID'],'OP_ID'=>$this->session->userdata('dcn_id')));
          $this->db->update('staff', $data);
          $this->db->update('area_staff',array('AREA_ID'=>$_POST['AREA_ID']),array('STAFF_ID' => $_POST['STAFF_ID']));
		  $this->session->set_flashdata('edit_staff', '1');
		  redirect('/operator/addStaff/staff_list');	
    }




	
}