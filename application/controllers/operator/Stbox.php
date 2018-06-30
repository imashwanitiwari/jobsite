<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Stbox extends MY_Controller {

    //index funtion
	
	
	public function index(){
        if(isset($_POST['BOX_NO']))
        {
            $this->load->library('session');
            $this->load->library('form_validation');
            $this->form_validation->set_message('is_unique', 'This %s already exists!');
            if($this->form_validation->run('stbox'))
                {
        
                $this->session->set_flashdata('stbox',TRUE);
            $this->load->model('insert');
            $post_request=$_POST;
            $this->insert->index("company_vc",["VC_NO" => $_POST['VC_NO'],"COMP_ID" => $_POST['COMP_ID']]);
            unset($_POST['VC_NO']);
            $this->insert->index("company_stb",$_POST);
            $this->load->model('where');
            $stb_id=$this->where->select_where("company_stb",["BOX_NO" =>$_POST['BOX_NO']],"ID");
            $vc_id=$this->where->select_where("company_vc",["VC_NO" =>$post_request['VC_NO']],"ID");
            // echo '<pre>';
            // print_r($vc_id);
            $this->insert->index("mso_op_pairing",['OP_MSO_ID' => $_POST['OP_MSO_ID'], "STB_ID" => $stb_id[0]['ID'], "VC_ID"=> $vc_id[0]['ID']]);
                
        }
        }
		//including helper for options
    $this->load->helper('select');
	 //including header file
     $this->load->model('where');
     $data['CHANNEL']=$this->where->select_where('companies',["ID" => $_POST['COMP_ID']],'ID,NAME');
     $data['MSO_OP']=$this->where->select_where('operators_mso ',"MSO_ID IN(select mso.ID from mso where mso.COMP_ID=".$_POST['COMP_ID'].") AND OP_ID='".$_SESSION['dcn_id']."'",' operators_mso.ID');
     $_SESSION['OP_MSO_ID']=$data['MSO_OP'][0]['ID'];
    $this->load->view('include/header');

	 //including add_channel view
	$this->load->view('operator/stbox',$data);
    
	// includin footer
	$this->load->view('include/footer');
			
    }
    

    //add set top box company

    public function company_stb(){
		//including helper for options
    $this->load->helper('select');
	 //including header file
	 $this->load->view('include/header');

	 //including add_channel view
	 $this->load->view('operator/company_stb');

	 //includin footer
	 $this->load->view('include/footer');
			
    }
    
    public function company_stb_datatables(){
        
        $this->load->library('Datatables');
        $this->datatables->select('companies.ID,companies.NAME as COMPANY,COUNT(company_stb.ID) as TOTAL_BOX')
                         ->from('companies')
                         ->join('company_stb','companies.ID=company_stb.COMP_ID','left')
                         ->group_by('companies.ID');
        echo $this->datatables->generate();
			
    }
    

    //add function to recive and add the broadcaster form

    //datatables function
  public function datatables()
	{
		$this->load->library('Datatables');
       $this->datatables->select('company_stb.BOX_NO,company_vc.VC_NO')
                        ->from('mso_op_pairing')
                        ->join('company_stb','company_stb.ID=mso_op_pairing.STB_ID')
                        ->join('company_vc','company_vc.ID=mso_op_pairing.VC_ID')
                        ->where('mso_op_pairing.OP_MSO_ID="'.$_SESSION['OP_MSO_ID'].'"');
	   echo $this->datatables->generate();
	}

}

/* End of file stbox.php */
/* Location: ./application/controller/operator/stbox.php */