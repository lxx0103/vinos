<?php

class Map_m extends CI_Model {

    public function __construct()
    {
        parent::__construct();
    }

    public function get_all_map()
    {
        $sql = "SELECT * FROM f_map ORDER BY ID ASC";
        $query = $this->db->query($sql); 
        $maps = $query->result_array();
        if($maps)
        {
            return array('status' => 1, 'msg' => '成功', 'data' => $maps);
        }
        return array('status' => 2, 'msg' => '菜单不存在', 'data' => array() );
    }

    public function get_one_map($id)
    {
        $sql = "SELECT * FROM f_map WHERE id = ?  LIMIT 1";
        $query = $this->db->query($sql, array($id)); 
        $map = $query->row_array();
        if($map)
        {
            return array('status' => 1, 'msg' => '成功', 'data' => $map);
        }
        return array('status' => 2, 'msg' => '酒庄不存在', 'data' => array() );
    }

    public function save($id, $zone_id, $img, $user)
    {
        if($id == 0)
        {
            $data = array('zone_id' => $zone_id, 'img' => $img, 'create_user' => $user, 'update_user' => $user);
            $str = $this->db->insert_string('f_map', $data);
        }else{
            $data = array('zone_id' => $zone_id, 'img' => $img, 'update_user' => $user);
            $where = "id = ". $id;
            $str = $this->db->update_string('f_map', $data, $where);
        }
        $query = $this->db->query($str);
        return array('status' => 1, 'msg' => '成功！', 'data' => $this->db->affected_rows());
    }
}