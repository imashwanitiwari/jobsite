<?php
    class Signup extends CI_Controller
        {
            public function index()
                {
                    $this->load->helper('insert');
                    $data['page_title'] = 'DCNTV - SignUp';
                    $this->load->view('signup',$data);
                }
        }
?>