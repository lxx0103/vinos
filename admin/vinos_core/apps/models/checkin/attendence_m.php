<?php

class Attendence_m extends CI_Model {

    public function __construct()
    {
        parent::__construct();
    }

    public function get_all_attendence($filters)
    {
        $sql = "SELECT * FROM u_check_in_out WHERE 1";
        $count_sql = "SELECT COUNT(1) AS total FROM u_check_in_out WHERE 1";
        $where = array();
        if(isset($filters['machine_id']) && $filters['machine_id'])
        {
            $sql .= ' AND machine_id = ?';
            $count_sql .= ' AND machine_id = ?';
            array_push($where, $filters['machine_id']);
        }
        if(isset($filters['start_time']) && $filters['start_time'])
        {
            $sql .= ' AND check_date >= ?';
            $count_sql .= ' AND check_date >= ?';
            array_push($where, $filters['start_time']);
        }
        if(isset($filters['end_time']) && $filters['end_time'])
        {
            $sql .= ' AND check_date < ?';
            $count_sql .= ' AND check_date < ?';
            array_push($where, $filters['end_time']);
        }
        $sql .= ' ORDER BY machine_id ASC, check_time ASC';
        if(isset($filters['page']) && isset($filters['page_size']))
        {
            $sql .= ' LIMIT ' . ($filters['page']-1) * $filters['page_size'] . ','. $filters['page_size'];
        }
        $query = $this->db->query($sql, $where); 
        $count_query = $this->db->query($count_sql, $where);
        $menus = $query->result_array();
        $count = $count_query->row_array();
        if($menus)
        {
            return array('status' => 1, 'msg' => '成功', 'data' => $menus, 'total'=>$count['total']);
        }
        return array('status' => 2, 'msg' => '不存在', 'data' => array(), 'total'=>$count['total']);
    }


    public function save($machine_id, $check_date, $check_time, $user)
    {
        if(!$machine_id)
        {
            return array('status' => 2, 'msg' => '用户错误', 'data' => array() );
        }
        if(!preg_match('/^\d\d\d\d-\d\d-\d\d$/', $check_date))
        {
            return array('status' => 2, 'msg' => '日期错误', 'data' => array() );
        }
        if(!preg_match('/^\d\d:\d\d$/', $check_time))
        {
            return array('status' => 2, 'msg' => '时间错误', 'data' => array() );            
        }
        $data = array('machine_id' => $machine_id, 'check_date' => $check_date, 'check_time' => $check_date .' '.$check_time, 'create_user' => $user);
        $str = $this->db->insert_string('u_check_in_out', $data);
        $query = $this->db->query($str);
        return array('status' => 1, 'msg' => '成功！', 'data' => $this->db->affected_rows());
    }

    public function set_check_date($check_id, $type)
    {
        $sql = "SELECT * FROM u_check_in_out WHERE id = ? LIMIT 1";
        $query = $this->db->query($sql, array($check_id));
        $result = $query->row_array();
        if($type == 2){
            $new_check_date = date('Y-m-d', strtotime($result['check_time'] . ' - 1 day'));
        }else{
            $new_check_date = date('Y-m-d', strtotime($result['check_time'] ));
        }
        $update_sql = "UPDATE u_check_in_out SET check_date = ? WHERE id = ? LIMIT 1";
        $update_query = $this->db->query($update_sql, array($new_check_date, $check_id));
        return array('status' => 1, 'msg' => '成功！', 'data' => $this->db->affected_rows());
    }
}