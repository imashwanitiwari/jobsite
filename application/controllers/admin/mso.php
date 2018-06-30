<?php if(!defined('BASEPATH')) exit('No direct script access allowed');
/**
 * This class extends all the code for mso CRUD
 */
class Mso extends CI_Controller
    {
        //construct starts
                
        public function __construct(){
            parent::__construct();
            if(!$this->session->has_userdata('dcn_admin_signed_in'))
                {
                    return redirect('admin/login');
                }
        }

            //defining inde method
        // public function index()
        // {
        //     $this->load->helper('select');
        //     $this->load->view('include/admin/header');
        //     $this->load->view('admin/add_mso');
        //     $this->load->view('include/admin/footer');
        // }

            //definign add mso method
            public function add_mso()
            {
                $this->load->library('form_validation');
                $this->form_validation->set_message('is_unique', 'This %s already exists!');
                $this->form_validation->set_message('matches', 'Passwords are not matching!');
                if($this->form_validation->run('mso_form'))
                {
                    //code here
                    unset($_POST['PASSCONF']);
                    $array=$this->input->post();
                    $this->load->model('insert');
                    $query=$this->insert->index("mso",$array);
                    if($query)
                    {
                        $this->load->library('session');
                        $this->session->set_flashdata('add_mso',TRUE);
                        return redirect('admin/mso/add_mso');
                    }
                }
                else 
                {
                    $this->load->helper('select');
                     //including header file
             $this->load->view('include/admin/header');
        
             //including add_channel view
             $this->load->view('admin/add_mso');
        
             //includin footer
             $this->load->view('include/admin/footer');
                    
                }
            }







           
           
           
            public function mso_channel()
            {
                $this->load->helper('select');
                //including header file
                $this->load->view('include/admin/header');
        
                //including add_channel view
                $this->load->view('admin/mso_channel');
        
                //includin footer
                $this->load->view('include/admin/footer');
                  
            }






            public function mso_channel_datatables()
            {
                
                $this->load->library('Datatables');
                $this->datatables->select('mso.ID,mso.FIRM_NAME as MSO,count(mso_broadcaster_channel.ID) as CHANNEL')->from('mso')->join('mso_broadcaster_channel','MSO.ID=mso_broadcaster_channel.MSO_ID','left')->group_by('mso.ID');
                echo $this->datatables->generate();
            }






            public function broadcaster_channel_list_datatable()
            {

                $this->load->helper('select');
                //including header file
        $this->load->view('include/admin/header');
        $_SESSION['mso_channel']=$_POST['MSO_ID'];
                       
        //including add_channel view
        $this->load->view('admin/broadcaster_channel_list');
   
        //includin footer
        $this->load->view('include/admin/footer');
            }











            public function broadcaster_channel_company_list()
            {
                $this->load->helper('select');
                //including header file
                    
                if(isset($_POST['BROADCASTER_ID'])){
                    
                    $_SESSION['broadcaster_channel_company_list']=$_POST['BROADCASTER_ID'];
                }
                
                $this->load->view('include/admin/header');

                //including add_channel view
                $this->load->view('admin/broadcaster_channel_company_list');
        
                //includin footer
                $this->load->view('include/admin/footer');
            }
            








            public function broadcaster_channel_company_list_datatables()
            {

            $BROADCASTER_ID=$_SESSION['broadcaster_channel_company_list'];
            $this->load->library('Datatables');
            $this->datatables->select('channels.NAME,broadcaster_channel.ID,broadcaster_channel.RATE')->from('channels')->join('broadcaster_channel','broadcaster_channel.CHANNEL_ID=channels.ID')->where('broadcaster_channel.ID not IN(select mso_broadcaster_channel.BROAD_CHA_ID from mso_broadcaster_channel WHERE mso_broadcaster_channel.MSO_ID='.$_SESSION['mso_channel'].') AND broadcaster_channel.BROADCASTER_ID="'.$BROADCASTER_ID.'"');
            echo $this->datatables->generate();

            }







            public function mso_broadcaster_channel()
            {
                $array=$this->input->post();
                $this->load->model('insert');
                $this->insert->index('mso_broadcaster_channel',$array);
                return redirect('admin/mso/broadcaster_channel_company_list');
            }









            






    //datatables function
    public function datatables()
	{
		$this->load->library('Datatables');
       $this->datatables->select('broadcaster.ID,broadcaster.FIRM_NAME as BROADCASTER,COUNT(broadcaster_channel.ID) as TOTAL_CHANNEL')
       ->from('broadcaster')->join('broadcaster_channel','broadcaster.ID=broadcaster_channel.BROADCASTER_ID')
       ->where('broadcaster_channel.ID not IN(select mso_broadcaster_channel.BROAD_CHA_ID from mso_broadcaster_channel where MSO_ID='.$_SESSION['mso_channel'].')')
       ->group_by('broadcaster.ID');
	   echo $this->datatables->generate();
	}

}

/* End of file mso.php */
/* Location: ./application/controller/mso.php */

?>