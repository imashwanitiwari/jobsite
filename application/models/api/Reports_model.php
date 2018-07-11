<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Reports_model extends CI_Model {

    public function due_customers($area,$due_date,$bal_query)
            {
               $query = $this->db->query("SELECT accouting_ledgers.AMOUNT,s.SUBSCRIPTION_NO,s.FIRST_NAME, s.LAST_NAME, s.ADDRESS, s.AREA_ID , a.NAME , vc.VC_NO,
                                        s.BILLING_DAY , s.MOBILE
                                        FROM accouting_ledgers 
                                        JOIN subscribers s on accouting_ledgers.ID = s.ACCOUNT_ID 
                                        JOIN areas a on s.AREA_ID=a.ID
                                        JOIN mso_op_pairing mop on s.ID = mop.SUBSCRIBER_ID
                                        JOIN company_vc vc on mop.VC_ID = vc.ID
                                        WHERE s.AREA_ID 
                                        ".$area." (".$_POST['AREA_ID'].") AND s.BILLING_DAY ".$due_date." ".$_POST['DUE_DATE'].
                                        " AND accouting_ledgers.AMOUNT_TYPE = 1 AND mop.BOX_SUB_ID = 1 AND s.OP_ID = ".$_POST['OP_ID']." AND ".$bal_query);
                if($query->num_rows()>0)
                    {
                        return $query->result_array();
                    }
                    else {
                        return false;
                    }
            }
}