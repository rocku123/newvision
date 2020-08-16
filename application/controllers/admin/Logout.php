<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Logout extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $data = array();
       if(!$this->session->userdata('user_login'))
        {
              redirect('admin/login');
        }
    }

   function index()
    {
      $data = $_SESSION;
      $this->session->sess_destroy();
      redirect('admin/login');
    }
  }