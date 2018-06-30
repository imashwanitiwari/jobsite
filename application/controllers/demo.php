<?php
class Demo extends CI_Controller
    {
        function index(){
            $this->load->helper('insert');
           
           echo select_demo("bilty","grno='1' or grno='2'","contain_1");
           
        }
    }
?>