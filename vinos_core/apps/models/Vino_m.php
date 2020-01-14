<?php

class Vino_m extends CI_Model {

    public function __construct()
    {
        parent::__construct();
    }

    public function get_all_vino($type_id = 0)
    {
        $sql = "SELECT * FROM f_vino WHERE 1";
        if($type_id != 0)
        {
            $sql .= ' AND type_id = '. $type_id;
        }
        $sql .= ' ORDER BY ID ASC';
        $query = $this->db->query($sql); 
        $vinos = $query->result_array();
        if($vinos)
        {
            return array('status' => 1, 'msg' => '成功', 'data' => $vinos);
        }
        return array('status' => 2, 'msg' => '菜单不存在', 'data' => array() );
    }

    public function get_one_vino($id)
    {
        $sql = "SELECT * FROM f_vino WHERE id = ?  LIMIT 1";
        $query = $this->db->query($sql, array($id)); 
        $vino = $query->row_array();
        if($vino)
        {
            return array('status' => 1, 'msg' => '成功', 'data' => $vino);
        }
        return array('status' => 2, 'msg' => '酒庄不存在', 'data' => array() );
    }

    public function save($id, $name, $type_id, $img, $url, $desc, $is_show, $user)
    {
        if($id == 0)
        {
            $data = array('name' => $name, 'type_id' => $type_id, 'img' => $img, 'url' => $url, 'desc' => $desc, 'is_show' => $is_show, 'create_user' => $user, 'update_user' => $user);
            $str = $this->db->insert_string('f_vino', $data);
        }else{
            $data = array('name' => $name, 'type_id' => $type_id, 'img' => $img, 'url' => $url, 'desc' => $desc, 'is_show' => $is_show, 'update_user' => $user);
            $where = "id = ". $id;
            $str = $this->db->update_string('f_vino', $data, $where);
        }
        $query = $this->db->query($str);
        return array('status' => 1, 'msg' => '成功！', 'data' => $this->db->affected_rows());
    }
}