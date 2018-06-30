<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Packages_model extends CI_Model{
	

	
	
	public function dropdown(){
      if(is_array($_SESSION['dcn_id'])){
	  $query = $this->db->query('select FIRM_NAME,ID from mso where ID IN(select MSO_ID from operators_mso where OP_ID IN('.implode(", ",$_SESSION['dcn_id']) . '))');
	}	

	 else 
	 $query = $this->db->query('select FIRM_NAME,ID from mso where ID IN(select MSO_ID from operators_mso where OP_ID ='.$_SESSION['dcn_id'].')');
	  $result= $query->result_array();	
      return $result;	
	}
	
	public function pack_item(){
    
	  $query = $this->db->query('select NAME,ID from pack_types');	
	  $result= $query->result_array();	
      return $result;	
	}
	
	
	public function add_pack_type(){
		$this->load->library('session');
	    if(isset($_POST['pack_type'])){
		
	      $data = array(
        
          'NAME' => $_POST['type']
        
          );

          if($this->db->insert('pack_types', $data)){
			  
			  $this->session->set_flashdata('add_pack_type',TRUE);
			   return redirect('operator/packages');
		    }	
		 else{
				
			$this->session->set_flashdata('add_pack_type',FALSE);
				
				
		    }
		
	    }		
	}
	
	
	
	public function add_package(){
		
		if(isset($_POST['add_pack'])){
		  $name=$_POST['mso'];
		  $query=$this->db->query('select ID from mso where FIRM_NAME="'.$name.'"');
		  $result= $query->row_array();
		  $mso_id=$result['ID'];
		  $packtype=$_POST['packtype'];
		  $query=$this->db->query('select ID from pack_types where NAME="'.$packtype.'"');
		  $result= $query->row_array();	
		  $ptypeid=$result['ID'];
		  
		  $data = array(
        
          'NAME' => $_POST['p_name'],
		  'P_TYPE_ID' =>$ptypeid,
		  'MSO_ID' =>$mso_id,
		  'OP_ID'  =>$_SESSION['dcn_id'],
		  'CREATED_BY' =>$_POST['createdby'],
		  'SERVICE_TYPE' =>$_POST['service'],
          'MRP' =>$_POST['mrp']
		  );
		  
		 $this->db->insert('packs', $data);
         $id=$this->db->insert_id();
		 $data2=array(
 
			'NAME' =>'@packs_'.$id,
			'COST_PRICE' =>$_POST['COST_PRICE'],
			'SELLING_PRICE' =>$_POST['mrp'],
			'UNIT'  =>1,
			'VISIBLE' =>$_SESSION['dcn_id']

		  );

          if($this->db->insert('products', $data2)){
			  
			$this->session->set_flashdata('add_pack',TRUE);
			return redirect('operator/packages');
			 
	        }	
			else{
				
				$this->session->set_flashdata('add_pack',FALSE);
				return redirect('operator/packages');	
				
				
			}
			
	
		}
		
		
		
	}
	
	
	
}