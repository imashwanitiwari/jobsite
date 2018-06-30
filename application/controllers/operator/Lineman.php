<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Lineman extends MY_Controller {


    public function index(){

             $this->load->view('include/header');
             $this->load->helper('select');
             $this->load->view('operator/lineman');
             $this->load->view('include/footer');

    }

}