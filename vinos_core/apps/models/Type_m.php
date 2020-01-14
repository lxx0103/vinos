<?php

class Type_m extends CI_Model {

    public function __construct()
    {
        parent::__construct();
    }

    public function get_all_type($is_show = 1)
    {
        $sql = "SELECT * FROM f_type WHERE 1";
        if($is_show == '1')
        {
            $sql .= ' AND is_show = 1';
        }
        $sql .= ' ORDER BY ROW,ID ASC';
        $query = $this->db->query($sql); 
        $types = $query->result_array();
        if($types)
        {
            return array('status' => 1, 'msg' => '成功', 'data' => $types);
        }
        return array('status' => 2, 'msg' => '类型不存在', 'data' => array() );
    }

    public function get_one_type($id)
    {
        $sql = "SELECT * FROM f_type WHERE id = ? ";
        $sql .= " LIMIT 1";
        $query = $this->db->query($sql, array($id)); 
        $type = $query->row_array();
        if($type)
        {
            return array('status' => 1, 'msg' => '成功', 'data' => $type);
        }
        return array('status' => 2, 'msg' => '类型不存在', 'data' => array() );
    }

    public function save($id, $name, $row, $is_show, $user)
    {
        if($id == 0)
        {
            $data = array('name' => $name, 'row' => $row, 'is_show' => $is_show, 'create_user' => $user, 'update_user' => $user);
            $str = $this->db->insert_string('f_type', $data);
        }else{
            $data = array('name' => $name, 'row' => $row, 'is_show' => $is_show, 'update_user' => $user);
            $where = "id = ". $id;
            $str = $this->db->update_string('f_type', $data, $where);
        }
        $query = $this->db->query($str);
        return array('status' => 1, 'msg' => '成功！', 'data' => $this->db->affected_rows());
    }
}