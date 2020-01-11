<?php

class Setsche_m extends CI_Model {

    public function __construct()
    {
        parent::__construct();
    }

    public function get_all_rule($is_enable = 1)
    {
        $sql = "SELECT * FROM s_dept_sche";
        if($is_enable == 1)
        {
            $sql .= ' WHERE is_enable = 1';
        }
        $query = $this->db->query($sql); 
        $row = $query->result_array();
        if($row)
        {
            return array('status' => 1, 'msg' => '成功', 'data' => $row);
        }
        return array('status' => 2, 'msg' => '不存在', 'data' => array() );
    }

    public function get_one_rule($rule_id, $is_enable = 1)
    {
        $sql = "SELECT * FROM s_dept_sche WHERE id = ? ";
        if($is_enable == 1)
        {
            $sql .= ' AND is_enable = 1';
        }
        $sql .= " LIMIT 1";
        $query = $this->db->query($sql, array($rule_id)); 
        $rule = $query->row_array();
        if($rule)
        {
            return array('status' => 1, 'msg' => '成功', 'data' => $rule);
        }
        return array('status' => 2, 'msg' => '不存在', 'data' => array() );
    }

    public function get_rule_by_dept_id($dept_id, $date, $is_enable = 1)
    {
        $sql = "SELECT * FROM s_dept_sche WHERE dept_id = ? AND start_date <= ? AND end_date >= ?";
        if($is_enable == 1)
        {
            $sql .= ' AND is_enable = 1';
        }
        $query = $this->db->query($sql, array($dept_id, $date, $date)); 
        $rule = $query->result_array();

        if($rule)
        {
            return array('status' => 1, 'msg' => '成功', 'data' => $rule);
        }
        return array('status' => 2, 'msg' => '不存在', 'data' => array() );
    }

    public function save($rule_id, $dept_id, $start_date, $end_date, $start_time, $end_time, $is_enable, $user)
    {
        if(!$dept_id){
            return array('status' => 2, 'msg' => '部门错误', 'data' => array() );
        }
        if(!$start_date){
            return array('status' => 2, 'msg' => '开始日期错误', 'data' => array() );
        }
        if(!preg_match('/^\d\d\d\d-\d\d-\d\d$/', $start_date)){
            return array('status' => 2, 'msg' => '开始日期格式错误，必须类似1999-01-01', 'data' => array() );            
        }
        if(!$end_date){
            return array('status' => 2, 'msg' => '结束日期错误', 'data' => array() );
        }
        if(!preg_match('/^\d\d\d\d-\d\d-\d\d$/', $end_date)){
            return array('status' => 2, 'msg' => '结束日期格式错误，必须类似1999-01-01', 'data' => array() );            
        }
        if(!$start_time){
            return array('status' => 2, 'msg' => '上班时间错误', 'data' => array() );
        }
        if(!$end_time){
            return array('status' => 2, 'msg' => '下班时间错误', 'data' => array() );
        }
        if($rule_id == 0)
        {
            $data = array('dept_id' => $dept_id, 'start_date' => $start_date, 'end_date' => $end_date, 'start_time' => $start_time, 'end_time' => $end_time, 'is_enable' => $is_enable, 'create_user' => $user, 'update_user' => $user);
            $str = $this->db->insert_string('s_dept_sche', $data);
        }else{
            $data = array('dept_id' => $dept_id, 'start_date' => $start_date, 'end_date' => $end_date, 'start_time' => $start_time, 'end_time' => $end_time, 'is_enable' => $is_enable, 'update_user' => $user);
            $where = "id = ". $rule_id;
            $str = $this->db->update_string('s_dept_sche', $data, $where);
        }
            $query = $this->db->query($str);
            return array('status' => 1, 'msg' => '成功！', 'data' => $this->db->affected_rows());
    }

    public function get_all_rule_staff($is_enable = 1)
    {
        $sql = "SELECT * FROM s_staff_sche";
        if($is_enable == 1)
        {
            $sql .= ' WHERE is_enable = 1';
        }
        $query = $this->db->query($sql); 
        $row = $query->result_array();
        if($row)
        {
            return array('status' => 1, 'msg' => '成功', 'data' => $row);
        }
        return array('status' => 2, 'msg' => '不存在', 'data' => array() );
    }

    public function get_one_rule_staff($rule_id, $is_enable = 1)
    {
        $sql = "SELECT * FROM s_staff_sche WHERE id = ? ";
        if($is_enable == 1)
        {
            $sql .= ' AND is_enable = 1';
        }
        $sql .= " LIMIT 1";
        $query = $this->db->query($sql, array($rule_id)); 
        $rule = $query->row_array();
        if($rule)
        {
            return array('status' => 1, 'msg' => '成功', 'data' => $rule);
        }
        return array('status' => 2, 'msg' => '不存在', 'data' => array() );
    }

    public function get_rule_by_staff_code($staff_code, $date, $is_enable = 1)
    {
        $sql = "SELECT * FROM s_staff_sche WHERE staff_code = ? AND start_date <= ? AND end_date >= ?";
        if($is_enable == 1)
        {
            $sql .= ' AND is_enable = 1';
        }
        $query = $this->db->query($sql, array($staff_code, $date, $date)); 
        $rule = $query->result_array();

        if($rule)
        {
            return array('status' => 1, 'msg' => '成功', 'data' => $rule);
        }
        return array('status' => 2, 'msg' => '不存在', 'data' => array() );
    }

    public function save_staff($rule_id, $staff_code, $start_date, $end_date, $start_time, $end_time, $is_enable, $user)
    {
        if(!$staff_code){
            return array('status' => 2, 'msg' => '部门错误', 'data' => array() );
        }
        if(!$start_date){
            return array('status' => 2, 'msg' => '开始日期错误', 'data' => array() );
        }
        if(!preg_match('/^\d\d\d\d-\d\d-\d\d$/', $start_date)){
            return array('status' => 2, 'msg' => '开始日期格式错误，必须类似1999-01-01', 'data' => array() );            
        }
        if(!$end_date){
            return array('status' => 2, 'msg' => '结束日期错误', 'data' => array() );
        }
        if(!preg_match('/^\d\d\d\d-\d\d-\d\d$/', $end_date)){
            return array('status' => 2, 'msg' => '结束日期格式错误，必须类似1999-01-01', 'data' => array() );            
        }
        if(!$start_time){
            return array('status' => 2, 'msg' => '上班时间错误', 'data' => array() );
        }
        if(!$end_time){
            return array('status' => 2, 'msg' => '下班时间错误', 'data' => array() );
        }
        if($rule_id == 0)
        {
            $data = array('staff_code' => $staff_code, 'start_date' => $start_date, 'end_date' => $end_date, 'start_time' => $start_time, 'end_time' => $end_time, 'is_enable' => $is_enable, 'create_user' => $user, 'update_user' => $user);
            $str = $this->db->insert_string('s_staff_sche', $data);
        }else{
            $data = array('staff_code' => $staff_code, 'start_date' => $start_date, 'end_date' => $end_date, 'start_time' => $start_time, 'end_time' => $end_time, 'is_enable' => $is_enable, 'update_user' => $user);
            $where = "id = ". $rule_id;
            $str = $this->db->update_string('s_staff_sche', $data, $where);
        }
            $query = $this->db->query($str);
            return array('status' => 1, 'msg' => '成功！', 'data' => $this->db->affected_rows());
    }
}