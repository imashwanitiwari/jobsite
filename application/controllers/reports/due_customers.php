<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Due_customers extends MY_Controller {

  /* Index function For loading Veiw */
    public function index()
        {
            $this->load->helper('select');
            $this->load->view('include/header');
            $this->load->view('reports/due_cust');
            $this->load->view('include/footer');
        }
    public function ajax_hendler()
    {
            $this->load->model('select')
            $this->select->query();
    }

}
	

/* End of file due_customers.php */
/* Location: ./application/controller/reports/due_cutomers.php */
