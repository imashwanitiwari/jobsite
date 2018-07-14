<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Recent_activity extends MY_Controller {
    
    public function index()
    {
        $this->load->view('include/header');
        $this->load->view('operator/recent_activity');
        $this->load->view('include/footer');
    }
}