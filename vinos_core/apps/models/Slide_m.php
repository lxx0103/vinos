<?php

class Slide_m extends CI_Model {

    public function __construct()
    {
        parent::__construct();
    }

    public function get_all_slide($type = 0, $is_show = 1)
    {
        $sql = "SELECT * FROM f_slide WHERE 1 ";
        if($is_show == 1){
            $sql .= ' AND  is_show = 1';
        }
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

    public function get_one_slide($id)
    {
        $sql = "SELECT * FROM f_slide WHERE id = ? ";
        $sql .= " LIMIT 1";
        $query = $this->db->query($sql, array($id)); 
        $role = $query->row_array();
        if($role)
        {
            return array('status' => 1, 'msg' => '成功', 'data' => $role);
        }
        return array('status' => 2, 'msg' => 'Slide不存在', 'data' => array() );
    }

    public function save($id, $type, $img, $url, $desc, $is_show)
    {
        if($id == 0)
        {
            $data = array('type' => $type, 'img' => $img, 'url' => $url, 'desc' => $desc, 'is_show' => $is_show);
            $str = $this->db->insert_string('f_slide', $data);
        }else{
            $data = array('type' => $type, 'img' => $img, 'url' => $url, 'desc' => $desc, 'is_show' => $is_show);
            $where = "id = ". $id;
            $str = $this->db->update_string('f_slide', $data, $where);
        }
        $query = $this->db->query($str);
        return array('status' => 1, 'msg' => '成功！', 'data' => $this->db->affected_rows());
    }

    public function del($id)
    {        
        $this->db->where('id', $id);
        $this->db->delete('f_slide'); 
        return array('status' => 1, 'msg' => '成功！', 'data' => $this->db->affected_rows());
    }
}