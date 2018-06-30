<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Products extends MY_Controller {

    public function index()
    {

     $this->load->view('include/header');
     $this->load->view('operator/products');
     $this->load->view('include/footer');

    }


   public function add_product(){

   $data=array(
          'NAME'=>$_POST['NAME'],
          'UNIT'=>$_POST['UNIT'],
          'COST_PRICE'=>$_POST['COST_PRICE'],
          'SELLING_PRICE'=>$_POST['SELLING_PRICE'],
          'VISIBLE' =>$_SESSION['dcn_id']

   );

   $this->db->insert('products',$data);
   $this->session->set_flashdata('add_product', '1');
   return redirect('operator/products');

   }









}