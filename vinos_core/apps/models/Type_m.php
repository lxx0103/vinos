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


}