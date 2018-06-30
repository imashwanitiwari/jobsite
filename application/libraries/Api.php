<?php if(!defined('BASEPATH')) exit('No direct script access allowed');
  class api
  {
      public $ci;
    public function __construct()
    {
        $this->ci = & get_instance();
    }
    public function authentication()
    {
        if(isset($_POST['api_key']))
        {
            $api_key = $_POST['api_key'];
            if($api_key=="1234")
            {
                return true;
            }
            else 
            {
                return false;
            }
        }
        else 
        {
            return false;
        }
    }

    public function errors($code)
    {
        if($code == 100)
            {
                $response=array("status"=>0,"errors"=>array("count"=>1,100));// 100 means authentication feild
                 return json_encode($response);
            }
        
        if($code == 101)
            {
                $response = array("status"=>0,"errors"=>array("count"=>1,101));//101 means sum mendotry feilds not recicved
                return json_encode($response);
            }
        
        if($code == 102)
            {
                $response=array("status"=>0,"errors"=>array("count"=>1,102));//102 means no data found or you does not belong to see this data
                return json_encode($response);
            }
        if($code == 103)
        {
            $response=array("status"=>0,"errors"=>array("count"=>1,103));//103 means sum extra feild has been sent
            return json_encode($response);
        }
        if($code == 104)
        {
            $response=array("status"=>0,"errors"=>array("count"=>1,104));//104 means data not inserted
            return json_encode($response);
        }
        if($code == 105)
        {
            $response=array("status"=>0,"errors"=>array("count"=>1,105));//105 means invalid datatype or some vaues in negative
            return json_encode($response);
        }
        if($code == 300)
        {
            $response=array("status"=>0,"errors"=>array("count"=>1,301));//301 means invalid issue_id
            return json_encode($response);
        }
        if($code == 301)
        {
            $response=array("status"=>0,"errors"=>array("count"=>1,301));//302 means invalid sub_issue_id
            return json_encode($response);
        }
        if($code == 302)
        {
            $response=array("status"=>0,"errors"=>array("count"=>1,302));//302 VICTIM NOT BELONG YOU OR INVALID VICTIM ID
            return json_encode($response);
        }
    }

  }
 