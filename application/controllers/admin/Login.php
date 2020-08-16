<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {

	function __construct()
    {
       parent::__construct();
       $this->load->model('login_model');
       if($this->session->userdata('user_login'))
        {
              redirect('admin/main/index');
        }
    }

    public function index()
    {	
        $this->load->view('admin/login');
    }

    public function login_act()
    {
       // print_r($_POST);
          $where = array(
            'email' =>$this->input->post('email'),
            'Password' =>$this->hash($this->input->post('Password'))
           );
           // print_r($where); die;
           $data  = $this->login_model->login($where);
           
		   if($data)
		   {
            // echo "<pre>";
            // print_r($_SESSION); die;   
			redirect('admin/main/index'); 
		   }
           else{
             $this->session->set_flashdata('message', 'Please Enter Correct Username and Password');
             redirect('admin/login');
           }
    }

    public function forgot()
    {
    	 $this->load->view('admin/login/forgot');
    }

    public function resgister()
    {
        $this->load->view('admin/register');
    }

    public function hash($string)
    {
        return hash('sha512', $string . config_item('encryption_key'));
	}
	
	

}
