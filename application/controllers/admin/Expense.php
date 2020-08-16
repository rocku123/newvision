<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Expense extends MY_Controller {

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
          "expensetype"=>$post['expensetype']
      );
      $data = $this->admin_model->filterExepense($Formdata);
      $this->load->view('admin/expense/filterExpense', $data);
  }
    
   

  public function addExpense()
  {	
        $data=[];
        $userType = $this->session->userdata('usertype');
        $table_name = 'expensetype';
        if($userType==3 || $userType==1){
          $where = ['IsDeleted'=>0,'status'=>1];
          $data['expensetype'] = $this->admin_model->show_list($table_name,$where);
        }
        
        // echo $this->db->last_query();
         // print_r($data['total']); die;
        $data['subview'] = $this->load->view('admin/expense/addExpense', $data, TRUE);
        $this->load->view('admin/_layout_main', $data);
    }
    
    public function expense()
    {	
        $data=[];
        $userType = $this->session->userdata('usertype');
        $table_name = 'expensetype';
        if($userType==3 || $userType==1){
          $where = ['IsDeleted'=>0,'status'=>1];
          $data['total'] = $this->db->select('SUM(amount) as amount')->from('expense_amount')->where($where)->get()->row();
          $data['expensetype'] = $this->admin_model->show_list($table_name,$where);
          $data['lists'] = $this->db->select("expense_amount.*,expensetype.name")->from('expense_amount')->join('expensetype', 'expensetype.id = expense_amount.expensetype','left')->where('expense_amount.IsDeleted',0)->where('expense_amount.status',1)->order_by('expense_amount.id','desc')->get()->result();    
        }
        
        // echo $this->db->last_query();
         // print_r($data['total']); die;
        $data['subview'] = $this->load->view('admin/expense/expense', $data, TRUE);
        $this->load->view('admin/_layout_main', $data);
    }

    public function deleteExpense($id){
      $this->admin_model->update_table(['id'=>$id],"expense_amount",['IsDeleted'=>1]);
      redirect('admin/expense/expense');
    }

    public function editExpense($id){
       $where = ['IsDeleted'=>0,'status'=>1]; 
       $data['expensetype'] = $this->admin_model->show_list('expensetype',$where);
       $data['list'] = $this->db->select("expense_amount.*,expensetype.name")->from('expense_amount')->join('expensetype', 'expensetype.id = expense_amount.expensetype','left')->where('expense_amount.id',$id)->get()->row();
       if($data){
        $data['subview'] = $this->load->view('admin/expense/editExpense', $data, TRUE);
        $this->load->view('admin/_layout_main', $data);
       }
      

    }

    

    public function add_expense_act() {
      $post = $this->input->post();
      
      if(empty(trim($post['expensetype']))){
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
              "expensetype" => $post['expensetype'],
              "amount" => $post['amount'],
              "description" => $post['description'],
              "date"   => date('Y-m-d'),
              "status" => 1,
              "created_at" => date('Y-m-d h:i:s'),
              "updated_at" => date('Y-m-d h:i:s')
          );
          $id = $this->admin_model->insert_table($data, 'expense_amount'); 
      }
      
      if($id){
          $response = array('success' => true,'id'=>$id , 'message' => 'Expense Amount Draft Successfully');
          echo json_encode($response);
          exit;
      }
     //  redirect('jobcard/printjobcard/' . $addjobid, 'refresh');
  }


  public function update_expense_act() {
    $post = $this->input->post();

    if(empty(trim($post['expensetype']))){
        $response = array('success' => false, 'message' => 'Please Select Expense Type.');
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
            "expensetype" => $post['expensetype'],
            "amount" => $post['amount'],
            "description" => $post['description'],
            "updated_at" => date('Y-m-d h:i:s')
        );
        $id = $this->input->post('id');
        $this->admin_model->update_table(['id'=>$id], 'expense_amount',$data); 
    }
    
    if($id){
        $response = array('success' => true,'id'=>$id , 'message' => 'Expense Draft Successfully');
        echo json_encode($response);
        exit;
    }
   //  redirect('jobcard/printjobcard/' . $addjobid, 'refresh');
}


 


 
	

}
