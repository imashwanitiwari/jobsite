<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Accounts_model extends CI_Model{

public function get_op_cust_details(){

$query=$this->db->query('select operators.ADDRESS,LOGO,CONCAT(subscribers.FIRST_NAME," ",subscribers.LAST_NAME) as NAME,subscribers.ADDRESS as SUB_ADDRESS from subscribers join operators on operators.ID= subscribers.OP_ID where subscribers.OP_ID='.$_SESSION['dcn_id'].' AND subscribers.ID='.$_POST['SUBSCRIBER_ID']);
$result=$query->row_array();
return $result;

}

}