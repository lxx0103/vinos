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
}