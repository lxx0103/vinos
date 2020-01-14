<?php

class Bodega_m extends CI_Model {

    public function __construct()
    {
        parent::__construct();
    }

    public function get_all_bodega($zone_id = 0)
    {
        $sql = "SELECT * FROM f_bodega WHERE 1";
        if($zone_id != 0)
        {
            $sql .= ' AND zone_id = '. $zone_id;
        }
        $sql .= ' ORDER BY ID ASC';
        $query = $this->db->query($sql); 
        $bodegas = $query->result_array();
        if($bodegas)
        {
            return array('status' => 1, 'msg' => '成功', 'data' => $bodegas);
        }
        return array('status' => 2, 'msg' => '菜单不存在', 'data' => array() );
    }

    public function get_one_bodega($id)
    {
        $sql = "SELECT * FROM f_bodega WHERE id = ?  LIMIT 1";
        $query = $this->db->query($sql, array($id)); 
        $bodega = $query->row_array();
        if($bodega)
        {
            return array('status' => 1, 'msg' => '成功', 'data' => $bodega);
        }
        return array('status' => 2, 'msg' => '酒庄不存在', 'data' => array() );
    }

    public function save($id, $name, $zone_id, $img, $url, $desc, $is_show, $user)
    {
        if($id == 0)
        {
            $data = array('name' => $name, 'zone_id' => $zone_id, 'img' => $img, 'url' => $url, 'desc' => $desc, 'is_show' => $is_show, 'create_user' => $user, 'update_user' => $user);
            $str = $this->db->insert_string('f_bodega', $data);
        }else{
            $data = array('name' => $name, 'zone_id' => $zone_id, 'img' => $img, 'url' => $url, 'desc' => $desc, 'is_show' => $is_show, 'update_user' => $user);
            $where = "id = ". $id;
            $str = $this->db->update_string('f_bodega', $data, $where);
        }
        $query = $this->db->query($str);
        return array('status' => 1, 'msg' => '成功！', 'data' => $this->db->affected_rows());
    }
}