<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Customers extends CI_Controller {
    
	/*function _remap($id) {
        $this->index($id);
    }*/
	
	
	public function dcnget($table,$id)
	{
		$this->load->model('Customers_model');
		$data['students']=$this->Customers_model->getdata($table,$id);
		echo json_encode($data);
	}
	
	
	public function dcngetall($table)
	{
		$this->load->model('Customers_model');
		$data['students']=$this->Customers_model->getalldata($table);
		echo json_encode($data);
	}
	
	public function poststudent()
	{
		
		
		$this->load->view('updatestudent');
		if(isset($_POST['submit'])){
		echo $_POST['name'];
		echo "<br>";
		echo $_POST['city'];
		echo "<br>";
		echo $_POST['course'];
		echo "<br>";
		echo $_POST['rollno'];
		
		}
	}
}
