<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Stbox extends CI_Controller {
	
	
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

	 //including add_channel view
	 $this->load->view('admin/stbox');

	 //includin footer
	 $this->load->view('include/admin/footer');
			
    }
    

    //add set top box company

    public function company_stb(){
		//including helper for options
    $this->load->helper('select');
	 //including header file
	 $this->load->view('include/admin/header');

	 //including add_channel view
	 $this->load->view('admin/company_stb');

	 //includin footer
	 $this->load->view('include/admin/footer');
			
    }
    

    //add function to recive and add the broadcaster form

    public function add_boxtype()
    {	//including helper for options
        $this->load->helper('select');
        $this->load->library('form_validation');
        $this->form_validation->set_message('is_unique', 'This %s already exists!');
         if($this->form_validation->run('box_type'))
        {
            //code here
            
            $array=$this->input->post();
            $this->load->model('insert');
            $query=$this->insert->index("box_type",$array);
            if($query)
            {
                $this->load->library('session');
                $this->session->set_flashdata('add_box_type',TRUE);
                return redirect('admin/stbox');
            }
        }
        else 
        {
             //including header file
	 $this->load->view('include/admin/header');

	 //including add_channel view
	 $this->load->view('admin/stbox');

	 //includin footer
	 $this->load->view('include/admin/footer');
			
        }
    }




	public function add_box()
    {	
        //including helper for options
        $this->load->helper('select');
        $this->load->library('form_validation');
        $this->form_validation->set_message('is_unique', 'This %s already exists!');
         if($this->form_validation->run('stbox'))
        {
            //code here
            
            $array=$this->input->post();
            $this->load->model('insert');
            $query=$this->insert->index("company_stb",$array);
            if($query)
            {
                $this->load->library('session');
                $this->session->set_flashdata('add_box',TRUE);
                return redirect('admin/stbox/company_stb');
            }
        }
        else 
        {
			$this->session->set_flashdata('box_validation_fail',TRUE);
             //including header file
	 $this->load->view('include/admin/header');

	 //including add_channel view
	 $this->load->view('admin/company_stb');

	 //includin footer
	 $this->load->view('include/admin/footer');
			
        }
    }











		public function stb_details()
		{
			print_r($_POST);
		}










    //datatables function
  public function datatables()
	{
		$this->load->library('Datatables');
	   $this->datatables->select('companies.ID,companies.NAME as COMPANY,COUNT(company_stb.ID) as TOTAL_BOX')->from('companies')->join('company_stb','companies.ID=company_stb.COMP_ID')->group_by('company_stb.COMP_ID');
	   echo $this->datatables->generate();
	}

}

/* End of file stbox.php */
/* Location: ./application/controller/stbox.php */