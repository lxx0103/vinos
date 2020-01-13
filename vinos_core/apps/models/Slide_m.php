<?php

class Slide_m extends CI_Model {

    public function __construct()
    {
        parent::__construct();
    }

    public function get_all_slide($type = 0)
    {
        $sql = "SELECT * FROM f_slide WHERE is_show = 1 ";
        if($type != 0)
        {
            $sql .= ' AND type = ' . $type;
        }
        $sql .= ' ORDER BY TYPE,ID ASC';
        $query = $this->db->query($sql); 
        $slides = $query->result_array();
        if($slides)
        {
            return array('status' => 1, 'msg' => '成功', 'data' => $slides);
        }
        return array('status' => 2, 'msg' => 'Slide不存在', 'data' => array() );
    }

    public function get_one_slide($directory_name, $class_name, $method_name, $is_enable = 1)
    {
        $sql = "SELECT * FROM f_slide WHERE dir = ? AND controller = ? AND method = ?";
        if($is_enable == 1)
        {
            $sql .= ' AND is_enable = 1';
        }
        $sql .= " LIMIT 1";
        if($method_name == 'index')
        {
            $method_name = '';
        }
        $query = $this->db->query($sql, array($directory_name, $class_name, $method_name)); 
        $slide = $query->row_array();
        // var_dump($slide);die();
        if($slide)
        {
            return array('status' => 1, 'msg' => '成功', 'data' => $slide);
        }
        return array('status' => 2, 'msg' => '菜单不存在', 'data' => array() );
    }

    public function get_slide_by_id($slide_id, $is_enable = 1)
    {
        $sql = "SELECT * FROM f_slide WHERE id = ? ";
        if($is_enable == 1)
        {
            $sql .= ' AND is_enable = 1';
        }
        $sql .= " LIMIT 1";
        $query = $this->db->query($sql, array($slide_id)); 
        $role = $query->row_array();
        if($role)
        {
            return array('status' => 1, 'msg' => '成功', 'data' => $role);
        }
        return array('status' => 2, 'msg' => '用户不存在', 'data' => array() );
    }

    public function save($slide_id, $name, $email, $phone, $message)
    {
        if($slide_id == 0)
        {
            $data = array('name' => $name, 'email' => $email, 'phone' => $phone, 'message' => $message);
            $str = $this->db->insert_string('f_slide', $data);
        }else{
            $data = array('name' => $name, 'email' => $email, 'phone' => $phone, 'message' => $message);
            $where = "id = ". $slide_id;
            $str = $this->db->update_string('f_slide', $data, $where);
        }
        $query = $this->db->query($str);
        return array('status' => 1, 'msg' => '成功！', 'data' => $this->db->affected_rows());
    }
}