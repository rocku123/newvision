<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Donation extends MY_Controller {

	function __construct()
    {
       parent::__construct();
       $this->load->model('admin_model');
      
    }
    
    public function filter(){
        $post = $this->input->post();
        $Formdata = array(
            "fromDate"=>$post['fromDate'],
            "toDate"=>$post['toDate'],
            "donation_type"=>$post['donation_type']
        );
        $data = $this->admin_model->filterDonation($Formdata);
        $this->load->view('admin/donation/quikDonation/filterDonation', $data);
    }

    public function addDonation()
    {	
        $data=[];
        $userType = $this->session->userdata('usertype');
        $table_name = 'donation_type';
        if($userType==3 || $userType==1){
          $where = ['IsDeleted'=>0,'status'=>1];
          $data['donation_type'] = $this->admin_model->show_list($table_name,$where);
        }
        
        // echo $this->db->last_query();
         // print_r($data['total']); die;
        $data['subview'] = $this->load->view('admin/donation/quikDonation/addDonation', $data, TRUE);
        $this->load->view('admin/_layout_main', $data);
    }
    
    public function donate()
    {	
        $data=[];
        $userType = $this->session->userdata('usertype');
        
        
        $table_name = 'donation_type';
        if($userType==3 || $userType==1){
          $where = ['IsDeleted'=>0,'status'=>1];
          $data['total'] = $this->db->select('SUM(amount) as amount')->from('donation_amount')->where($where)->get()->row();
          $data['donation_type'] = $this->admin_model->show_list($table_name,$where);
          $data['lists'] = $this->db->select("donation_amount.*,donation_type.name")->from('donation_amount')->join('donation_type', 'donation_type.id = donation_amount.donation_type','left')->where('donation_amount.IsDeleted',0)->where('donation_amount.status',1)->order_by('donation_amount.id','desc')->get()->result();    
        }
        
        // echo $this->db->last_query();
         // print_r($data['total']); die;
        $data['subview'] = $this->load->view('admin/donation/quikDonation/donation', $data, TRUE);
        $this->load->view('admin/_layout_main', $data);
    }

    public function deleteDonate($id){
      $this->admin_model->update_table(['id'=>$id],"donation_amount",['IsDeleted'=>1]);
      redirect('admin/donation/donate');
    }

    public function editDonate($id){
       $where = ['IsDeleted'=>0,'status'=>1]; 
       $data['donation_type'] = $this->admin_model->show_list('donation_type',$where);
       $data['list'] = $this->db->select("donation_amount.*,donation_type.name")->from('donation_amount')->join('donation_type', 'donation_type.id = donation_amount.donation_type','left')->where('donation_amount.id',$id)->get()->row();
       if($data){
        $data['subview'] = $this->load->view('admin/donation/quikDonation/editDonation', $data, TRUE);
        $this->load->view('admin/_layout_main', $data);
       }
      

    }

    

    public function add_donation_act() {
      $post = $this->input->post();
      
      if(empty(trim($post['donation_type']))){
          $response = array('success' => false, 'message' => 'Please Select Donation Type.');
          echo json_encode($response);
          exit;
      }
      if(empty(trim($post['amount']))){
        $response = array('success' => false, 'message' => 'Please Enter Amount.');
        echo json_encode($response);
        exit;
      }
     
      
      if($post){
          // customer account adding 
          $data = array(
              "donation_type" => $post['donation_type'],
              "amount" => $post['amount'],
              "date"   => date('Y-m-d'),
              "status" => 1,
              "created_at" => date('Y-m-d h:i:s'),
              "updated_at" => date('Y-m-d h:i:s')
          );
          $id = $this->admin_model->insert_table($data, 'donation_amount'); 
      }
      
      if($id){
          $response = array('success' => true,'id'=>$id , 'message' => 'Donation Amount Draft Successfully');
          echo json_encode($response);
          exit;
      }
     //  redirect('jobcard/printjobcard/' . $addjobid, 'refresh');
  }


  public function update_donation_act() {
    $post = $this->input->post();

    if(empty(trim($post['donation_type']))){
        $response = array('success' => false, 'message' => 'Please Select Donation Type.');
        echo json_encode($response);
        exit;
    }
    if(empty(trim($post['amount']))){
      $response = array('success' => false, 'message' => 'Please Enter Amount.');
      echo json_encode($response);
      exit;
    }
    
    
    if($post){
        // customer account adding 
        $data = array(
            "donation_type" => $post['donation_type'],
            "amount" => $post['amount'],
            "updated_at" => date('Y-m-d h:i:s')
        );
        $id = $this->input->post('id');
        $this->admin_model->update_table(['id'=>$id], 'donation_amount',$data); 
    }
    
    if($id){
        $response = array('success' => true,'id'=>$id , 'message' => 'Donation Draft Successfully');
        echo json_encode($response);
        exit;
    }
   //  redirect('jobcard/printjobcard/' . $addjobid, 'refresh');
}


//  USER DONATION CODE

public function userfilter(){
    $post = $this->input->post();
    $Formdata = array(
        "fromDate"=>$post['fromDate'],
        "toDate"=>$post['toDate'],
        "user_id"=>$post['user_id']
    );
    $data = $this->admin_model->userfilterDonation($Formdata);
    // print_r($data);
    $this->load->view('admin/donation/userDonation/filterDonation', $data);
}

public function adduserDonation()
{	
    $data=[];
    $userType = $this->session->userdata('usertype');
    $table_name = 'user';
    if($userType==3 || $userType==1){
      $where = ['IsDeleted'=>0,'status'=>1,'usertype'=>2];
      $data['users'] = $this->admin_model->show_list($table_name,$where);
    }
    
    // echo $this->db->last_query();
     // print_r($data['total']); die;
    $data['subview'] = $this->load->view('admin/donation/userDonation/addDonation', $data, TRUE);
    $this->load->view('admin/_layout_main', $data);
}

public function userDonation()
{	
    $data=[];
    $userType = $this->session->userdata('usertype');
    
    
    $table_name = 'user';
    if($userType==3 || $userType==1){
      $where = ['IsDeleted'=>0,'status'=>1];
      $data['total'] = $this->db->select('SUM(amount) as amount')->from('user_amount')->where($where)->get()->row();
      $where['usertype'] =2;
      $data['users'] = $this->admin_model->show_list($table_name,$where);
      $data['lists'] = $this->db->select("user_amount.*,user.firstname,user.lastname")->from('user_amount')->join('user', 'user.id = user_amount.user_id','left')->where('user_amount.IsDeleted',0)->where('user_amount.status',1)->order_by('user_amount.id','desc')->get()->result();    
    }
    
    // echo $this->db->last_query();
    // print_r($data['total']); die;
    $data['subview'] = $this->load->view('admin/donation/userDonation/donation', $data, TRUE);
    $this->load->view('admin/_layout_main', $data);
}

public function deleteuserDonate($id){
  $this->admin_model->update_table(['id'=>$id],"user_amount",['IsDeleted'=>1]);
  redirect('admin/donation/userDonation');
}

public function edituserDonate($id){
   $where = ['IsDeleted'=>0,'status'=>1]; 
   $where['usertype'] =2;
   $data['users'] = $this->admin_model->show_list("user",$where);
   $data['list'] =  $this->db->select("user_amount.*,user.firstname,user.lastname")->from('user_amount')->join('user', 'user.id = user_amount.user_id','left')->where('user_amount.id',$id)->get()->row();
   if($data){
    $data['subview'] = $this->load->view('admin/donation/userDonation/editDonation', $data, TRUE);
    $this->load->view('admin/_layout_main', $data);
   }
  

}



public function add_userdonation_act() {
  $post = $this->input->post();
  
  if(empty(trim($post['user_id']))){
      $response = array('success' => false, 'message' => 'Please Select User.');
      echo json_encode($response);
      exit;
  }
  if(empty(trim($post['amount']))){
    $response = array('success' => false, 'message' => 'Please Enter Amount.');
    echo json_encode($response);
    exit;
  }
 
  
  if($post){
      // customer account adding 
      $data = array(
          "user_id" => $post['user_id'],
          "amount" => $post['amount'],
          "date"   => date('Y-m-d'),
          "status" => 1,
          "created_at" => date('Y-m-d h:i:s'),
          "updated_at" => date('Y-m-d h:i:s')
      );
      $id = $this->admin_model->insert_table($data, 'user_amount'); 
  }
  
  if($id){
      $response = array('success' => true,'id'=>$id , 'message' => 'Donation Amount Draft Successfully');
      echo json_encode($response);
      exit;
  }
 //  redirect('jobcard/printjobcard/' . $addjobid, 'refresh');
}


public function update_userdonation_act() {
$post = $this->input->post();

if(empty(trim($post['user_id']))){
    $response = array('success' => false, 'message' => 'Please Select User.');
    echo json_encode($response);
    exit;
}
if(empty(trim($post['amount']))){
  $response = array('success' => false, 'message' => 'Please Enter Amount.');
  echo json_encode($response);
  exit;
}


if($post){
    // customer account adding 
    $data = array(
        "user_id" => $post['user_id'],
        "amount" => $post['amount'],
        "updated_at" => date('Y-m-d h:i:s')
    );
    $id = $this->input->post('id');
    $this->admin_model->update_table(['id'=>$id], 'user_amount',$data); 
}

if($id){
    $response = array('success' => true,'id'=>$id , 'message' => 'Donation Draft Successfully');
    echo json_encode($response);
    exit;
}
//  redirect('jobcard/printjobcard/' . $addjobid, 'refresh');
}


 


 
	

}
