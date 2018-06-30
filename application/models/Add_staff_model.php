<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Add_staff_model extends CI_Model{

public function add_staff(){

    $query=$this->db->select('ID')->where('NAME',$this->input->post('TYPE'))->get('staff_types');
    $type=$query->result();

    $data=array(
    'F_NAME'=>$this->input->post('F_NAME'),
    'L_NAME'=>$this->input->post('L_NAME'),
    'ADDRESS'=>$this->input->post('ADDRESS'),
    'EMAIL'=>$this->input->post('EMAIL'),
    'ADHAR'=>$this->input->post('ADHAR'),
    'PAN'=>$this->input->post('PAN'),
    'GST'=>$this->input->post('GST'),
    'USER_NAME'=>$this->input->post('USER_NAME'),
    'PASSWORD'=>$this->input->post('PASSWORD'),
    'TYPE'=>$type[0]->ID,
    'OP_ID' =>$this->session->userdata('dcn_id')
    );

    $this->db->insert('staff',$data);
    $id=$this->db->insert_id();
    
    for($i=0;$i<sizeof($_POST['AREA_ID']);$i++){
        $data=array(
            'AREA_ID'=>$this->input->post('AREA_ID')[$i],
            'STAFF_ID'=>$id
           );
           $this->db->insert('area_staff',$data);

    }
    

    $this->session->set_flashdata('msg',TRUE);
    return redirect('operator/addStaff');
}

public function add_staff_type()
{
// $this->load->model('insert');

$data=array(
    'NAME'=>$this->input->post('NAME'),
    'OP_ID' =>$this->session->userdata('dcn_id')
    );

   // $this->insert->index('staff_types',$data);
    $this->db->insert('staff_types',$data);
    
    $this->session->set_flashdata('add_staff_type', TRUE);
    return redirect('operator/addStaff');

}



}


