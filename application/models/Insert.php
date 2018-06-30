<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Insert extends CI_Model {

            public function index($table,$array)
            {
               $query = $this->db->insert($table,$array);
               return $this->db->insert_id();
            }
}