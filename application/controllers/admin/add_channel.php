<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Add_channel extends CI_Controller {
	
	
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
	 $this->load->view('admin/add_channel');

	 //includin footer
	 $this->load->view('include/admin/footer');
			
	}





	//add channel company function help to add new channel company



	public function add_channel_company()
	{
		//cearting array of all post values
		$array=$this->input->post();


		$this->load->library('form_validation');
		$this->form_validation->set_message('is_unique', 'This %s already exists!');
		if($this->form_validation->run('channel_company'))
		{
		//loading insertion model
		$this->load->model('insert');

		//calling inserting function to insert data
		$query=$this->insert->index('channel_companies',$array);


		if($query==TRUE)
		{

			//if inserted successfuly
			$this->session->set_flashdata('add_channel_company',TRUE);
			return redirect('admin/add_channel');
		}
		else
		{
			//if not inserted
			echo "This Channel Can't Be Create	";
		}
		}
		else
		{
			$this->session->set_flashdata('company_validation_fail',TRUE);
		
			$this->load->helper('select');

			//including header file
			$this->load->view('include/admin/header');
	   
			//including add_channel view
			$this->load->view('admin/add_channel');
	   
			//includin footer
			$this->load->view('include/admin/footer');
		}
	}
	
	




	//add channel type help to add new channel type


	public function add_channel_type()
	{

			//cearting array of all post values
			$array=$this->input->post();

		//checking form validations

		$this->load->library('form_validation');
		$this->form_validation->set_message('is_unique', 'This %s already exists!');
		if($this->form_validation->run('channel_type'))
		{
		
		
			//loading insertion model
			$this->load->model('insert');
	
		
			//calling inserting function to insert data
			$query=$this->insert->index('channel_types',$array);
	
	
			if($query)
			{
	
				//if inserted successfuly
				$this->session->set_flashdata('add_channel_type',TRUE);
				return redirect('admin/add_channel');
			}
			else
			{
				//if not inserted
				return redirect('admin/add_channel');
			}
		}
		else
		{
			$this->session->set_flashdata('company_type_validation_fail',TRUE);
			$this->load->helper('select');

			//including header file
			$this->load->view('include/admin/header');
	   
			//including add_channel view
			$this->load->view('admin/add_channel');
	   
			//includin footer
			$this->load->view('include/admin/footer');
		}

	}


		//add channel type help to add new channel category


	public function add_channel_category()

		

	{

		//cearting array of all post values
		$array=$this->input->post();

		//loading insertion model
		$this->load->model('insert');

		//calling inserting function to insert data
		$query=$this->insert->index('channel_categories',$array);


		if($query==TRUE)
		{

			//if inserted successfuly
			$this->session->set_flashdata('add_channel_category',TRUE);
			return redirect('admin/add_channel');
		}
		else
		{
			//if not inserted
			echo "This Channel Category Can't Be Create	";
		}

}




	//add channel type help to add new channel


	public function add_new_channel()


	{

		//cearting array of all post values
		$array=$this->input->post();

		//loading insertion model
		$this->load->model('insert');

		//calling inserting function to insert data
		$query=$this->insert->index('channels',$array);


		if($query==TRUE)
		{

			//if inserted successfuly
			$this->session->set_flashdata('add_new_channel',TRUE);
			return redirect('admin/add_channel');
		}
		else
		{
			//if not inserted
			echo "This Channel Can't Be Create	";
		}

}



		public function channel_list()
		{
			$this->load->view('include/admin/header');
	   
			//including add_channel view
			$this->load->view('admin/channel_list');
	   
			//includin footer
			$this->load->view('include/admin/footer');
		}



		public function channel_list_datatables()
		{
			$this->load->library('Datatables');
			$this->datatables->select('channels.NAME as CHANNEL,channel_types.NAME as CHANNEL_TYPE,channel_companies.NAME as CHANNEL_COMPANY, channel_categories.NAME as CHANNEL_CATEGORY')->from('channels')
			->join('channel_types','channel_types.ID=channels.CH_TYPE_ID')
			->join('channel_companies','channel_companies.ID=channels.CH_COMP_ID') 
			->join('channel_categories','channel_categories.ID=channels.CAT_ID') ;
			echo $this->datatables->generate();
		}
}

/* End of file add_channel.php */
/* Location: ./application/controller/admin/add_channel.php */