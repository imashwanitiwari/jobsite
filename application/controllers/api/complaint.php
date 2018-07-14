<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Complaint extends CI_Controller
{
        public function __construct()
        {
            parent::__construct();
            $this->load->library('api');
            $this->load->model('insert');
            $this->load->model('where');
        }
        public function get_complaint_status() //authenticating
        {
            if($this->api->authentication())
                {
                    if(isset($_POST['OP_ID'], $_POST['COMPLAINT_NO']))//validateing all reqiured feild either recived or not
                    {
                        if($this->where->check_where("complaints",["COMP_NO"=>$_POST['COMPLAINT_NO'], "OP_ID"=>$_POST['OP_ID']]))
                        {
                            $data = $this->where->select_where("complaints",["COMP_NO"=>$_POST['COMPLAINT_NO']],"*");
                            if($data[0]['RESOLVE_DATE']!="")
                            {
                                $status="CLOSED";
                            }
                            else
                            {
                                $status="IN REVIEW";
                            }
                            $issue = explode('-',$data[0]['ISSUE']);
                            $ISSUE_ID=$issue[0];
                            $issue=$this->where->select_where("issue",["ID"=>$ISSUE_ID],"NAME");
                            $issue = $issue[0]['NAME'];
                            $SUB_ISSUE_ID=$issue[1];
                            $sub_issue=$this->where->select_where("issue_sub",["ID"=>$ISSUE_ID],"NAME");
                            $sub_issue = $sub_issue[0]['NAME'];
                            
                            $response = array("status"=>1,"response"=>array("ISSUE"=>$issue,"ISSUE_ID"=>$ISSUE_ID,"SUB_ISSUE"=>$sub_issue,"SUB_ISSUE_ID"=>$SUB_ISSUE_ID,"PROBLEM"=>$data[0]['PROBLEM'],"REG_DATE"=>$data[0]['REG_DATE'],
                                         "VICTIM_ID"=>$data[0]['VICTIM_ID'], "PRIORITY"=>$data[0]['PRIORITY'],"TITLE"=>$data[0]['TITLE'],
                                                                            "COMPLAINT_STATUS"=>$status,"RESOLVE_DETAILS"=>$data[0]['RESOLVE_DETAILS'],"RESOLVE_DATE"=>$data[0]['RESOLVE_DATE']),"errors"=>array("count"=>0,null));
                                            echo json_encode($response);
                        }
                        else
                        {
                            echo $this->api->errors(102);
                        }
                    }
                    else
                    {
                        echo $this->api->errors(101);
                    }
                }
            else
                {
                    echo $this->api->errors(100);
                }
        }
        
        public function get_all_complaint() //authenticating
        {
            if($this->api->authentication())
                {
                    if(isset($_POST['OP_ID'], $_POST['START_LIMIT'], $_POST['END_LIMIT']))//validating all reqiured feild either recived or not
                    {
                        
                        $data = $this->db->query("SELECT * FROM  complaints join subscribers on subscribers.ID=complaints.VICTIM_ID WHERE complaints.OP_ID ='".$_POST['OP_ID']."' LIMIT ".$_POST['START_LIMIT'].",".$_POST['END_LIMIT']);
                        $count = $data->num_rows();
                        if($count>0)
                        {
                                
                            $data = $data->result_array();
                            $response = array("status"=>"1","errors"=>array("count"=>0,null),"response"=>array("count"=>$count));
                            foreach($data as $data):
                                $issue = explode('-',$data['ISSUE']);
                                $ISSUE_ID=$issue[0];
                                $SUB_ISSUE_ID=$issue[1];
                                $response['data'][] = array("ID"=>$data['ID'],"COMP_NO"=>$data['COMP_NO'],"PROBLEM"=>$data['PROBLEM'],"REG_DATE"=>$data['REG_DATE'],
                                                                            "VICTIM_ID"=>$data['VICTIM_ID'], "VICTIM_NAME"=>$data['FIRST_NAME'],"PRIORITY"=>$data['PRIORITY'],"TITLE"=>$data['TITLE'],"ISSUE_ID"=>$ISSUE_ID,"SUB_ISSUE_ID"=>$SUB_ISSUE_ID,
                                                                            "RESOLVE_DETAILS"=>$data['RESOLVE_DETAILS'],"RESOLVE_DATE"=>$data['RESOLVE_DATE']);
                            endforeach;
                            echo json_encode($response);
                        }
                        else
                        {
                            echo $this->api->errors(102);
                        }
                    }
                    else
                    {
                        echo $this->api->errors(101);
                    }
                }
            else
                {
                    echo $this->api->errors(100);
                }
        }
        
        
        public function register_complaint()
        {
            if($this->api->authentication()) //authenticating
                {
                    if(isset($_POST['OP_ID'], $_POST['ISSUE_ID'], $_POST['SUB_ISSUE_ID'], $_POST['PROBLEM'], $_POST['REG_DATE'], $_POST['VICTIM_ID'], $_POST['PRIORITY'],$_POST['TITLE'] )) //validateing all reqiured feild either recived or not
                    {
                        if($this->where->check_where("issue",["ID"=>$_POST['ISSUE_ID']]))//validate issue
                        {
                            if($this->where->check_where("issue_sub",["ID"=>$_POST['SUB_ISSUE_ID'],"ISSUE_ID"=>$_POST['ISSUE_ID']]))//validating sub isuue
                            {
                               if($this->where->check_where("subscribers",["ID"=>$_POST['VICTIM_ID'],"OP_ID"=>$_POST['OP_ID']]))//validating sunscriber OP relation
                               {     
                                    if(sizeof($_POST)<10)//blocking extra feilds
                                    {
                                        
                                        $_POST['ISSUE']=$_POST['ISSUE_ID'].'-'.$_POST['SUB_ISSUE_ID'];
                                        $id=$this->where->select_where("complaints","ID!=0","MAX(ID) AS ID");
                                        $id=$id[0]['ID']+1;
                                        $_POST['COMP_NO']=date('Ymd').$id;
                                        unset($_POST['api_key'], $_POST['ISSUE_ID'], $_POST['SUB_ISSUE_ID']);
                                        $id = $this->insert->index("complaints",$_POST);
                                        $response = array("status"=>1,"response"=>array("ENTRY_ID"=>$id,"COMPLAINT_NO"=>$_POST['COMP_NO']),"errors"=>array("count"=>0,null));
                                            echo json_encode($response);
                                    }
                                    else
                                    {
                                        echo $this->api->errors(103);
                                    }
                                }
                                else
                                {
                                   echo $this->api->errors(302);
                                }
                            }
                            else
                            {
                                echo $this->api->errors(301);
                            }
                        }
                        else
                        {
                           echo $this->api->errors(300);
                            
                        }
                    }
                    else
                    {
                       echo $this->api->errors(101);
                    }
                }
            else
                {
                    echo $this->api->errors(100);
                }
        }



        public function update_complaint()
        {
            if($this->api->authentication()) //authenticating
                {
                    if(isset( $_POST['COMP_NO'], $_POST['SUB_ISSUE_ID'],$_POST['ISSUE_ID'], $_POST['PROBLEM'], $_POST['PRIORITY'],$_POST['TITLE'] )) //validateing all reqiured feild either recived or not
                    {
                        if($this->where->check_where("issue",["ID"=>$_POST['ISSUE_ID']]))//validate issue
                        {
                            if($this->where->check_where("issue_sub",["ID"=>$_POST['SUB_ISSUE_ID'],"ISSUE_ID"=>$_POST['ISSUE_ID']]))//validating sub isuue
                            {
                                   
                                    if(sizeof($_POST)<8)//blocking extra feilds
                                    {
                                        
                                        $_POST['ISSUE']=$_POST['ISSUE_ID'].'-'.$_POST['SUB_ISSUE_ID'];
                                        unset($_POST['api_key'], $_POST['ISSUE_ID'], $_POST['SUB_ISSUE_ID']);
                                        $update = $this->where->update_where("complaints",["COMP_NO"=>$_POST['COMP_NO']],$_POST);
                                        $response = array("status"=>1,"response"=>array(),"errors"=>array("count"=>0,null));
                                            echo json_encode($response);
                                    }
                                    else
                                    {
                                        echo $this->api->errors(103);
                                    }
                              
                            }
                            else
                            {
                                echo $this->api->errors(301);
                            }
                        }
                        else
                        {
                           echo $this->api->errors(300);
                            
                        }
                    }
                    else
                    {
                       echo $this->api->errors(101);
                    }
                }
            else
                {
                    echo $this->api->errors(100);
                }
        }


}