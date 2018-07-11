<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Customers_model extends CI_Model {

    public function deleted_customers($op_id)
            {
               $query = $this->db->query("SELECT s.SUBSCRIPTION_NO,s.FIRST_NAME, s.LAST_NAME, s.ADDRESS, s.AREA_ID , a.NAME , vc.VC_NO,
                                        s.BILLING_DAY , s.MOBILE, cs.BOX_NO
                                        FROM subscribers s
                                        JOIN areas a on s.AREA_ID=a.ID
                                        JOIN mso_op_pairing mop on s.ID = mop.SUBSCRIBER_ID AND mop.BOX_SUB_ID = 1 
                                        JOIN company_vc vc on mop.VC_ID = vc.ID
                                        JOIN company_stb cs on mop.STB_ID = cs.ID
                                        WHERE s.OP_ID = ".(int)$op_id." AND s.IS_DELETED = 1");
                if($query->num_rows()>0)
                    {
                        return $query->result_array();
                    }
                    else {
                        return false;
                    }
            }
}