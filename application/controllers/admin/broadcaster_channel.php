<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Broadcaster_channel extends CI_Controller {
	
	
	public function __construct(){
		parent::__construct();
		if(!$this->session->has_userdata('dcn_admin_signed_in'))
			{
				return redirect('admin/login');
			}
    }
	
	
	//index funtion
    public function index(){
		//including helper for options
        $this->load->helper('select');
	 //including header file
	 $this->load->view('include/admin/header');

	 //including broadcaster_channel view
      $this->load->view('admin/broadcaster_channel');


	 //includin footer
	 $this->load->view('include/admin/footer');
			
    }
    public function view()
    {
        $array=$this->input->post();
        if(isset($_POST['ID']))
        {
            $this->load->model('where');
            $data['broadcaster']= $this->where->select_where("broadcaster",$array,"*");
            $id=$data['broadcaster'][0]['ID'];
            $data['channel']= $this->where->select_where("channels","ID IN(select CHANNEL_ID from broadcaster_channel where BROADCASTER_ID=".$id.")","*");
            // $channel_id=$data['channel'][0]['ID'];
            // $data['broadcaster_channel']= $this->where->select_where("broadcaster_channel",['BROADCASTER_ID'=>$id, 'CHANNEL_ID'=>$channel_id],"*");
            //including helper for options
            $this->load->helper('select');
            //including header file
            $this->load->view('include/admin/header');

            //including broadcaster_channel view
            $this->load->view('admin/broadcaster_channel_view',$data);
                    
                    // print_r($data);
                //includin footer
            $this->load->view('include/admin/footer');
        }
        else return redirect('admin/broadcaster_channel');
                
    }

    public function add_channel()
    {
            $array=$this->input->post();
            $this->load->model('insert');
            $this->insert->index('broadcaster_channel',$array);
            $array='ID='.$_POST['BROADCASTER_ID'];
            $this->load->model('where');
            $data['broadcaster']= $this->where->select_where("broadcaster",$array,"*");
            $id=$data['broadcaster'][0]['ID'];
            $data['channel']= $this->where->select_where("channels","ID IN(select CHANNEL_ID from broadcaster_channel where BROADCASTER_ID=".$id.")","*");
            // $channel_id=$data['channel'][0]['ID'];
            // $data['broadcaster_channel']= $this->where->select_where("broadcaster_channel",['BROADCASTER_ID'=>$id, 'CHANNEL_ID'=>$channel_id],"*");
            //including helper for options
            $this->load->helper('select');
            //including header file
            $this->load->view('include/admin/header');

            //including broadcaster_channel view
            $this->load->view('admin/broadcaster_channel_view',$data);

                    // print_r($data['broadcaster_channel']);
                //includin footer
            $this->load->view('include/admin/footer');
        }
    }



	

