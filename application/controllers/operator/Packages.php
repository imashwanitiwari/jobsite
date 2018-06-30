<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Packages extends MY_Controller {
	
	
	public function __construct(){
		
		parent:: __construct();
		$this->load->model('packages_model');
		
	}
	
	public function index(){
	 
	 $data['list_item']=$this->packages_model->dropdown();
     $data['pack_item']=$this->packages_model->pack_item();	 
	 $this->load->view('include/header');
	 $this->load->view('operator/packages',$data);
	 $this->load->view('include/footer');
			
	}
	public function pack_type(){
		
	
	 $this->packages_model->add_pack_type();
		
		
	}
	
	public function add_package(){
		
		
	 $this->packages_model->add_package();	
		
		
	}

	public function  package_list(){
		$this->load->library('datatables');
		$this->datatables->select('packs.ID as PACK_ID,packs.NAME,pack_types.NAME as PACK_TYPE,mso.ID,mso.FIRM_NAME,packs.MRP,CREATED_BY,SERVICE_TYPE')->from('packs')->where_in('packs.OP_ID',$this->session->userdata('dcn_id'))
		->join('pack_types','pack_types.ID=packs.P_TYPE_ID')
		->join('mso','mso.ID=packs.MSO_ID');
		echo $this->datatables->generate();



	}


	public function add_pack_channel(){

		$data['mso_id']=$this->input->post('MSO_ID');
		$data['pack_id']=$this->input->post('PACK_ID');
		/* $query=$this->db->select('ID')->from('packs')->where('MSO_ID=1 AND OP_ID='.$this->session->userdata('dcn_id'))->get();
		$result=$query->result_array();
		print_r($result); */
		//$this->db->select('mso_broadcaster_channel.ID,channels.ID')
		$this->load->view('include/header');
		$this->load->view('operator/pack_channels',$data);
		$this->load->view('include/footer');
  


	}

	 public function mso_channel_list(){
		$id=$this->input->post('ID');
		$id2=$this->input->post('ID2');
		//$query=$this->db->select('CHANNEL_ID')->from('mso_pack_channels')->where('MSO_ID',$id);
		
		$this->load->library('datatables');
		$this->datatables->select('channels.ID as CHA_ID,channels.NAME as CHA_NAME')->from('channels')->where('channels.ID not in(select CHANNEL_ID from mso_pack_channels where MSO_ID='.$id.' '.'AND PACK_ID='.$id2.')')
		->join('broadcaster_channel','broadcaster_channel.CHANNEL_ID=channels.ID')
		->join('mso_broadcaster_channel','mso_broadcaster_channel.BROAD_CHA_ID=broadcaster_channel.ID')
		->where('mso_broadcaster_channel.MSO_ID',$id);

		echo $this->datatables->generate();
      
      

	} 

	public function mso_pack_channel_add(){

		   $text=$this->input->post('TEXT');

		   $data=array(
			'PACK_ID' => $_POST['PACK_ID'],		
			'CHANNEL_ID' => $_POST['CHANNEL_ID'],	
			'MSO_ID' => $_POST['MSO_ID'],
			'OP_ID' => $this->session->userdata('dcn_id')
			);

		   if($text=='ADD')
		   {
				
				$this->db->insert('mso_pack_channels',$data);
				

			}
			
			else if($text=='REMOVE'){

				$this->db->delete('mso_pack_channels',$data); 

			}
     
      
	}

	public function channels_in_packs(){
        $id=$this->input->post('PACK_ID');
		$id2=$this->input->post('MSO_ID');
		$this->load->library('datatables');
		$this->datatables->select('packs.NAME as PACK,channels.NAME as CHANNEL,channels.ID as CHAN_ID')->from('packs')
		->join('mso_pack_channels','mso_pack_channels.PACK_ID=packs.ID')
		->join('channels','channels.ID=mso_pack_channels.CHANNEL_ID')
		->where('mso_pack_channels.MSO_ID='.$id2.' '.'AND mso_pack_channels.OP_ID='.$this->session->userdata('dcn_id').' '.'AND mso_pack_channels.PACK_ID='.$id);
		 
		echo $this->datatables->generate();

	}

	public function mso_pack_channel_remove(){

		$text=$this->input->post('TEXT');

		$data=array(
		 'PACK_ID' => $_POST['PACK_ID'],		
		 'CHANNEL_ID' => $_POST['CHANNEL_ID'],	
		 'MSO_ID' => $_POST['MSO_ID'],
		 'OP_ID' => $this->session->userdata('dcn_id')
		 );

		
		 
		if($text=='REMOVE'){

			 $this->db->delete('mso_pack_channels',$data); 

		 }
  
      
 }

 public function edit_pack(){

	//print_r($_POST);
	$data=array(
                'NAME'=>$_POST['PACK_NAME'],
				'P_TYPE_ID'=>$_POST['P_TYPE_ID'],
				'MSO_ID'=>$_POST['MSO_ID'],
				
				'CREATED_BY'=>$_POST['CREATED_BY'],
				'SERVICE_TYPE'=>$_POST['SERVICE_TYPE'],
				'MRP'=>$_POST['PACK_AMOUNT']
			  );
			  

			  $this->db->where(array('ID'=>$_POST['PACK_I'],'OP_ID'=>$this->session->userdata('dcn_id')));
			  $this->db->update('packs', $data);
			  $this->session->set_flashdata('edit_pack', '1');
			  redirect('/operator/packages');	  



 }
	
	
	
}