<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Taxes extends MY_Controller {

	public function index()
	{

		$this->load->view('include/header');
		$this->load->view('operator/taxes');
		$this->load->view('include/footer');
	}

	public function add_tax(){

		$this->load->view('include/header');
		$this->load->view('operator/add_tax');
		$this->load->view('include/footer');

	}

	public function get_products(){
		// $this->load->library('Datatables');
		//    $this->datatables->select('NAME')->from('products');
		//    echo $this->datatables->generate();
		$this->load->model('tax');
		$this->tax->get_product();
	}

	public function get_taxes(){
		$this->load->model('where');
		$data = $this->where->select_where("accouting_ledgers",["UNDER"=>20],"NAME");
			foreach($data as $data):
				$response['data'][] = $data;
			endforeach;
			echo json_encode($response);
		
	}
}