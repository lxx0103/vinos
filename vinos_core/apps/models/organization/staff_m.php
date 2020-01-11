<?php

class Staff_m extends CI_Model {

    public function __construct()
    {
        parent::__construct();
    }

    public function get_all_staff($filters, $is_enable = 1, $orderby = 'id')
    {
        $sql = "SELECT * FROM s_staff WHERE 1";
        $count_sql = "SELECT COUNT(1) AS total FROM s_staff WHERE 1";
        $where = array();
        if($filters['dept_id'])
        {
            $sql .= ' AND dept_id = ?';
            $count_sql .= ' AND dept_id = ?';
            array_push($where, $filters['dept_id']);
        }
        if(isset($filters['name']) && $filters['name'])
        {
            $sql .= ' AND name = ?';
            $count_sql .= ' AND name = ?';
            array_push($where, $filters['name']);
        }
        if($filters['staff_code'])
        {
            $sql .= ' AND staff_code = ?';
            $count_sql .= ' AND staff_code = ?';
            array_push($where, $filters['staff_code']);
        }
        if($is_enable == 1)
        {
            $sql .= ' AND is_enable = 1';
        }
        $sql .= ' ORDER BY '. $orderby .' ASC';
        $sql .= ' LIMIT ' . ($filters['page']-1) * $filters['page_size'] . ','. $filters['page_size'];
        $query = $this->db->query($sql, $where); 
        $count_query = $this->db->query($count_sql, $where);
        $menus = $query->result_array();
        $count = $count_query->row_array();
        if($menus)
        {
            return array('status' => 1, 'msg' => '成功', 'data' => $menus, 'total'=>$count['total']);
        }
        return array('status' => 2, 'msg' => '菜单不存在', 'data' => array(), 'total'=>$count['total']);
    }

    public function get_staff_by_id($staff_id, $is_enable = 1)
    {
        $sql = "SELECT * FROM s_staff WHERE id = ? ";
        if($is_enable == 1)
        {
            $sql .= ' AND is_enable = 1';
        }
        $sql .= " LIMIT 1";
        $query = $this->db->query($sql, array($staff_id)); 
        $role = $query->row_array();
        if($role)
        {
            return array('status' => 1, 'msg' => '成功', 'data' => $role);
        }
        return array('status' => 2, 'msg' => '用户不存在', 'data' => array() );
    }

    public function save($staff_id, $staff_code, $name, $gender, $dept_id, $position_id, $phone, $mobile, $birthday, $address, $in_date, $out_date, $is_enable, $user)
    {
        if(!$staff_code){
            return array('status' => 2, 'msg' => '工号错误', 'data' => array() );
        }
        if(!$name){
            return array('status' => 2, 'msg' => '姓名错误', 'data' => array() );
        }
        if(!$gender){
            return array('status' => 2, 'msg' => '性别错误', 'data' => array() );
        }
        if(!$dept_id){
            return array('status' => 2, 'msg' => '部门错误', 'data' => array() );
        }
        if(!$position_id){
            return array('status' => 2, 'msg' => '职务错误', 'data' => array() );
        }
        if($staff_id == 0)
        {
            $data = array('staff_code' => $staff_code, 'name' => $name, 'gender' => $gender, 'dept_id' => $dept_id, 'position_id' => $position_id, 'phone' => $phone, 'mobile' => $mobile, 'birthday' => $birthday, 'address' => $address, 'in_date' => $in_date, 'out_date' => $out_date, 'is_enable' => $is_enable, 'create_user' => $user, 'update_user' => $user);
            $str = $this->db->insert_string('s_staff', $data);
        }else{
            $data = array('staff_code' => $staff_code, 'name' => $name, 'gender' => $gender, 'dept_id' => $dept_id, 'position_id' => $position_id, 'phone' => $phone, 'mobile' => $mobile, 'birthday' => $birthday, 'address' => $address, 'in_date' => $in_date, 'out_date' => $out_date, 'is_enable' => $is_enable, 'update_user' => $user);
            $where = "id = ". $staff_id;
            $str = $this->db->update_string('s_staff', $data, $where);
        }
        $query = $this->db->query($str);
        return array('status' => 1, 'msg' => '成功！', 'data' => $this->db->affected_rows());
    }
}