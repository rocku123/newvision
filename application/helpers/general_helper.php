<?php 

function Menu($type){
    $CI = &get_instance();

    $list = $CI->db->where('type',$type)->get('nv_page')->result();
    return $list;
}

function total_amount(){
    $CI = &get_instance();
    $where = ['IsDeleted'=>0,'status'=>1];
    $donation = $CI->db->select('SUM(amount) as amount')->from('donation_amount')->where($where)->get()->row();
    $user_donation =  $CI->db->select('SUM(amount) as amount')->from('user_amount')->where($where)->get()->row();
    $total = $donation->amount + $user_donation->amount;
    return $total;
}

function total_expense(){
    $CI = &get_instance();
    $where = ['IsDeleted'=>0,'status'=>1];
    $expense = $CI->db->select('SUM(amount) as amount')->from('expense_amount')->where($where)->get()->row();
    return $expense->amount;
}

function total_user(){
    $CI = &get_instance();
    $where = ['IsDeleted'=>0,'status'=>1,'usertype'=>2];
    $query = $CI->db->select('id')->from('user')->where($where)->get();
    return $query->num_rows();;
}

function imaamcollection(){
    $CI = &get_instance();
    $month = intval(date('m')); 
    $total = $CI->db->select('SUM(amount) as amount')->from('monthly_imaam_payment')->where(['IsDeleted'=>0,'month_id'=>$month])->get()->row();
    return $total->amount;
}