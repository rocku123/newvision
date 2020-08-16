<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Master extends MY_Controller {

	function __construct()
    {
       parent::__construct();
       $this->load->model('admin_model');
      
    }

    public function add_donationtype_act(){
      $post = $this->input->post();
      if($post){
          // customer account adding 
          $data = array(
              "name" => $post['name'],
              "created_at" => date('Y-m-d h:i:s'),
              "updated_at" => date('Y-m-d h:i:s')
          );
          $id = $this->admin_model->insert_table($data, 'donation_type'); 
      }

      redirect('admin/master/donationtype');

    }

    public function donationtype()
    {	
        $data=[];
        $userType = $this->session->userdata('usertype');
        
        $table_name = 'donation_type';
        if($userType==3 || $userType==1){
          $where = ['IsDeleted'=>0];
          $data['lists'] = $this->admin_model->show_list($table_name,$where);
        }
        
        // echo $this->db->last_query();
         // print_r($data['lists']); die;
        $data['subview'] = $this->load->view('admin/master/donationtype', $data, TRUE);
        $this->load->view('admin/_layout_main', $data);
    }

    public function deleteDonatiotype($id){
      $this->admin_model->update_table(['id'=>$id],"donation_type",['IsDeleted'=>1]);
      redirect('admin/master/donationtype');
    }


    public function add_expensetype_act(){
      $post = $this->input->post();
      if($post){
          // customer account adding 
          $data = array(
              "name" => $post['name'],
              "created_at" => date('Y-m-d h:i:s'),
              "updated_at" => date('Y-m-d h:i:s')
          );
          $id = $this->admin_model->insert_table($data, 'expensetype'); 
      }

      redirect('admin/master/expensetype');

    }

    public function expensetype()
    {	
        $data=[];
        $userType = $this->session->userdata('usertype');
        
        $table_name = 'expensetype';
        if($userType==3 || $userType==1){
          $where = ['IsDeleted'=>0];
          $data['lists'] = $this->admin_model->show_list($table_name,$where);
        }
        
        // echo $this->db->last_query();
         // print_r($data['lists']); die;
        $data['subview'] = $this->load->view('admin/master/expensetype', $data, TRUE);
        $this->load->view('admin/_layout_main', $data);
    }

    public function deleteExpensetype($id){
      $this->admin_model->update_table(['id'=>$id],"expensetype",['IsDeleted'=>1]);
      redirect('admin/master/expensetype');
    }

    
    public function userPayment()
    {	
        $data=[];
        $userType = $this->session->userdata('usertype');
        
        $table_name = 'user';
        if($userType==3 || $userType==1){
          $where = ['IsDeleted'=>0,'usertype'=>2];
          $data['users'] = $this->admin_model->show_list($table_name,$where);
          $data['lists'] = $this->db->select("user_fixed_amount.*,user.firstname, user.lastname")->from('user_fixed_amount')->join('user', 'user.id = user_fixed_amount.user_id','left')->where('user_fixed_amount.IsDeleted',0)->where('user_fixed_amount.status',1)->order_by('user_fixed_amount.id','desc')->get()->result();    
        }
        
        // echo $this->db->last_query();
         // print_r($data['lists']); die;
        $data['subview'] = $this->load->view('admin/master/user_payment_monthly', $data, TRUE);
        $this->load->view('admin/_layout_main', $data);
    }

    public function deleteuserPayment($id){
      $this->admin_model->update_table(['id'=>$id],"user_fixed_amount",['IsDeleted'=>1]);
      redirect('admin/master/user_payment_monthly');
    }

    public function edituserPayment($id){
       $this->admin_model->select_table(['id'=>$id],"user_fixed_amount");
       $data['list'] = $this->db->select("user_fixed_amount.*,user.firstname, user.lastname")->from('user_fixed_amount')->join('user', 'user.id = user_fixed_amount.user_id')->where('user_fixed_amount.id',$id)->get()->row();
      if($data){
        $data['subview'] = $this->load->view('admin/master/edituserPayment', $data, TRUE);
        $this->load->view('admin/_layout_main', $data);
      }
      

    }

    

    public function add_userPayment_act() {
      $post = $this->input->post();
      
      if(empty(trim($post['user_id']))){
          $response = array('success' => false, 'message' => 'Please Select User.');
          echo json_encode($response);
          exit;
      }
      if(empty(trim($post['fix_amount']))){
        $response = array('success' => false, 'message' => 'Please Enter Amount.');
        echo json_encode($response);
        exit;
      }
      $checkUser = $this->db->where('user_id',$post['user_id'])->get('user_fixed_amount')->row();
      if($checkUser){
        $response = array('success' => false, 'message' => 'User Already exits, Please Select Another');
        echo json_encode($response);
        exit;
      }
      
      if($post){
          // customer account adding 
          $data = array(
              "user_id" => $post['user_id'],
              "fix_amount" => $post['fix_amount'],
              "status" => 1,
              "created_at" => date('Y-m-d h:i:s'),
              "updated_at" => date('Y-m-d h:i:s')
          );
          $user_id = $this->admin_model->insert_table($data, 'user_fixed_amount'); 
      }
      
      if($user_id){
          $response = array('success' => true,'id'=>$user_id , 'message' => 'User Monthly Amount Draft Successfully');
          echo json_encode($response);
          exit;
      }
     //  redirect('jobcard/printjobcard/' . $addjobid, 'refresh');
  }


  public function update_userPayment_act() {
    $post = $this->input->post();
    
    if(empty(trim($post['fix_amount']))){
      $response = array('success' => false, 'message' => 'Please Enter Amount.');
      echo json_encode($response);
      exit;
    }
    
    
    if($post){
        // customer account adding 
        $data = array(
            "fix_amount" => $post['fix_amount'],
            "updated_at" => date('Y-m-d h:i:s')
        );
        $id = $this->input->post('id');
        $this->admin_model->update_table(['id'=>$id], 'user_fixed_amount',$data); 
    }
    
    if($id){
        $response = array('success' => true,'id'=>$id , 'message' => 'User Monthly Amount Draft Successfully');
        echo json_encode($response);
        exit;
    }
   //  redirect('jobcard/printjobcard/' . $addjobid, 'refresh');
}


 


 
	

}
