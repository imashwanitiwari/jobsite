<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Customers extends MY_Controller {

public function index(){
$this->load->helper('select');
$this->load->view('include/header');
$this->load->view('operator/customers');
$this->load->view('include/footer');

}

            public function show_customers(){

            $this->load->library('datatables');
            $this->datatables->select('subscribers.ID as IDD,SUBSCRIPTION_NO,subscribers.AREA_ID as AREA_ID,subscribers.FIRST_NAME,ACCOUNT_ID,CONCAT_WS(" ",subscribers.FIRST_NAME,subscribers.LAST_NAME) As NAME,subscribers.LAST_NAME,areas.NAME as AREA_NAME,VC_NO,MAX(BOX_SUB_ID) as BOX_SUB_ID,(BILLING_DAY+DUE_LIMIT) as ACTIVATION_DATE,STATUS,SUM(AMOUNT) as AMOUNT')
            ->from('subscribers')->where_in('subscribers.OP_ID',$this->session->userdata('dcn_id'))->group_by('subscribers.ID')
            ->join('areas','areas.ID=subscribers.AREA_ID')
            ->join('subscriber_pairing_packs','subscriber_pairing_packs.SUBSCRIBER_ID=subscribers.ID')
            ->join('mso_op_pairing','mso_op_pairing.ID=subscriber_pairing_packs.PAIRING_ID')
            ->join('pack_activation','pack_activation.ID=subscriber_pairing_packs.PACK_ACT_ID')
            ->join('company_vc','company_vc.ID=mso_op_pairing.VC_ID')
            ->where('subscribers.IS_DELETED',0);


            echo $this->datatables->generate();


            }
			
public function due_customers(){
	
	$this->load->view('include/header');
	$this->load->helper('select');
    $this->load->view('operator/due_customers');
    $this->load->view('include/footer');
}			

public function deleted_customers(){
	
	$this->load->view('include/header');
	$this->load->view('operator/deleted_customers');
    $this->load->view('include/footer');
	
}
public function view_details()
{
    $this->load->helper('select');
    $this->load->model('add_cust_model');
    $data['data']=$this->add_cust_model->view_customer_ver2();
    $this->load->helper('select');
    $this->load->view('include/header');
    $this->load->view('operator/customer_details_ver2',$data);
    $this->load->view('include/footer');
}

            public function edit_customer()
            {
                $this->load->helper('select');
                $this->load->model('add_cust_model');
                $data['data']=$this->add_cust_model->view_customer();
                $data['no_of_boxes']=$this->add_cust_model->cust_num_box();
                $data['no_of_packs']=$this->add_cust_model->no_of_packs_in_box();
                $data['vc_no']=$this->add_cust_model->vc_num_box();
                $this->load->helper('select');
                $this->load->view('include/header');
                $this->load->view('operator/customer_details',$data);
                $this->load->view('include/footer');
            }

public function edit_submit(){
     //print_r($_POST);
    $this->db->trans_start();

$qry_ac=$this->db->query('select ACCOUNT_ID from subscribers where SUBSCRIBER_ID='.$_POST['SUBSCRIBER_ID']);
$res_ac=$qry_ac->row_array();
    $data=array(
    'SUBSCRIPTION_NO' =>$_POST['SUBSCRIPTION_NO'],
    'SEC_SUBS_NO' =>$_POST['SEC_SUBS_NO'],
    'WALKING_ORDER' =>$_POST['WALKING_ORDER'],
    'FIRST_NAME' =>$_POST['FIRST_NAME'],
    'LAST_NAME' =>$_POST['LAST_NAME'],
    'GENDER' =>$_POST['GENDER'],
    'PROFESSION' =>$_POST['PROFESSION'],
    'HOUSE_NO' =>$_POST['HOUSE_NO'],
    'ADDRESS' =>$_POST['ADDRESS'],
    'CITY' =>$_POST['CITY'],
    'STATE' =>$_POST['STATE'],
    'COUNTRY' =>$_POST['COUNTRY'],
    'PINCODE' =>$_POST['PINCODE'],
    'MOBILE' =>$_POST['MOBILE'],
    'ALT_MOBILE' =>$_POST['ALT_MOBILE'],
    'PHONE' =>$_POST['PHONE'],
    'EMAIL' =>$_POST['EMAIL'],
    'PAN' =>$_POST['PAN'],
    'ADHAR' =>$_POST['ADHAR'],
    'GST' =>$_POST['GST'],
    'AREA_ID' =>$_POST['AREA_ID'],
    'OP_ID' =>$_SESSION['dcn_id'],
    'USER_NAME' =>$_POST['USER_NAME'],
    'PASSWORD' =>$_POST['PASSWORD'],
    'ACCOUNT_ID'=>$res_ac['ACCOUNT_ID']

);

$this->db->update('subscribers',$data,array('ID' =>$_POST['SUBSCRIBER_ID']));

    if(isset($_POST['counterr'])&& $_POST['counterr']==0){

    return;

    }
    
    else{
        $loop_box_num=$_POST['counterr'];
    
        for($i=1;$i<=$loop_box_num;$i++){
            
            $PACKS_IN=$_POST['box'.$i];
            $query=$this->db->query('select BOX_NO,OP_MSO_ID from company_stb where ID='.explode("-",$_POST['STB_VC_PAIR'.$i])[0]);
            $result=$query->row_array();

            if($result['BOX_NO']==$_POST['BOX_NO'.$i]){

                $data2=array(

                    'BOX_TYPE'=>$_POST['BOX_TYPE'.$i],
                    'WARRANTY_TYPE'=>$_POST['WARRANTY_TYPE'.$i],
        
                    );

                 $this->db->update('company_stb',$data2,array('ID' =>explode("-",$_POST['STB_VC_PAIR'.$i])[0]));

            }
             
            else
            {
                $data2=array(
                    'BOX_NO' => $_POST['BOX_NO'.$i],
                    'COMP_ID'=> $_POST['COMP_VAL'.$i],
                    'OP_MSO_ID'=> $result['OP_MSO_ID'],
                    'BOX_TYPE'=>$_POST['BOX_TYPE'.$i],
                    'WARRANTY_TYPE'=>$_POST['WARRANTY_TYPE'.$i],
                     
                    );

                $this->db->insert('company_stb',$data2);
                $stb_id=$this->db->insert_id();
            }
            
            $query2=$this->db->query('select VC_NO from company_vc where ID='.explode("-",$_POST['STB_VC_PAIR'.$i])[1]);
            $result2=$query2->row_array();
            
            if($result2['VC_NO']!=$_POST['VC_NO'.$i]){

                $vc_data=array(

                    'VC_NO' => $_POST['VC_NO'.$i],
                    'COMP_ID'=> $_POST['COMP_VAL'.$i]

                );

                $this->db->insert('company_vc',$vc_data);
                $vc_id=$this->db->insert_id();
            }

           if(isset($stb_id)||isset($vc_id)){

            if(isset($stb_id) && isset($vc_id))
            {

              $pairing_data=array(

                 'STB_ID'=>$stb_id,
                 'VC_ID'=> $vc_id
              );
              $this->db->update('mso_op_pairing',$pairing_data,array('ID' =>explode("-",$_POST['STB_VC_PAIR'.$i])[2]));

              $box_tracking=array(

                'PAIRING_ID'  => explode("-",$_POST['STB_VC_PAIR'.$i])[2] ,
                'STB_ID' =>  $stb_id,
                'VC_ID' => $vc_id,
                'STATUS' => 5,
                'CHARGE_APPLIED'  => 0,
                'IS_ADJUSTMENT' =>  0

               );

              $this->db->insert('box_tracking',$box_tracking);

            }
            
            elseif(isset($stb_id))
            {
                $pairing_data=array(

                    'STB_ID'=>$stb_id
                    
                 );
                 $this->db->update('mso_op_pairing',$pairing_data,array('ID' =>explode("-",$_POST['STB_VC_PAIR'.$i])[2]));

                 $box_tracking=array(

                    'PAIRING_ID'  => explode("-",$_POST['STB_VC_PAIR'.$i])[2] ,
                    'STB_ID' =>  $stb_id,
                    'VC_ID' => explode("-",$_POST['STB_VC_PAIR'.$i])[1],
                    'STATUS' => 4,
                    'CHARGE_APPLIED'  => 0,
                    'IS_ADJUSTMENT' =>  0
    
    
                  );
    
                  $this->db->insert('box_tracking',$box_tracking);
            }

            else
            {
                $pairing_data=array(

                    'VC_ID'=>$vc_id
                    
                 );
                 $this->db->update('mso_op_pairing',$pairing_data,array('ID' =>explode("-",$_POST['STB_VC_PAIR'.$i])[2]));

                 $box_tracking=array(

                    'PAIRING_ID'  => explode("-",$_POST['STB_VC_PAIR'.$i])[2] ,
                    'STB_ID' =>  explode("-",$_POST['STB_VC_PAIR'.$i])[0] ,
                    'VC_ID' => $vc_id,
                    'STATUS' => 3,
                    'CHARGE_APPLIED'  => 0,
                    'IS_ADJUSTMENT' =>  0
    
    
                  );
    
                  $this->db->insert('box_tracking',$box_tracking);


            }

           }

            $query3=$this->db->query('select BOX_SUB_ID,STATUS from mso_op_pairing where ID='.explode("-",$_POST['STB_VC_PAIR'.$i])[2]);
            $result3=$query3->row_array();
            if(!isset($stb_id) && !isset($vc_id)){

                if($result3['STATUS']!=$_POST['STATUS'.$i]){

                    $pairing_update=array('STATUS'=>$_POST['STATUS'.$i]);
                    $this->db->update('mso_op_pairing',$pairing_update,array('ID' =>explode("-",$_POST['STB_VC_PAIR'.$i])[2]));
    
                    $box_tracking=array(
    
                        'PAIRING_ID'  => explode("-",$_POST['STB_VC_PAIR'.$i])[2] ,
                        'STB_ID' =>  explode("-",$_POST['STB_VC_PAIR'.$i])[0],
                        'VC_ID' => explode("-",$_POST['STB_VC_PAIR'.$i])[1],
                        'STATUS' => $_POST['STATUS'.$i],
                        'CHARGE_APPLIED'  => 0,
                        'IS_ADJUSTMENT' =>  0
        
        
                      );
        
                      $this->db->insert('box_tracking',$box_tracking);
    
                }


            }
            
            

            for($j=0;$j<$PACKS_IN;$j++)
            {  

                if(!isset($_POST['PACK_OR_CHANNEL_ID'.$i.$j]))
                {
                $data3=array(

                'DISCOUNT_TYPE'=>$_POST['DISCOUNT_TYPE'.$i.$j],
                'DISC_AMOUNT'=>$_POST['DISC_AMOUNT'.$i.$j],
                'BILLING_CYCLE'=>$_POST['BILLING_CYCLE'.$i.$j],
                'ACTIVATION_DATE'=>$_POST['ACTIVATION_DATE'.$i.$j],
                'CLOSING_DATE'=>$_POST['CLOSING_DATE'.$i.$j],
                'AUTO_RENEW'=>$_POST['AUTO_RENEW'.$i.$j],
                );

            $this->db->update('pack_activation',$data3,array('ID' =>$_POST['PAC_ACT_ID'.$i.$j]));

           }
             
           else
           {

            $data3=array(
                
                'PACK_OR_CHANNEL_ID'=>$_POST['PACK_OR_CHANNEL_ID'.$i.$j],
                'AMOUNT'=>$_POST['AMOUNT'.$i.$j],
                'DISCOUNT_TYPE'=>$_POST['DISCOUNT_TYPE'.$i.$j],
                'DISC_AMOUNT'=>$_POST['DISC_AMOUNT'.$i.$j],
                'BILLING_CYCLE'=>$_POST['BILLING_CYCLE'.$i.$j],
                'ACTIVATION_DATE'=>$_POST['ACTIVATION_DATE'.$i.$j],
                'CLOSING_DATE'=>$_POST['CLOSING_DATE'.$i.$j],
                'AUTO_RENEW'=>$_POST['AUTO_RENEW'.$i.$j],
                );

                $this->db->update('pack_activation',$data3,array('ID' =>$_POST['PAC_ACT_ID'.$i.$j]));

            if($_POST['DISCOUNT_TYPE'.$i.$j]==0){
 
                $AMOUNT= (int)$_POST['AMOUNT'.$i.$j]-(int)$_POST['DISC_AMOUNT'.$i.$j];
            }

            else{

                $AMOUNT= (int)$_POST['AMOUNT'.$i.$j]-((int)$_POST['AMOUNT'.$i.$j]*(int)$_POST['DISC_AMOUNT'.$i.$j])/100;

            }
             
        $ac_data=array(

            'DR_ID'=>$res_ac['ACCOUNT_ID'],
			'CR_ID'=>3,
			'STAFF_ID'=>0,
			'AREA_ID'=>0,
			'PARTICULAR'=>'TOTAL PACK ACTIVATION CHARGE BOX'.$result3['BOX_SUB_ID'],
			'AMOUNT'=>$AMOUNT,
			'REFRENCE'=>'packs_'.$_POST['PAC_ACT_ID'.$i.$j], 
			'OP_ID'=>$_SESSION['dcn_id']


              );   
              
            $this->db->insert('accounts', $ac_data);  

        $ac_data2=array(

            'DR_ID'=>66,
			'CR_ID'=>$res_ac['ACCOUNT_ID'],
			'STAFF_ID'=>0,
			'AREA_ID'=>0,
			'PARTICULAR'=>'PACK RETURN',
			'AMOUNT'=>1,
			'REFRENCE'=>'packs_'.$_POST['PAC_ACT_ID'.$i.$j], 
			'OP_ID'=>$_SESSION['dcn_id']

            );

            $qry=$this->db->query('select ID from products where NAME="@packs_'.$_POST['PACK_OR_CHANNEL_ID'.$i.$j].'"');  
            $rslt=$qry->row_array();
            
            $qry2=$this->db->query('select MAX(INVOICE_NO)+1 as INVOICE_NO from invoice where OP_ID='.$_SESSION['dcn_id']);
		    $rslt2=$qry2->row_array();
            
            $inv_data=array(

                'PRODUCT_ID'=>$rslt['ID'],
				'QUANTITY' =>1,
				'INVOICE_NO'=>$rslt2['INVOICE_NO'],
				'OP_ID'=> $_SESSION['dcn_id'],
				'SUBSCRIBER_ID'=>$_POST['SUBSCRIBER_ID'],
                'REF' => 'packs_'.$_POST['PAC_ACT_ID'.$i.$j],
                'TYPE'=>1

                );

            $this->db->insert('invoice',$inv_data);    

           }

            }
        }


    }  
        $this->db->trans_complete();
        echo "customer updated successfuly";

}


            public function packs_and_ala()
            {   
                $box_no=$_POST['box_num'];
                $subscriber=$_POST['SUBSCRIBER_ID'];
                $this->load->model('add_cust_model');
                $this->add_cust_model->packs_and_ala_in_box($box_no,$subscriber);
                //print_r($_POST);


            }

            


public function payments_ajax_hendler()
{
$table=$_POST['table'];
$where=$_POST['where'];
$feild=$_POST['feild'];
$this->load->model('where');
$data=$this->where->select_where($table,$where,$feild);
if($data[0]['TOPAY']<0)
{
    $pre='(BAL)'.$data[0]['TOPAY']*-1;
    $topay=$data[0]['TOPAY']*-1;
}
else
{
    $pre='(ADV)'.$data[0]['TOPAY'];
    $topay=0;
}
echo '{"TOPAY":"'.$topay.'","PRE":"'.$pre.'"}';
}

            public function switch_subcriber_ajax_hendler()
            {
                $sub_id=$_POST['SUBSCRIBER'];
                $table=$_POST['table'];
                $feild=$_POST['feild'];
                $this->load->model('where');
                $subscriber=$this->where->select_where("subscribers","SUBSCRIPTION_NO='".$sub_id."' AND OP_ID='".$_SESSION['dcn_id']."'","FIRST_NAME,LAST_NAME,ID");
                $sub_id=$subscriber[0]['ID'];
                $subscriber=$subscriber[0]['FIRST_NAME'].' '.$subscriber[0]['LAST_NAME'];
                $data=$this->where->select_where($table,"SUBSCRIBER_ID='".$sub_id."'",$feild);
                if($data[0]['TOPAY']<0)
                {
                    $pre='(BAL)'.$data[0]['TOPAY']*-1;
                    $topay=$data[0]['TOPAY']*-1;
                }
                else
                {
                    $pre='(ADV)'.$data[0]['TOPAY'];
                    $topay=0;
                }
                echo '{"TOPAY":"'.$topay.'","PRE":"'.$pre.'","NAME":"'.$subscriber.'","ID":"'.$sub_id.'"}';
            }

public function make_payment_ajax_hendler()
{
    
    $this->load->model('insert');
    $this->insert->index('payments',$_POST);
    $this->load->model('where');
    $subscriber=$this->where->select_where("subscribers","ID='".$_POST['SUBSCRIBER_ID']."'","SUBSCRIPTION_NO");
    $_POST['SUBSCRIBER']=$subscriber[0]['SUBSCRIPTION_NO'];
    $_POST['table']="payments";
    $_POST['feild']="sum(AMOUNT) as TOPAY";
    $this->switch_subcriber_ajax_hendler();    
}
                

            public function add_boxes(){
                $this->load->helper('select');
                $data['cust']=1;
                $this->load->view('include/header',$data);
                $this->load->view('operator/add_boxes');
                $this->load->view('include/footer');
            }


public function add_box(){
        //print_r($_POST);
        $this->db->trans_start();	
    // insert data in company_stb table
    $query=$this->db->query('select ID from operators_mso where OP_ID='.$_SESSION['dcn_id'].' '.'AND MSO_ID IN (select ID from mso where COMP_ID='.$_POST['COMP_ID'].')');
    $result= $query->row_array();
    $data= array(
        'BOX_NO'  => $_POST['BOX_NO'],
        'COMP_ID' =>  $_POST['COMP_ID'],
        'OP_MSO_ID' =>$result['ID'],
        'BOX_TYPE'  => $_POST['BOX_TYPE'],
        'WARRANTY_TYPE' =>  $_POST['WARRANTY_TYPE'],
        'STATUS'     =>1
    );
    $this->db->insert('company_stb', $data); 
    $ID2 = $this->db->insert_id(); 

    // insert data in company_vc table
    $data=$this->input->post(array('VC_NO','COMP_ID'));
    $this->db->insert('company_vc', $data);
    $ID3 = $this->db->insert_id();
    
    // insert data in mso_op_pairing table
    $query=$this->db->query('select BOX_SUB_ID from mso_op_pairing where ID=(select MAX(PAIRING_ID) as ID from subscriber_pairing_packs where SUBSCRIBER_ID='.$_POST['SUBSCRIBER_ID'].')');
    $BOX= $query->row_array();
    $data= array(
    'OP_ID'=>$_SESSION['dcn_id'],
    'OP_MSO_ID'  => $result['ID'],
    'STB_ID' =>  $ID2,
    'VC_ID' => $ID3,
    'BOX_SUB_ID' =>$BOX['BOX_SUB_ID']+1,
    'STATUS' =>  1,
    'CONNECTION_TYPE'=>$_POST['CONNECTION_TYPE']
    
);
$this->db->insert('mso_op_pairing', $data);
$ID4 = $this->db->insert_id();
// insert data in box_tracking table

$data= array(
'PAIRING_ID'  => $ID4 ,
'PAIRING_NO' =>  1,
'CHANGE_STATUS' => 0,
'CHARGE_APPLIED'  => 0,
'IS_ADJUSTMENT' =>  0,


);
$this->db->insert('box_tracking', $data);
    $AMOUNT=0;
for($i=1;$i<=$_POST['counter'];$i++){

$AMOUNT+=$_POST['AMOUNT'.$i];
}
// insert data in pack_activation table
for($i=1;$i<=$_POST['counter'];$i++){
$data[]= array(
'PAIRING_ID' =>$ID4,
'PACK_OR_CHANNEL_ID' =>$_POST['PACK_OR_CHANNEL_ID'.$i],
'TYPE' =>$_POST['TYPE'.$i],
'IS_ADJUSTMENT' =>0,
'AMOUNT'   =>$_POST['AMOUNT'.$i],
'DISCOUNT_TYPE' =>$_POST['DISCOUNT_TYPE'.$i],
'DISC_AMOUNT' =>$_POST['DISC_AMOUNT'.$i],
'BILLING_CYCLE' =>$_POST['BILLING_CYCLE'.$i],
'ACTIVATION_DATE' =>$_POST['ACTIVATION_DATE'.$i],
'CLOSING_DATE' =>$_POST['CLOSING_DATE'.$i],
'AUTO_RENEW' =>$_POST['AUTO_RENEW'.$i]
);
}
for($i=0;$i<$_POST['counter'];$i++)
{
$this->db->insert('pack_activation', $data[$i]);
$id[] = $this->db->insert_id();
}




    //insert data in subscriber_pairing_packs
    for($i=1;$i<=$_POST['counter'];$i++)
    {
    $data2[]=array(

        'SUBSCRIBER_ID' => $_POST['SUBSCRIBER_ID'],
        'PAIRING_ID' =>$ID4,
        'PACK_ACT_ID' => $id[$i-1]

    );

}	
for($i=0;$i<$_POST['counter'];$i++)
{
$this->db->insert('subscriber_pairing_packs', $data2[$i]);

}
    
    $data=array(

    'INVOICE_NO' =>1,
    'SUBSCRIBER_ID' => $_POST['SUBSCRIBER_ID'],
    'STAFF_ID' =>1,
    'TYPE' =>'P',
    'AMOUNT' =>-$AMOUNT,
    'PAYMENT_MODE' =>1,
    'REMARK'   =>"PACK ACTIVATION CHARGE"
    );

    $this->db->insert('payments', $data);  
    $this->db->trans_complete();
    echo "BOX Added Successfully";	

        
    }


      public function money_load(){
        $id=$_POST['SUBSCRIBER_ID'];
        $this->load->library('datatables');
        $this->datatables->select('DR_ID,DATE,AMOUNT as MONEY,staff.F_NAME')
        ->from('accounts')
        ->join('staff','staff.ID=accounts.STAFF_ID')
        ->where('CR_ID=(select ID from accouting_ledgers where NAME="CID_'.$id.'") AND DR_ID IN(SELECT ID FROM accouting_ledgers WHERE UNDER IN (SELECT ID FROM accounting_groups where NATURE = "Assets")) ');
        echo $this->datatables->generate();
      }      

      



      public function payment_card(){
        $id=$_POST['SUBSCRIBER_ID'];
        $this->load->library('datatables');
        $this->datatables->select('DR_ID,MONTHNAME(DATE) as MONTH,YEAR(DATE) as YEAR ,DATE ,AMOUNT as MONEY,staff.F_NAME')
        ->from('accounts')
        ->join('staff','staff.ID=accounts.STAFF_ID')
        ->where('CR_ID=(select ID from accouting_ledgers where NAME="CID_'.$id.'") AND DR_ID IN(SELECT ID FROM accouting_ledgers WHERE UNDER IN (SELECT ID FROM accounting_groups where NATURE = "Assets")) GROUP BY MONTH(DATE) ');
        echo $this->datatables->generate();

      }
}