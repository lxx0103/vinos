<?php

class Contacto_m extends CI_Model {

    public function __construct()
    {
        parent::__construct();
    }

    public function get_all_contact()
    {
        $sql = "SELECT * FROM f_contact WHERE 1";
        $sql .= ' ORDER BY ID ASC';
        $query = $this->db->query($sql); 
        $contacts = $query->result_array();
        if($contacts)
        {
            return array('status' => 1, 'msg' => '成功', 'data' => $contacts);
        }
        return array('status' => 2, 'msg' => '留言不存在', 'data' => array() );
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