<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Boxes extends MY_Controller {

public function index(){

$this->load->view('include/header');
$this->load->helper('select');
$this->load->view('operator/boxes');
$this->load->view('include/footer');

}


public function subscriber_boxes(){
$id=$_POST['SUBSCRIBER_ID'];
$this->load->library('datatables');
$this->datatables->select('mso_op_pairing.ID,BOX_NO, BOX_TYPE,VC_NO,mso_op_pairing.STATUS,ACTIVATION_DATE')
->from('subscriber_pairing_packs')
->join('mso_op_pairing ','mso_op_pairing.ID=subscriber_pairing_packs.PAIRING_ID')
->join('pack_activation','pack_activation.PAIRING_ID=subscriber_pairing_packs.PAIRING_ID')
->join('company_stb','company_stb.ID= mso_op_pairing.STB_ID')
->join('company_vc','company_vc.ID=mso_op_pairing.VC_ID')
->where('subscriber_pairing_packs.SUBSCRIBER_ID',$id)
->group_by('BOX_NO');
echo $this->datatables->generate();

}

public function add_box_stock(){
 for($i=1;$i<=$_POST['counter'];$i++){

    $query = $this->db->query('select ID from operators_mso where OP_ID='.$_SESSION['dcn_id'].' '.'AND MSO_ID IN (select ID from mso where COMP_ID='.$_POST['COMP_ID'.$i].')');
    $result = $query->row_array();

    $data=array(
        'VC_NO'  => $_POST['VC_NO'.$i],
        'COMP_ID' =>  $_POST['COMP_ID'.$i]
        ) ;
   
   $this->db->insert('company_vc', $data);
   $vc_id = $this->db->insert_id();
  

   $data2= array(
    'BOX_NO'  => $_POST['BOX_NO'.$i],
    'COMP_ID' =>  $_POST['COMP_ID'.$i],
    'OP_MSO_ID' =>$result['ID'],
    'BOX_TYPE'  => $_POST['BOX_TYPE'.$i],
    'WARRANTY_TYPE' =>  $_POST['WARRANTY_TYPE'.$i]
);

    $this->db->insert('company_stb', $data2); 
    $stb_id = $this->db->insert_id(); 

    $data3= array(
        'OP_ID'=>$_SESSION['dcn_id'],
        'OP_MSO_ID'  => $result['ID'],
        'STB_ID' =>  $stb_id,
        'VC_ID' => $vc_id,
        'BOX_SUB_ID' =>  0,
        'STATUS' =>  0,
        'CONNECTION_TYPE'=>0
        
   );
   $this->db->insert('mso_op_pairing', $data3);

 }
 



}

public function box_tracking(){

         $this->load->library('datatables');
         $this->datatables->select('STATUS,DATE_TIME,BOX_NO,VC_NO')
         ->from('box_tracking')
         ->join('company_stb','company_stb.ID=box_tracking.STB_ID')
         ->join('company_vc','company_vc.ID=box_tracking.VC_ID')
         ->where('box_tracking.PAIRING_ID',$_POST['PAIRING_ID']);

       echo $this->datatables->generate();
}

}