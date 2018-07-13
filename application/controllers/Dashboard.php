<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Dashboard extends MY_Controller {
	
	
	public function index(){
		
		$this->load->view('include/header');
		$this->load->view('dashboard');
		$this->load->view('include/footer');
		
	}
	
	
	public function get_dashboard(){

		$query=$this->db->query('select count(STB_ID) as TOTAL_CONNECTIONS from mso_op_pairing where OP_MSO_ID IN(select ID from operators_mso where OP_ID='.$_SESSION['dcn_id'].')');
		$result=$query->row_array();
		

        $query2=$this->db->query('select count(STB_ID) as TOTAL_ACTIVE from mso_op_pairing where OP_MSO_ID IN(select ID from operators_mso where OP_ID='.$_SESSION['dcn_id'].')'.' AND STATUS=1');
		$result2=$query2->row_array();
		
   
		$query3=$this->db->query('select count(STB_ID) as TOTAL_INACTIVE from mso_op_pairing where OP_MSO_ID IN(select ID from operators_mso where OP_ID='.$_SESSION['dcn_id'].')'.' AND STATUS=0');
		$result3=$query3->row_array();
		

		$query4=$this->db->query('select count(BOX_NO) as BOX_COUNT from company_stb where OP_MSO_ID IN(select ID from operators_mso where OP_ID='.$_SESSION['dcn_id'].')');
		$result4=$query4->row_array();
		

		$query5=$this->db->query('select count(STB_ID) as ACTIVE_BOX from mso_op_pairing where OP_MSO_ID IN(select ID from operators_mso where OP_ID='.$_SESSION['dcn_id'].')'.' AND STATUS=1');
		$result5=$query5->row_array(); 

		$query6=$this->db->query('select count(ID) as COMPLAINS from complaints where OP_ID ='.$_SESSION['dcn_id']);
		$result6=$query6->row_array();

		$query7=$this->db->query('select count(ID) as RES_COMPLAINS from complaints where OP_ID ='.$_SESSION['dcn_id'].' AND RESOLVE_DATE IS NOT NULL AND RESOLVE_DATE <>"0000-00-00 00:00:00"');
		$result7=$query7->row_array();

		$query8=$this->db->query('select count(ID) as PEND_COMPLAINS from complaints where OP_ID ='.$_SESSION['dcn_id'].' AND (RESOLVE_DATE IS NULL OR RESOLVE_DATE="0000-00-00 00:00:00")');
		$result8=$query8->row_array();
		
		$final=array($result,$result2,$result3,$result4,$result5,$result6,$result7,$result8);
		echo json_encode($final);
	}
	
	
	
}