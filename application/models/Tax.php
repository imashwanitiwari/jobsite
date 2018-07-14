<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Tax extends CI_Model {
    public function get_product($op_id){
        $op_id = (int)$op_id;
        $this->load->model('where');
        $data = $this->db->select("NAME,ID")
                         ->where("VISIBLE = ".$op_id." OR VISIBLE = 0")
                         ->get("products");
        if($data->num_rows()>0)
        {
            foreach($data->result_array() as $data):
                            if($data['NAME'][0]=="@")
                            {
                                $product_ref = substr($data['NAME'],1); //value like @table_id(int
                                $product = explode('_',$product_ref);//value like table_id
                            // print_r($product);
                                $data['NAME'] = $this->where->select_where($product[0],["ID"=>$product[1]],"NAME");
                                $data['NAME'] = $data['NAME'][0]['NAME'];
                            }
                            $response['data'][] = $data;
            endforeach;
            echo json_encode($response);
        }
    }
}