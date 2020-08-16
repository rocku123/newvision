<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Payment extends MY_Controller {

	function __construct()
    {
       parent::__construct();
       $this->load->model('admin_model');
      
    }

    public function index()
    {	
        $this->load->view('admin/dashboard');
    }
   
    
    public function userList()
    {	
        $data=[];
        $userType = $this->session->userdata('usertype');
        $table_name ="usertype";
        $data['usertype'] = $this->admin_model->show_list($table_name,$where=null);
        $table_name = 'user';
        if($userType==3){
          $data['lists'] = $this->admin_model->show_list($table_name,$where=null);    
        }
        elseif($userType==1){
          $where = ['IsDeleted'=>0,'usertype'=>2];  
          $data['lists'] = $this->admin_model->show_list($table_name,$where);
        }
        else{
          $where = ['IsDeleted'=>0,'usertype'=>2];  
          $data['lists'] = $this->admin_model->show_list($table_name,$where);  
        }
        // echo $this->db->last_query();
        // print_r($data['lists']); die;
        $data['subview'] = $this->load->view('admin/user/userlist', $data, TRUE);
        $this->load->view('admin/_layout_main', $data);
    }

    public function deleteUser($id){
      $this->admin_model->update_table(['id'=>$id],"user",['IsDeleted'=>1]);
      redirect('admin/main/userList');
    }

    public function editUser($id){
      $data = $this->admin_model->select_table(['id'=>$id],"user");
      if($data){
        $data['subview'] = $this->load->view('admin/user/editUser', $data, TRUE);
        $this->load->view('admin/_layout_main', $data);
      }
      

    }

    

    public function add_user_act() {
      $post = $this->input->post();
      
      if(empty(trim($post['email']))){
          $response = array('success' => false, 'message' => 'Please Enter Email.');
          echo json_encode($response);
          exit;
      }
      if(empty(trim($post['firstname']))){
        $response = array('success' => false, 'message' => 'Please Enter Fistname.');
        echo json_encode($response);
        exit;
      }
      if(empty(trim($post['lastname']))){
        $response = array('success' => false, 'message' => 'Please Enter Lastname.');
        echo json_encode($response);
        exit;
      }
      if(empty(trim($post['password']))){
          $response = array('success' => false, 'message' => 'Please Enter Password.');
          echo json_encode($response);
          exit;
      }
      if(empty(trim($post['phone']))){
          $response = array('success' => false, 'message' => 'Please Enter Phone.');
          echo json_encode($response);
          exit;
      }
      $password = $this->hash($this->input->post('password'));
      $checkemail = $this->db->where('email',$post['email'])->get('user')->row();
      $checkphone = $this->db->where('phone',$post['phone'])->get('user')->row();
      if($checkemail){
        $response = array('success' => false, 'message' => 'Email Already exits, Please Enter Another Email');
        echo json_encode($response);
        exit;
      }
      if($checkphone){
        $response = array('success' => false, 'message' => 'Phone Already exits Please Enter Another Phone No');
        echo json_encode($response);
        exit;
      }

      if($post){
          // customer account adding 
          $data = array(
              "firstname" => $post['firstname'],
              "lastname" => $post['lastname'],
              "email" => $post['email'],
              "phone" => $post['phone'],
              "usertype" => $post['usertype'],
              'password'=> $password,
              "status" => 1,
              "member" => $post['member'],
              "created_at" => date('Y-m-d h:i:s'),
              "updated_at" => date('Y-m-d h:i:s')
          );

          $user_id = $this->admin_model->insert_table($data, 'user'); 
       
      }
      
      if($user_id){
          $response = array('success' => true,'id'=>$user_id , 'message' => 'User draft successfully');
          echo json_encode($response);
          exit;
      }
     //  redirect('jobcard/printjobcard/' . $addjobid, 'refresh');
  }


 


 
	

}
