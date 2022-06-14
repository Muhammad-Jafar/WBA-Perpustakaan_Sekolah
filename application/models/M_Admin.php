<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_Admin extends CI_Model {

    public function list_admin() {
        $q = $this->db->select('*')->get('admin');
        return $q->result();
    }

    
}