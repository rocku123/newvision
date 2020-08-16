<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Login_model extends CI_Model {

    function __construct() {
        parent::__construct();
    }

    function login($where) {
        $data = $this->db->where($where)->get('user')->row();
        
        if ($data){
                $data_array = (array)$data;
                $this->session->set_userdata($data_array);
                $this->session->set_userdata('user_login', 'Active');
              
                return TRUE;
            }
        else {
            return false;
        }

        // echo $this->db->last_query(); exit;
    }

}
