<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Add_cust_model extends CI_Model{
	

      public function packnames($id){
    
	  $query = $this->db->query('select packs.ID,packs.NAME, packs.MRP from packs where packs.MSO_ID IN(select mso.ID FROM mso WHERE mso.ID IN(SELECT operators_mso.MSO_ID FROM operators_mso WHERE operators_mso.OP_ID='.$_SESSION['dcn_id'].') AND mso.COMP_ID='.$id.')'.' AND OP_ID='.$_SESSION['dcn_id']);	
	  $result= $query->result_array();	
      return $result;	
	}
      public function products(){
	  
	  $query = $this->db->query('select * from products where VISIBLE='.$_SESSION['dcn_id'].' AND NAME NOT LIKE "@%"');	
	  $result= $query->result_array();	
      return $result;


	  }
	
	public function walking_order($id){
    
		$query = $this->db->query('select HOUSE_NO from subscribers where OP_ID=' . $_SESSION['dcn_id'].' '.'AND AREA_ID='.$id);	
		$result= $query->result_array();	
		return $result;	
	  }
	
	public function subscription_no(){
    
		$query = $this->db->query('select MAX(SUBSCRIPTION_NO)+1 as subs_no from subscribers where  OP_ID=' . $_SESSION['dcn_id'] );	
		$result= $query->row_array();	
		return $result;	
	  }

	public function ala_channels($id){

	
	 $this->db->select('channels.NAME,channels.ID,mso_broadcaster_channel.RATE')->from('channels')
	 ->join('broadcaster_channel','broadcaster_channel.CHANNEL_ID=channels.ID')
	 ->join('mso_broadcaster_channel','mso_broadcaster_channel.BROAD_CHA_ID=broadcaster_channel.ID')
	 ->where("mso_broadcaster_channel.MSO_ID IN (select mso.ID FROM mso WHERE mso.ID IN(SELECT operators_mso.MSO_ID FROM operators_mso WHERE operators_mso.OP_ID=".$_SESSION['dcn_id'].") AND mso.COMP_ID='$id')")
	 ;
	 $query = $this->db->get();
	 $result= $query->result_array();	
	 return $result;	
	 
	 
	}
	
	
	public function add_customer(){  
		//print_r($_POST);
		 
         $this->db->trans_start();	
		 // insert data in company_stb table
		 $no_of_box=$_POST['counter2'];
		 

		 for($a=1;$a<=$no_of_box;$a++)
		 {

		 $packs_in_box[]=$_POST['b_'.$a];  //starts from 0 index

		 }

		

		for($j=1;$j<=$no_of_box;$j++)
		{       
				$query[]=$this->db->query('select ID from operators_mso where OP_ID='.$_SESSION['dcn_id'].' '.'AND MSO_ID IN (select ID from mso where COMP_ID='.$_POST['COMP_ID'.$j].')');
				$result[]= $query[$j-1]->row_array();
				
				$data1[]= array(
					'BOX_NO'  => $_POST['BOX_NO'.$j],
					'COMP_ID' =>  $_POST['COMP_ID'.$j],
					'OP_MSO_ID' =>$result[$j-1]['ID'],
					'BOX_TYPE'  => $_POST['BOX_TYPE'.$j],
					'WARRANTY_TYPE' =>  $_POST['WARRANTY_TYPE'.$j]
				);
				
				$this->db->insert('company_stb', $data1[$j-1]); 
				$stb_id[] = $this->db->insert_id(); 
				
		}
		        



		

		  // insert data in company_vc table
		  for($k=1;$k<=$no_of_box;$k++)
		  {
		 
		  $data2[]=array(
			   'VC_NO'  => $_POST['VC_NO'.$k],
			   'COMP_ID' =>  $_POST['COMP_ID'.$k]
			   ) ;
		  
		  $this->db->insert('company_vc', $data2[$k-1]);
		  $vc_id[] = $this->db->insert_id();
		  }
		  
		  
		  // insert data in subscribers table
		

		$data6= array(
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
			'OP_ID' =>$_POST['OP_ID'],
            'USER_NAME' =>$_POST['USER_NAME'],
			'PASSWORD' =>$_POST['PASSWORD'],
			'ACCOUNT_ID'=>0,
			'BILLING_DAY'=>$_POST['BILLING_DAY'],
			'DUE_LIMIT'=>$_POST['BILL_DUES_LIMIT']
			);
		$this->db->insert('subscribers', $data6);  
		$ID5 = $this->db->insert_id();
		  
		 // insert data in mso_op_pairing table
		 for($l=1;$l<=$no_of_box;$l++)
		  {
		 $data3[]= array(
			'OP_ID'=>$_SESSION['dcn_id'],
			'OP_MSO_ID'  => $result[$l-1]['ID'],
			'STB_ID' =>  $stb_id[$l-1],
			'VC_ID' => $vc_id[$l-1],
			'BOX_SUB_ID' =>  $l,
			'SUBSCRIBER_ID'=> $ID5,
			'STATUS' =>  1,
			'CONNECTION_TYPE'=>$_POST['CONNECTION_TYPE']
			
	   );
	   $this->db->insert('mso_op_pairing', $data3[$l-1]);
	   $pair_id[] = $this->db->insert_id();
	}
	   // insert data in box_tracking table
	   for($m=1;$m<=$no_of_box;$m++)
	   {
	   $data4[]= array(
		'PAIRING_ID'  => $pair_id[$m-1] ,
		'STB_ID' =>  $stb_id[$m-1],
		'VC_ID' => $vc_id[$m-1],
		'STATUS' => 1,
		'CHARGE_APPLIED'  => 0,
		'IS_ADJUSTMENT' =>  0,
		
		
       );
	 $this->db->insert('box_tracking', $data4[$m-1]);
	}

	//Start (Amount to be inserted in accounts Table after deducting discount)
	$final_amount_pack=$final_amount_ala=$pack_amount_for_box[0]=$ala_amount_for_box[0]=$pack_disc_amt_for_box[0]=$ala_disc_amt_for_box[0]=$final_amt_pack_disc=$final_amt_ala_disc=0;
	
	
	for($b=1;$b<=$no_of_box;$b++)
	{
		$fnl_amt_pack_ex_disc[$b]=0;
		$fnl_amt_ala_ex_disc[$b]=0;
		 for($d=1;$d<=$packs_in_box[$b-1];$d++)
	   {  

		 if($_POST['TYPE'.$b.$d]==0)
		     {  
		 
		        $fnl_amt_pack_ex_disc[$b]+=(int)$_POST['AMOUNT'.$b.$d];
				if($_POST['DISCOUNT_TYPE'.$b.$d]==0)
				{
			       
				   $final_amount_pack+=((int)$_POST['AMOUNT'.$b.$d]-(int)$_POST['DISC_AMOUNT'.$b.$d]);
		           $final_amt_pack_disc+=(int)$_POST['DISC_AMOUNT'.$b.$d];
				   
				}
		
				elseif ($_POST['DISCOUNT_TYPE'.$b.$d]==1)
				{
		
					$final_amount_pack+=(int)$_POST['AMOUNT'.$b.$d]-((int)$_POST['AMOUNT'.$b.$d]*(int)$_POST['DISC_AMOUNT'.$b.$d])/100;
		            $final_amt_pack_disc+=((int)$_POST['AMOUNT'.$b.$d]*(int)$_POST['DISC_AMOUNT'.$b.$d])/100;
				    
				}
                 

			 }
		 elseif($_POST['TYPE'.$b.$d]==1)
			 {  
			    $fnl_amt_ala_ex_disc[$b]+=(int)$_POST['AMOUNT'.$b.$d];
                if($_POST['DISCOUNT_TYPE'.$b.$d]==0)
				{
			 
				   $final_amount_ala+=((int)$_POST['AMOUNT'.$b.$d]-(int)$_POST['DISC_AMOUNT'.$b.$d]);
				   $final_amt_ala_disc+=(int)$_POST['DISC_AMOUNT'.$b.$d];
		
				}
		
				elseif ($_POST['DISCOUNT_TYPE'.$b.$d]==1)
				{
		
					$final_amount_ala+=(int)$_POST['AMOUNT'.$b.$d]-((int)$_POST['AMOUNT'.$b.$d]*(int)$_POST['DISC_AMOUNT'.$b.$d])/100;
		            $final_amt_ala_disc+=((int)$_POST['AMOUNT'.$b.$d]*(int)$_POST['DISC_AMOUNT'.$b.$d])/100;
				}



			 }
		 
		
		} 
		
		$pack_amount_for_box[$b]=$final_amount_pack-$pack_amount_for_box[$b-1];
		$pack_disc_amt_for_box[$b]=$final_amt_pack_disc-$pack_disc_amt_for_box[$b-1];
        $ala_amount_for_box[$b]=$final_amount_ala-$ala_amount_for_box[$b-1];
        $ala_disc_amt_for_box[$b]=$final_amt_ala_disc-$ala_disc_amt_for_box[$b-1];
	}

	  //*finish (Amount to be inserted in accounts Table after deducting discount)*

	 // insert data in pack_activation table
	 for($e=1;$e<=$no_of_box;$e++){

	 for($f=1;$f<=$packs_in_box[$e-1];$f++)
	 {  
		
		$data5[]= array(
			'PAIRING_ID' =>$pair_id[$e-1],
			'PACK_OR_CHANNEL_ID' =>$_POST['PACK_OR_CHANNEL_ID'.$e.$f],
			'TYPE' =>$_POST['TYPE'.$e.$f],
			'IS_ADJUSTMENT' =>0,
			'AMOUNT'   =>$_POST['AMOUNT'.$e.$f],
			'DISCOUNT_TYPE' =>$_POST['DISCOUNT_TYPE'.$e.$f],
			'DISC_AMOUNT' =>$_POST['DISC_AMOUNT'.$e.$f],
			'BILLING_CYCLE' =>$_POST['BILLING_CYCLE'.$e.$f],
			'ACTIVATION_DATE' =>$_POST['ACTIVATION_DATE'.$e.$f],
			'CLOSING_DATE' =>$_POST['CLOSING_DATE'.$e.$f],
			'AUTO_RENEW' =>$_POST['AUTO_RENEW'.$e.$f]
			
			);


	 }

	}
	   for($x=0;$x<$_POST['counter'];$x++)
	   {
		$this->db->insert('pack_activation', $data5[$x]);
		$id[] = $this->db->insert_id();
	   }
		

		
		$this->db->insert("accouting_ledgers",["NAME"=>"CID_".$ID5,"UNDER"=>29,"VISIBLE"=>$_SESSION['dcn_id']]);
		$ACCOUNT_ID=$this->db->insert_id();
		$this->db->update("subscribers",["ACCOUNT_ID"=>$ACCOUNT_ID],["ID"=>$ID5]);
		 $pac=1;

		 //insert data in subscriber_pairing_packs
		 for($g=1;$g<=$no_of_box;$g++)
		 {  
			$value_for_loop=($pac-1)+($packs_in_box[$g-1]);
			for($h=$pac;$h<=$value_for_loop;$h++){

				$data7[]=array(
   
					'SUBSCRIBER_ID' => $ID5,
					'PAIRING_ID' =>$pair_id[$g-1],
					'PACK_ACT_ID' => $id[$h-1]
	  
				  );
				  $pac=$h+1;

			}
			  
   
	
		 }
		 
		for($i=0;$i<$_POST['counter'];$i++)
	   {
		$this->db->insert('subscriber_pairing_packs', $data7[$i]);
		
	   }

	   //insert data in accounts table and invoice table

	   $query3=$this->db->query('select MAX(INVOICE_NO)+1 as INVOICE_NO from invoice where OP_ID='.$_SESSION['dcn_id']);
		$result3=$query3->row_array();
		
        if($result3['INVOICE_NO']===NULL){

			$result3['INVOICE_NO']=1;

		}
	   for($insert=1;$insert<=$no_of_box;$insert++){

		$query=$this->db->query('select PACK_ACT_ID,pack_activation.PACK_OR_CHANNEL_ID from subscriber_pairing_packs join pack_activation on pack_activation.ID=subscriber_pairing_packs.PACK_ACT_ID join mso_op_pairing on mso_op_pairing.ID=subscriber_pairing_packs.PAIRING_ID where subscriber_pairing_packs.SUBSCRIBER_ID='.$ID5.' and mso_op_pairing.BOX_SUB_ID='.$insert.' and pack_activation.TYPE=0');
		$result=$query->result_array();
		$reference='packs';
		for($aa=0;$aa<sizeof($result);$aa++){


			$reference.='_'.$result[$aa]['PACK_ACT_ID'];
		}
        $data9=array(
			'DR_ID'=>$ACCOUNT_ID,
			'CR_ID'=>3,
			'STAFF_ID'=>0,
			'AREA_ID'=>0,
			'PARTICULAR'=>'TOTAL PACK ACTIVATION CHARGE BOX'.$insert,
			'AMOUNT'=>$fnl_amt_pack_ex_disc[$insert],
			'REFRENCE'=>$reference, 
			'OP_ID'=>$_SESSION['dcn_id']
		);
		$this->db->insert('accounts', $data9);

		
		$pack_disc=array(
		    'DR_ID'=>71,
			'CR_ID'=>$ACCOUNT_ID,
			'STAFF_ID'=>0,
			'AREA_ID'=>0,
			'PARTICULAR'=>'TOTAL PACK DISCOUNT BOX'.$insert,
			'AMOUNT'=>$pack_disc_amt_for_box[$insert],
			'REFRENCE'=>'disc_'.$reference, 
			'OP_ID'=>$_SESSION['dcn_id']
		);
		$this->db->insert('accounts', $pack_disc);
		
		for($inv=0;$inv<sizeof($result);$inv++){
			$q=$this->db->query("select ID from products where NAME='@packs_".$result[$inv]['PACK_OR_CHANNEL_ID']."'");
		    $r=$q->row_array();

			$pack_invoice=array(
				'PRODUCT_ID'=>$r['ID'],
				'QUANTITY' =>1,
				'INVOICE_NO'=>$result3['INVOICE_NO'],
				'OP_ID'=> $_SESSION['dcn_id'],
				'SUBSCRIBER_ID'=> $ID5,
                'REF' => $reference,
                'TYPE'=>1

		);
		$this->db->insert('invoice', $pack_invoice);
		}
		
		$tax_query=$this->db->query('select NAME,RATE,ACCOUNT_ID from tax join accouting_ledgers on accouting_ledgers.ID=tax.ACCOUNT_ID where PRODUCT_ID='.$r['ID'].' AND tax.VISIBLE='.$_SESSION['dcn_id']);
		$tax_query_res=$tax_query->result_array();
		
		if(sizeof($tax_query_res)>0){
			for($tax_pack=0;$tax_pack<sizeof($tax_query_res);$tax_pack++){
				
			$pack_tax_invoice=array(
		
				'PRODUCT_ID'=>$tax_query_res[$tax_pack]['ACCOUNT_ID'],
				'QUANTITY' =>1,
				'INVOICE_NO'=>$result3['INVOICE_NO'],
				'OP_ID'=> $_SESSION['dcn_id'],
				'SUBSCRIBER_ID'=> $ID5,
                'REF' => 'tax'.$reference,
                'TYPE'=>1,
				'RATE'=>$tax_query_res[$tax_pack]['RATE']
		
		
			 );
			 
			$this->db->insert('invoice', $pack_tax_invoice);
			}
		}
		
		$query2=$this->db->query('select PACK_ACT_ID,pack_activation.PACK_OR_CHANNEL_ID from subscriber_pairing_packs join pack_activation on pack_activation.ID=subscriber_pairing_packs.PACK_ACT_ID join mso_op_pairing on mso_op_pairing.ID=subscriber_pairing_packs.PAIRING_ID where subscriber_pairing_packs.SUBSCRIBER_ID='.$ID5.' and mso_op_pairing.BOX_SUB_ID='.$insert.' and pack_activation.TYPE=1');
		$result2=$query2->result_array();
		$reference2='ala';
		if(sizeof($result2)>0){

			for($bb=0;$bb<sizeof($result2);$bb++)
			{
			   $reference2.='_'.$result2[$bb]['PACK_ACT_ID'];
			}

		
		 
		$data10=array(
			'DR_ID'=>$ACCOUNT_ID,
			'CR_ID'=>3,
			'STAFF_ID'=>0,
			'AREA_ID'=>0,
			'PARTICULAR'=>'TOTAL ALA ACTIVATION CHARGE BOX'.$insert,
			'AMOUNT'=>$fnl_amt_ala_ex_disc[$insert],
			'REFRENCE'=>$reference2, 
			'OP_ID'=>$_SESSION['dcn_id']
		);
		$this->db->insert('accounts', $data10);

		$ala_disc=array(
		    'DR_ID'=>3,
			'CR_ID'=>$ACCOUNT_ID,
			'STAFF_ID'=>0,
			'AREA_ID'=>0,
			'PARTICULAR'=>'TOTAL ALA DISCOUNT BOX'.$insert,
			'AMOUNT'=>$ala_disc_amt_for_box[$insert],
			'REFRENCE'=>'disc_'.$reference2, 
			'OP_ID'=>$_SESSION['dcn_id']
		
		
		);
		$this->db->insert('accounts', $ala_disc);

			$ala_invoice=array(
				'PRODUCT_ID'=>3,
				'QUANTITY' =>1,
				'INVOICE_NO'=>$result3['INVOICE_NO'],
				'OP_ID'=> $_SESSION['dcn_id'],
				'SUBSCRIBER_ID'=> $ID5,
                'REF' => $reference2,
                'TYPE'=>1

		);
		$this->db->insert('invoice', $ala_invoice);

        $tax_query2=$this->db->query('select NAME,RATE,ACCOUNT_ID from tax join accouting_ledgers on accouting_ledgers.ID=tax.ACCOUNT_ID where PRODUCT_ID=3 AND tax.VISIBLE='.$_SESSION['dcn_id']);
		$tax_query_res2=$tax_query2->result_array();
		
		if(sizeof($tax_query_res2)>0){
			for($tax_pack2=0;$tax_pack2<sizeof($tax_query_res2);$tax_pack2++){
				
			$ala_tax_invoice=array(
		
				'PRODUCT_ID'=>$tax_query_res2[$tax_pack2]['ACCOUNT_ID'],
				'QUANTITY' =>1,
				'INVOICE_NO'=>$result3['INVOICE_NO'],
				'OP_ID'=> $_SESSION['dcn_id'],
				'SUBSCRIBER_ID'=> $ID5,
                'REF' => 'tax'.$reference2,
                'TYPE'=>1,
				'RATE'=>$tax_query_res[$tax_pack2]['RATE']
		
		
			 );
			 
			$this->db->insert('invoice', $ala_tax_invoice);

	
		}

       }

	
		}


	
	   }

	   for($p_count=0;$p_count<$_POST['NUM_PRODUCT'];$p_count++){
			
		 if(isset($_POST['check'.$p_count])){

           $product_data=array(

			'DR_ID'=>$ACCOUNT_ID,
			'CR_ID'=>10,
			'STAFF_ID'=>0,
			'AREA_ID'=>0,
			'PARTICULAR'=>'Product Purchase Charge',
			'AMOUNT'=>$_POST['tot_price'.$p_count],
			'REFRENCE'=>'self', 
			'OP_ID'=>$_SESSION['dcn_id']


		   );

		   $this->db->insert('accounts', $product_data);

		   $product_invoice=array(

			'PRODUCT_ID'=>$_POST['PRODUCT_ID'.$p_count],
			'QUANTITY' =>$_POST['quantity'.$p_count],
			'INVOICE_NO'=>$result3['INVOICE_NO'],
			'OP_ID'=> $_SESSION['dcn_id'],
			'SUBSCRIBER_ID'=> $ID5,
			'REF' => 'self',
			'TYPE'=>1
           );

		   
		   $this->db->insert('invoice', $product_invoice);
		 }

	   }
 
	   //insert data in payment table
         $data8=array(

			'INVOICE_NO' =>1,
			'SUBSCRIBER_ID' =>$ID5,
			'STAFF_ID' =>1,
			'TYPE' =>'P',
			'AMOUNT' =>-($final_amount_pack+$final_amount_ala),
			'PAYMENT_MODE' =>1,
			'REMARK'   =>"PACK ACTIVATION CHARGE"
		 );

		 $this->db->insert('payments', $data8);  
		 $this->db->trans_complete();

		 $this->session->set_flashdata('user_added', '1');
		 return redirect('operator/add_customer');	
	}

	public function view_customer()
	{
		$query=$this->db->query("SELECT subscribers.*,date(pack_activation.ACTIVATION_DATE) as ACTIVATION_DATE,AMOUNT,packs.NAME, areas.NAME as AREA_NAME from subscribers join areas on areas.ID=subscribers.AREA_ID join subscriber_pairing_packs on subscriber_pairing_packs.SUBSCRIBER_ID=subscribers.ID join pack_activation on pack_activation.ID=subscriber_pairing_packs.PACK_ACT_ID join packs on packs.ID=pack_activation.PACK_OR_CHANNEL_ID where subscribers.ID='".$_GET['SUBSCRIBER_ID']."'");
        return $query->result_array();
	}
	  
	/* public function view_customer()
	{
		$query=$this->db->query("SELECT subscribers.*,areas.NAME as AREA,areas.ID as AREA_ID,company_stb.BOX_NO,companies.NAME,box_warranty.WARRANTY_TYPE,company_vc.VC_NO,packs.NAME as PACK
		,packs.MRP,pack_activation.DISC_AMOUNT
		FROM subscribers JOIN areas on areas.ID=subscribers.AREA_ID 
		join company_stb join company_vc join companies on companies.ID=company_stb.COMP_ID
		join box_warranty on box_warranty.WARRANTY_TYPE=company_stb.WARRANTY_TYPE
		join packs join pack_activation on pack_activation.PACK_OR_CHANNEL_ID=packs.ID
		where company_vc.ID 
		in(select mso_op_pairing.VC_ID from mso_op_pairing 
		where mso_op_pairing.ID IN(SELECT subscriber_pairing_packs.PAIRING_ID from subscriber_pairing_packs)) 
		AND company_stb.ID in(select mso_op_pairing.STB_ID from mso_op_pairing 
		where mso_op_pairing.ID IN(SELECT subscriber_pairing_packs.PAIRING_ID from subscriber_pairing_packs))
		AND pack_activation.ID in(select subscriber_pairing_packs.PACK_ACT_ID from subscriber_pairing_packs where SUBSCRIBER_ID='".$_GET['SUBSCRIBER_ID']."')
		AND subscribers.ID='".$_GET['SUBSCRIBER_ID']."'");		 
				 if($query->num_rows()>0)
				 {
					 return $query->result_array();
				 }
	} */

	public function cust_num_box(){

		$query=$this->db->query("SELECT COUNT(DISTINCT PAIRING_ID) as NUM_BOX FROM subscriber_pairing_packs where SUBSCRIBER_ID=".$_GET['SUBSCRIBER_ID']);
        return $query->row_array();


	}

	public function vc_num_box(){

		$query=$this->db->query("select VC_NO from company_vc where ID in (select VC_ID from mso_op_pairing where ID in (select PAIRING_ID from subscriber_pairing_packs where SUBSCRIBER_ID=".$_GET['SUBSCRIBER_ID'].")) ORDER BY ID ASC");
        return $query->result_array();


	}

	public function no_of_packs_in_box(){

        $query=$this->db->query("SELECT distinct pack_activation.PAIRING_ID,count(distinct PACK_OR_CHANNEL_ID) as NUM_PACK FROM  pack_activation left join subscriber_pairing_packs on pack_activation.PAIRING_ID=subscriber_pairing_packs.PAIRING_ID where subscriber_pairing_packs.SUBSCRIBER_ID=".$_GET['SUBSCRIBER_ID']." "."GROUP by pack_activation.PAIRING_ID ORDER by pack_activation.PAIRING_ID ASC");
        return $query->result_array();
    

	}
	public function packs_and_ala_in_box($box_no,$subscriber){

        $query=$this->db->query("select *,packs.NAME as PA_NAME,channels.NAME as CHA_NAME,companies.NAME as COMP_NAME,companies.ID as COMP_ID from mso_op_pairing LEFT join subscriber_pairing_packs on subscriber_pairing_packs.PAIRING_ID=mso_op_pairing.ID left join company_stb on company_stb.ID=mso_op_pairing.STB_ID left join companies on companies.ID=company_stb.COMP_ID left join company_vc on company_vc.ID=mso_op_pairing.VC_ID LEFT join pack_activation on pack_activation.ID=subscriber_pairing_packs.PACK_ACT_ID left join packs on packs.ID=pack_activation.PACK_OR_CHANNEL_ID left join channels on channels.ID=pack_activation.PACK_OR_CHANNEL_ID where subscriber_pairing_packs.SUBSCRIBER_ID=".$subscriber." "."and BOX_SUB_ID=".$box_no);
        echo json_encode($query->result_array());
    

	}

	public function view_customer_ver2()
	{
		$query=$this->db->query("SELECT subscribers.*,date(pack_activation.ACTIVATION_DATE) as ACTIVATION_DATE,AMOUNT,packs.NAME, areas.NAME as AREA_NAME from subscribers join areas on areas.ID=subscribers.AREA_ID join subscriber_pairing_packs on subscriber_pairing_packs.SUBSCRIBER_ID=subscribers.ID join pack_activation on pack_activation.ID=subscriber_pairing_packs.PACK_ACT_ID join packs on packs.ID=pack_activation.PACK_OR_CHANNEL_ID where subscribers.ID='".$_POST['CUSTOMER_ID']."'");
        return $query->result_array();
	}

	
}