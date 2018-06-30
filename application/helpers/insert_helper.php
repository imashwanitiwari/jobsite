<?php
     function select_demo($table,$true,$false)
    {
                    $tbl='<input type="hidden" name="insert_helper_table" value="'.$table.'">';
                    $tru='<input type="hidden" name="insert_helper_true" value="'.$true.'">';
                    $fls='<input type="hidden" name="insert_helper_false" value="'.$false.'">';
                    return $tbl.$tru.$fls;
    }
     function insert_multi($num,$true,$false,$validation='')
    {
                $CI =& get_instance();
               $controller=uri_string();
                
                $tbl='<input type="hidden" name="insert_multi_helper_total_table" value="'.$num.'">';
                $tru='<input type="hidden" name="insert_multi_helper_true" value="'.$true.'">';
                $fls='<input type="hidden" name="insert_multi_helper_false" value="'.$false.'">';
                $vald='<input type="hidden" name="insert_multi_helper_validation" value="'.$validation.'">';
                $load='<input type="hidden" name="insert_multi_helper_controller" value="'.$controller.'">';
                return $tbl.$tru.$fls.$load.$vald;
    }
     function set_multi($index,$table,$feilds)
    {
                $tbl='<input type="hidden" name="set_multi_table'.$index.'" value="'.$table.'">';
                $tru='<input type="hidden" name="set_multi_feilds'.$index.'" value="'.$feilds.'">';
                return $tbl.$tru;
    }
?>