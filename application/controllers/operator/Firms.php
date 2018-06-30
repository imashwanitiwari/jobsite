<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Firms extends MY_Controller {

public function get_firms(){

$lco_id=$_POST['LCO_ID'];
$query=$this->db->query('select ID,FIRM_NAME from operators where LCO_ID='.$lco_id);
$result=$query->result_array();
echo json_encode($result);

}


public function change_session(){
 if(is_array($_SESSION['dcn_id'])){

    $_SESSION['all']=$_SESSION['dcn_id'];

 }
 
 if($_POST['DCN_ID']==0){

    $_SESSION['dcn_id']=$_SESSION['all'];

 }
 else
 $_SESSION['dcn_id']=$_POST['DCN_ID'];

}

}