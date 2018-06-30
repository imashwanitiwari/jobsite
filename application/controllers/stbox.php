<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Stbox extends CI_Controller{
   public function index()
   {
       $this->load->view('live');
   }
   
    public function live()
    {
        $valueToSearch=$_POST['request'];
        $this->load->model('where');
        $result=$this->where->select_where('channels','NAME LIKE "%'.$valueToSearch.'%"','NAME,ID');
        if($result>0)
        {
            $i=0;
            foreach((array)$result as $data):
                $i++;
            echo "<button class='live_button' style='display:block;border:none' id='b".$i."'>".$data['NAME']."</button>";
            ?>
            <script>
                $(document).ready(function(){
                    $("#b<?= $i?>").keydown(function(e){
                        if(e.keyCode==38)
                        {
                            $("#b<?= $i-1?>").focus();
                        }
                        else if(e.keyCode==40)
                        {
                            $("#b<?= $i+1?>").focus();
                        }
                        
                    });
                    $("#b1").keydown(function(e){
                        if(e.keyCode==38)
                        {
                            $(".live_input").focus();
                        }
                        
                    });
                });
            </script>
            <style>
                #b<?= $i?>:focus
                {
                    background:black;
                    color:red;
                }
                #b<?= $i?>
                {
                    background:none;
                    /* color:red; */
                }
            </style>
            <?php
            endforeach;
        }
    }
    public function vc()
    {
        $valueToSearch=$_POST['vc'];
        $this->load->model('where');
        $result=$this->where->select_where('channels','NAME LIKE "'.$valueToSearch.'"','ID');
        if($result>0)
        {
            foreach((array)$result as $data):
            echo $data['ID'];
            endforeach;
        }
    }
}