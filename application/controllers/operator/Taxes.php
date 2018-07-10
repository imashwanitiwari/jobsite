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
		$this->tax->get_product($_SESSION['dcn_id']);
	}

	public function get_taxes($product_id,$type){
		$this->load->model('where');
		$product_id=(int)$product_id;
		$type = (int)$type;
		switch ($type) {
			case 1:
				$type="IN";
				break;
			case 2:
				$type = "NOT IN";
				break;
			default:
			$type = "NOT IN";
				break;
		}
		if($this->where->check_where_num("products",["id"=>$product_id]))
		{
			$data = $this->where->select_where("accouting_ledgers","UNDER = 20 AND ID ".$type."(SELECT ACCOUNT_ID FROM tax WHERE PRODUCT_ID IN(".$product_id.") AND STATUS!=0)","ID,NAME");
				foreach((array)$data as $data):
					$response['data'][] = $data;
				endforeach;
					$response['op_id'] = $_SESSION['dcn_id'];
			echo json_encode($response);
		}
		else
		{
			$this->load->library('api');
			echo $this->api->errors(102);
		}
	}
}