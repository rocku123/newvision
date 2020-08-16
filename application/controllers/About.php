<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class About extends CI_Controller {

	function __construct()
    {
        parent::__construct();
        $data = array();
        // $this->load->model('booking_model');

    }

	

    public function index()
	{
		$data = array();
		// $table_name = "cbooking";
		// $data['lists'] = $this->booking_model->show_list($table_name,$where=NULL);
		$data['subview'] = $this->load->view('front/about', $data, TRUE);
        $this->load->view('front/_layout_main', $data); //page load
    }
    
}