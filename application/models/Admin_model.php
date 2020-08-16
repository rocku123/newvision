<?php

class Admin_model extends MY_Model
{

    protected $_table_name = '';
    protected $_primary_key = 'id';
    protected $_primary_filter = 'intval';
    protected $_order_by = '';
    public $rules = array();
    protected $_timestamps = FALSE;

    function __construct()
    {
        parent::__construct();
    }

    function filterDonation($data){
        $fromDate="";
        $toDate = "";
        if(!empty($data['fromDate']) && !empty($data['toDate']) ){
        $fromDate = date('Y-m-d',strtotime($data['fromDate']));
        $toDate =   date('Y-m-d',strtotime($data['toDate']));
        }
        $donation_type = $data['donation_type'];
        $this->db->select("donation_amount.*,donation_type.name");
        $this->db->from('donation_amount');
        $this->db->join('donation_type', 'donation_type.id = donation_amount.donation_type','left');
        if(!empty($donation_type)){
            $this->db->where('donation_amount.donation_type',$donation_type);
        }
        if(!empty($fromDate) || !empty($toDate)){
            $this->db->where('date(donation_amount.date) >=',$fromDate);
            $this->db->where('date(donation_amount.date) <=',$toDate);
        }
        $this->db->where('donation_amount.IsDeleted',0);
        $this->db->where('donation_amount.status',1);
        $this->db->order_by('donation_amount.id','desc');
        $list = $this->db->get()->result();
        

    // SUM OF TOTAL AMOUNT
        $this->db->select('SUM(amount) as amount');
        $this->db->from('donation_amount');
        if(!empty($donation_type)){
            $this->db->where('donation_type',$donation_type);
        }
        if(!empty($fromDate) || !empty($toDate)){
            $this->db->where('date >=',$fromDate);
            $this->db->where('date <=',$toDate);
        }
        $this->db->where('IsDeleted',0);
        $this->db->where('status',1);
        $total = $this->db->get()->row();
        $result = array('lists'=>$list,'total'=>$total); 
        return $result;
    }

    function userfilterDonation($data){
        $fromDate="";
        $toDate = "";
        if(!empty($data['fromDate']) && !empty($data['toDate']) ){
        $fromDate = date('Y-m-d',strtotime($data['fromDate']));
        $toDate =   date('Y-m-d',strtotime($data['toDate']));
        }
        $user_id = $data['user_id'];
        $this->db->select("user_amount.*,user.firstname,user.lastname");
        $this->db->from('user_amount');
        $this->db->join('user', 'user.id = user_amount.user_id','left');
        if(!empty($user_id)){
            $this->db->where('user_amount.user_id',$user_id);
        }
        if(!empty($fromDate) || !empty($toDate)){
            $this->db->where('date(user_amount.date) >=',$fromDate);
            $this->db->where('date(user_amount.date) <=',$toDate);
        }
        $this->db->where('user_amount.IsDeleted',0);
        $this->db->where('user_amount.status',1);
        $this->db->order_by('user_amount.id','desc');
        $list = $this->db->get()->result();
        

    // SUM OF TOTAL AMOUNT
        $this->db->select('SUM(amount) as amount');
        $this->db->from('user_amount');
        if(!empty($user_id)){
            $this->db->where('user_amount.user_id',$user_id);
        }
        if(!empty($fromDate) || !empty($toDate)){
            $this->db->where('date >=',$fromDate);
            $this->db->where('date <=',$toDate);
        }
        $this->db->where('IsDeleted',0);
        $this->db->where('status',1);
        $total = $this->db->get()->row();
        $result = array('lists'=>$list,'total'=>$total); 
        return $result;
    }

    function filterExepense($data){
        $fromDate="";
        $toDate = "";
        if(!empty($data['fromDate']) && !empty($data['toDate']) ){
        $fromDate = date('Y-m-d',strtotime($data['fromDate']));
        $toDate =   date('Y-m-d',strtotime($data['toDate']));
        }
        $expensetype = $data['expensetype'];
        $this->db->select("expense_amount.*,expensetype.name");
        $this->db->from('expense_amount');
        $this->db->join('expensetype', 'expensetype.id = expense_amount.expensetype','left');
        if(!empty($expensetype)){
            $this->db->where('expense_amount.expensetype',$expensetype);
        }
        if(!empty($fromDate) || !empty($toDate)){
            $this->db->where('date(expense_amount.date) >=',$fromDate);
            $this->db->where('date(expense_amount.date) <=',$toDate);
        }
        $this->db->where('expense_amount.IsDeleted',0);
        $this->db->where('expense_amount.status',1);
        $this->db->order_by('expense_amount.id','desc');
        $list = $this->db->get()->result();
        

    // SUM OF TOTAL AMOUNT
        $this->db->select('SUM(amount) as amount');
        $this->db->from('expense_amount');
        if(!empty($expensetype)){
            $this->db->where('expensetype',$expensetype);
        }
        if(!empty($fromDate) || !empty($toDate)){
            $this->db->where('date >=',$fromDate);
            $this->db->where('date <=',$toDate);
        }
        $this->db->where('IsDeleted',0);
        $this->db->where('status',1);
        $total = $this->db->get()->row();
        $result = array('lists'=>$list,'total'=>$total); 
        return $result;

    }

    // CURD FUNCTION

}