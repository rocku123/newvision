<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Main extends MY_Controller {

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


  public function update_user_act() {
    $post = $this->input->post();
    if(empty(trim($post['user_id']))){
      $response = array('success' => false, 'message' => 'User Id is Required.');
      echo json_encode($response);
      exit;
    }
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
    // if(empty(trim($post['password']))){
    //     $response = array('success' => false, 'message' => 'Please Enter Password.');
    //     echo json_encode($response);
    //     exit;
    // }
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
        $id = $post('user_id');
        $data = array(
            "firstname" => $post['firstname'],
            "lastname" => $post['lastname'],
            "email" => $post['email'],
            "phone" => $post['phone'],
            "usertype" => $post['usertype'],
            "status" => 1,
            "member" => $post['member'],
            "created_at" => date('Y-m-d h:i:s'),
            "updated_at" => date('Y-m-d h:i:s')
        );

        $this->admin_model->update_table(['id'=>$id], 'user',$data); 
     
    }
    
    if($user_id){
        $response = array('success' => true,'id'=>$id , 'message' => 'User Update successfully');
        echo json_encode($response);
        exit;
    }
   //  redirect('jobcard/printjobcard/' . $addjobid, 'refresh');
}

//  Imaam Payment List

  public function addImampayment()
    { 
        $data=[];
        $userType = $this->session->userdata('usertype');
        $table_name ="usertype";
        $data['usertype'] = $this->admin_model->show_list($table_name,$where=null);
        $data['c_year'] = intval(date('Y'));
        $month = intval(date('m')); 
        $data['c_month']= $month;
        if($userType==3 || $userType==1){
          $table_name = 'monthlist';
          $data['monthlist'] = $this->admin_model->show_list($table_name,$where=null); 
          $table_name = 'user';
          $where = ['IsDeleted'=>0,'status'=>1];
          $data['users'] = $this->db->select('user_fixed_amount.fix_amount,user.id,user.firstname,user.lastname')->from('user_fixed_amount')->join('user', 'user.id = user_fixed_amount.user_id','left')->where('user_fixed_amount.IsDeleted',0)->get()->result(); 

          // $data['lists'] = $this->db->select('monthly_imaam_payment.*,user.firstname,user.lastname,user_fixed_amount.fix_amount')->from('monthly_imaam_payment')->join('user', 'user.id = monthly_imaam_payment.user_id','left')->join('user_fixed_amount', 'user_fixed_amount.user_id = monthly_imaam_payment.user_id','left')->where(['monthly_imaam_payment.IsDeleted'=>0,'monthly_imaam_payment.month_id'=>$month])->order_by('monthly_imaam_payment.id','desc')->get()->result();
          
        }
        
        // echo $this->db->last_query();
        // print_r($data['lists']); die;
        $data['subview'] = $this->load->view('admin/user/addimampayment', $data, TRUE);
        $this->load->view('admin/_layout_main', $data);
    }
  public function imampaymentList()
    {	
        $data=[];
        $userType = $this->session->userdata('usertype');
        $table_name ="usertype";
        $data['usertype'] = $this->admin_model->show_list($table_name,$where=null);
        $data['c_year'] = intval(date('Y'));
        $month = intval(date('m')); 
        $data['c_month']= $month;
        if($userType==3 || $userType==1){
          $table_name = 'monthlist';
          $data['monthlist'] = $this->admin_model->show_list($table_name,$where=null); 
          $table_name = 'user';
          $where = ['IsDeleted'=>0,'status'=>1];
          $data['users'] = $this->db->select('user_fixed_amount.fix_amount,user.id,user.firstname,user.lastname')->from('user_fixed_amount')->join('user', 'user.id = user_fixed_amount.user_id','left')->where('user_fixed_amount.IsDeleted',0)->get()->result(); 

          $data['total'] = $this->db->select('SUM(amount) as amount')->from('monthly_imaam_payment')->where(['IsDeleted'=>0,'month_id'=>$month])->get()->row();

          $data['lists'] = $this->db->select('monthly_imaam_payment.*,user.firstname,user.lastname,user_fixed_amount.fix_amount')->from('monthly_imaam_payment')->join('user', 'user.id = monthly_imaam_payment.user_id','left')->join('user_fixed_amount', 'user_fixed_amount.user_id = monthly_imaam_payment.user_id','left')->where(['monthly_imaam_payment.IsDeleted'=>0,'monthly_imaam_payment.month_id'=>$month])->order_by('monthly_imaam_payment.id','desc')->get()->result();
          
        }
        
        // echo $this->db->last_query();
        // print_r($data['lists']); die;
        $data['subview'] = $this->load->view('admin/user/imampaymentList', $data, TRUE);
        $this->load->view('admin/_layout_main', $data);
    }


  public function add_imampayment_act() {
      $post = $this->input->post();
      
      if(empty(trim($post['user_id']))){
          $response = array('success' => false, 'message' => 'Please Select User');
          echo json_encode($response);
          exit;
      }
      if(empty(trim($post['month_id']))){
        $response = array('success' => false, 'message' => 'Please Select Month.');
        echo json_encode($response);
        exit;
      }
      if(empty(trim($post['amount']))){
        $response = array('success' => false, 'message' => 'Please Enter Amount.');
        echo json_encode($response);
        exit;
      }
      $user_id = $post['user_id'];
      $month_id = $post['month_id'];
      $amount = $post['amount'];
      $year = intval(date('Y'));
      $where = ['user_id'=>$user_id,'month_id'=>$month_id,'year'=>$year];
      $checkdata = $this->db->where($where)->get('monthly_imaam_payment')->row();
      $getUsermonthlydata = $this->db->where('user_id',$user_id)->get('user_fixed_amount')->row();
     
      if($checkdata){
        $response = array('success' => false, 'message' => 'User Already Paid the Amount');
        echo json_encode($response);
        exit;
      }
      if($amount < $getUsermonthlydata->fix_amount){
        $response = array('success' => false, 'message' => 'Enter Amount is less then Monthly Fix Amount');
        echo json_encode($response);
      }

      if($post){
          // customer account adding 
          $data = array(
              "user_id" => $post['user_id'],
              "month_id" => $post['month_id'],
              "year" => $year,
              "amount" => $post['amount'],
              "status" => 1,
              "created_at" => date('Y-m-d h:i:s'),
              "updated_at" => date('Y-m-d h:i:s')
          );

          $id = $this->admin_model->insert_table($data, 'monthly_imaam_payment'); 
       
      }
      
      if($user_id){
          $response = array('success' => true,'id'=>$id , 'message' => 'Imaam Payment Draft successfully');
          echo json_encode($response);
          exit;
      }
     //  redirect('jobcard/printjobcard/' . $addjobid, 'refresh');
  }

  public function getUserAmount(){
    $user_id = $this->input->post('user_id');
    //echo $user_id; die;
    $data = $this->db->where('user_id',$user_id)->get('user_fixed_amount')->row();
    if($user_id){
      $response = array('success' => true,'amount'=>$data->fix_amount , 'message' => 'Data');
      echo json_encode($response);
      exit;
    }
    else{
      $response = array('success' => false, 'message' => 'Data not found');
      echo json_encode($response);
      exit;
    }
  }

  public function filterImaampayment(){
        $post = $this->input->post();
        $month = $post['month_id'];
        $year = $post['year'];
        $user_id = $post['user_id'];
        $data=[];
        $where = []; 
        $where['IsDeleted']= 0;

        

        $this->db->select('monthly_imaam_payment.*,user.firstname,user.lastname,user_fixed_amount.fix_amount')->from('monthly_imaam_payment')->join('user', 'user.id = monthly_imaam_payment.user_id','left')->join('user_fixed_amount', 'user_fixed_amount.user_id = monthly_imaam_payment.user_id','left');

        $this->db->where(['monthly_imaam_payment.IsDeleted'=>0]);
        if(!empty($month)){
          $where['month_id']=$month;
          $this->db->where(['monthly_imaam_payment.month_id'=>$month]);
        }
        if(!empty($year)){
          $where['year']= $year;
          $this->db->where(['monthly_imaam_payment.year'=>$year]);
        }
        if(!empty($user_id)){
          $where['user_id']= $user_id;
          $this->db->where(['monthly_imaam_payment.user_id'=>$user_id]);
        }
        $data['lists'] = $this->db->order_by('monthly_imaam_payment.id','desc')->get()->result();

        $data['total'] = $this->db->select('SUM(amount) as amount')->from('monthly_imaam_payment')->where($where)->get()->row();

        $this->load->view('admin/user/filterImaampayment', $data);

  }


  public function hash($string)
  {
        return hash('sha512', $string . config_item('encryption_key'));
	}
	

}
