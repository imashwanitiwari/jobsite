<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Add_area_model extends CI_Model{
	
	public function addarea(){
		
	  if(isset($_POST['area'])){
		 $data = array(
        
          'OP_ID' => $_SESSION['dcn_id'],
           'NAME' => $_POST['areaname'],
		   'TOTAL_HOUSES' => $_POST['thouse'],
		   'REMARK' => $_POST['remark']
          );

          if($this->db->insert('areas', $data)){
			  $this->session->set_flashdata('addarea',TRUE);
			   return redirect('operator/add_area');
		    }	
		 else{
				
			 echo "<h1>SOMETHING IS WRONG</h1>";	
				
				
		    }
		
		
		
		
	    }	
		
		
		
		
		
	}
		
}