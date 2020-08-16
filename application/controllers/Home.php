<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {

	function __construct()
    {
        parent::__construct();
        $data = array();
        $this->load->model('nwvision_model');

    }

	public function index()
	{
		$data = array();
		$table_name = "nv_page";
		$data['lists'] = $this->nwvision_model->show_list($table_name,$where=NULL);
		$data['subview'] = $this->load->view('front/index', $data, TRUE);
        $this->load->view('front/_layout_main', $data); //page load
    }

    public function about($page=null)
	{
		$data = array();
        $table_name = "nv_page";
        $where = ['page_name'=>$page,'type'=>1];
        $data['lists'] = $this->nwvision_model->select_table2($where,$table_name);
		$data['subview'] = $this->load->view('front/about', $data, TRUE);
        $this->load->view('front/_layout_main', $data); //page load
    }

    public function work($page=null)
	{
        $data = array();
        $table_name = "nv_page";
        $where = ['page_name'=>$page,'type'=>2];
        $data['lists'] = $this->nwvision_model->select_table2($where,$table_name);
		$data['subview'] = $this->load->view('front/work', $data, TRUE);
        $this->load->view('front/_layout_main', $data); //page load
    }


    public function team()
	{
        $data = array();
        $table_name = "nv_team";
        $where = ['team_status'=>1];
        $data['lists'] = $this->nwvision_model->show_list($table_name,$where);
		$data['subview'] = $this->load->view('front/team', $data, TRUE);
        $this->load->view('front/_layout_main', $data); //page load
    }

    public function event()
	{
        $data = array();
        $table_name = "nv_event";
        $where = ['event_status'=>1];
        $data['title']="Events";
        $data['lists'] = $this->nwvision_model->show_list($table_name,$where);
		$data['subview'] = $this->load->view('front/event', $data, TRUE);
        $this->load->view('front/_layout_main', $data); //page load
    }

    public function testimonial()
	{
        $data = array(); 
        $table_name = "nv_testimonial";
        $where = ['testimonial_status'=>1];
        $data['lists'] = $this->nwvision_model->show_list($table_name,$where);
		$data['subview'] = $this->load->view('front/testimonial', $data, TRUE);
        $this->load->view('front/_layout_main', $data); //page load
    }

    public function gallery($page=null)
	{
        $data = array();
        $table_name = $page=="video"?"nv_video_gallery":"nv_image_gallery";
        $title = $page=="video"?"Video Gallery":"Image Gallery";
        $where = $page=="video"?['video_status'=>1]:['image_status'=>1];
        $data['title'] = $title;
        $data['lists'] = $this->nwvision_model->show_list($table_name,$where);
        if($page=="video"){
            $data['subview'] = $this->load->view('front/video', $data, TRUE);    
        
        }else{
            $data['subview'] = $this->load->view('front/gallery', $data, TRUE);
        }
        //print_r($data['lists']);
        $this->load->view('front/_layout_main', $data); //page load
    }

    public function donate()
	{
        $data = array();
        // $table_name = "nv_donor";
        // $where = ['page_name'=>$page,'type'=>2];
        // $data['lists'] = $this->nwvision_model->select_table2($where,$table_name);
		$data['subview'] = $this->load->view('front/donate', $data, TRUE);
        $this->load->view('front/_layout_main', $data); //page load
    }

    public function contact()
	{
        $data = array(); 
        // $table_name = "nv_page";
        // $where = ['page_name'=>$page,'type'=>2];
        // $data['lists'] = $this->nwvision_model->select_table2($where,$table_name);
		$data['subview'] = $this->load->view('front/contact', $data, TRUE);
        $this->load->view('front/_layout_main', $data); //page load
    }
    
}