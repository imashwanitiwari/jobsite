<?php
    function option_where($table,$where,$feild)
    {
        $CI =& get_instance();
        $q=$CI->db->where($where)
                    ->select($feild)
                    ->get($table);
                    if($q->num_rows()>=1)
                    {
                        // return TRUE;
                       $data= $q->result_array();
                       
                       foreach($data as $gr):
                            echo '<option value="'.$gr[$feild].'">'.$gr[$feild].'</option>';
            
                        endforeach;
                      
                    }
                    
    }

    function option_no_where($table,$feild)
    {
        $CI =& get_instance();
        $q=$CI->db ->select($feild)
                    ->get($table);
                    if($q->num_rows()>=1)
                    {
                        // return TRUE;
                       $data= $q->result_array();
                       
                       foreach($data as $gr):
                            echo '<option value="'.$gr[$feild].'">'.$gr[$feild].'</option>';
            
                        endforeach;
                      
                    }
                    
    }

    function option($table,$where,$feild)
    {
        $CI =& get_instance();
        $q=$CI->db->query("SELECT $feild FROM $table WHERE $where");

                    if($q->num_rows()>=1)
                    {
                        // return TRUE;
                       $data= $q->result_array();
                       
                       foreach($data as $gr):
                            return '<option value="'.$gr[$feild].'">'.$gr[$feild].'</option>';
            
                        endforeach;
                      
                    }
                    
    }
    function option_dif($table,$f1,$f2)
    {
        
        $CI =& get_instance();
        $CI->db->select(array($f1,$f2));
        $q=$CI->db->get($table);
                    if($q->num_rows()>=1)
                    {
                        // return TRUE;
                       $data= $q->result_array();
                       
                       foreach($data as $option):
                            echo '<option value="'.$option[$f1].'">'.$option[$f2].'</option>';
            
                        endforeach;
        
                    }
    }

    function option_dif_where($table,$where,$f1,$f2)
    {
        
        $CI =& get_instance();
        $q=$CI->db->select(array($f1,$f2))
                    ->where($where)
                    ->get($table);
                    if($q->num_rows()>=1)
                    {
                        // return TRUE;
                       $data= $q->result_array();
                       
                       foreach($data as $option):
                            echo '<option value="'.$option[$f1].'">'.$option[$f2].'</option>';
            
                        endforeach;
        
                    }
    }


    function option_dif_in_where($table,$where,$f1,$f2)
    {
        
        $CI =& get_instance();
        $q=$CI->db->select(array($f1,$f2))
                    ->where_in($where)
                    ->get($table);
                    if($q->num_rows()>=1)
                    {
                        // return TRUE;
                       $data= $q->result_array();
                       
                       foreach($data as $option):
                            echo '<option value="'.$option[$f1].'">'.$option[$f2].'</option>';
            
                        endforeach;
        
                    }
    }

    function option_dif_no_where($table,$f1,$f2)
    {
        
        $CI =& get_instance();
        $q=$CI->db->select(array($f1,$f2))
                  ->get($table);
                    if($q->num_rows()>=1)
                    {
                        // return TRUE;
                       $data= $q->result_array();
                       
                       foreach($data as $option):
                            echo '<option value="'.$option[$f1].'">'.$option[$f2].'</option>';
            
                        endforeach;
        
                    }
    }

    function select_loop($table)
    {
        $CI =& get_instance();
        $q=$CI->db->get($table);
        if($q->num_rows()>=1)
        {
            // return TRUE;
           $data= $q->result_array();
            return $data;
        }
    }
    function select_where_num($table,$where,$feild)
    {
        $CI =& get_instance();
        $q=$CI->db->where($where)
        ->select($feild)
        ->get($table);
        $num=$q->num_rows();
        echo $num;
       
    }
    function select_where_row($table,$where,$feild)
    {
        $CI =& get_instance();
        $q=$CI->db->where($where)
        ->select($feild)
        ->get($table);
        if($q->num_rows()>=1)
        {
            // return TRUE;
           $data= $q->result_array();
            return $data;
        }
       
    }
?>