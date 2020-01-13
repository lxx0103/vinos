<?php

class Contacto_m extends CI_Model {

    public function __construct()
    {
        parent::__construct();
    }

    public function get_all_contact($position = '')
    {
        $sql = "SELECT * FROM f_contact WHERE 1";
        if($position == 'top')
        {
            $sql .= ' AND is_show_top = 1';
        }
        if($position == 'bottom')
        {
            $sql .= ' AND is_show_bottom = 1';
        }
        $sql .= ' ORDER BY ID ASC';
        $query = $this->db->query($sql); 
        $contacts = $query->result_array();
        if($contacts)
        {
            return array('status' => 1, 'msg' => '成功', 'data' => $contacts);
        }
        return array('status' => 2, 'msg' => '菜单不存在', 'data' => array() );
    }

    public function get_one_contact($directory_name, $class_name, $method_name, $is_enable = 1)
    {
        $sql = "SELECT * FROM f_contact WHERE dir = ? AND controller = ? AND method = ?";
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
        $contact = $query->row_array();
        // var_dump($contact);die();
        if($contact)
        {
            return array('status' => 1, 'msg' => '成功', 'data' => $contact);
        }
        return array('status' => 2, 'msg' => '菜单不存在', 'data' => array() );
    }

    public function get_contact_by_id($contact_id, $is_enable = 1)
    {
        $sql = "SELECT * FROM f_contact WHERE id = ? ";
        if($is_enable == 1)
        {
            $sql .= ' AND is_enable = 1';
        }
        $sql .= " LIMIT 1";
        $query = $this->db->query($sql, array($contact_id)); 
        $role = $query->row_array();
        if($role)
        {
            return array('status' => 1, 'msg' => '成功', 'data' => $role);
        }
        return array('status' => 2, 'msg' => '用户不存在', 'data' => array() );
    }

    public function save($contact_id, $name, $email, $phone, $message)
    {
        if($contact_id == 0)
        {
            $data = array('name' => $name, 'email' => $email, 'phone' => $phone, 'message' => $message);
            $str = $this->db->insert_string('f_contact', $data);
        }else{
            $data = array('name' => $name, 'email' => $email, 'phone' => $phone, 'message' => $message);
            $where = "id = ". $contact_id;
            $str = $this->db->update_string('f_contact', $data, $where);
        }
        $query = $this->db->query($str);
        return array('status' => 1, 'msg' => '成功！', 'data' => $this->db->affected_rows());
    }
}