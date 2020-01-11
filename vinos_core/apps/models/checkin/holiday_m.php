<?php

class Holiday_m extends CI_Model {

    public function __construct()
    {
        parent::__construct();
    }

    public function get_all_holiday($filters, $is_enable = 1, $orderby = 'id')
    {
        $sql = "SELECT * FROM s_holiday WHERE 1";
        $count_sql = "SELECT COUNT(1) AS total FROM s_holiday WHERE 1";
        $where = array();
        if(isset($filters['target']) && $filters['target'])
        {
            $sql .= ' AND target = ?';
            $count_sql .= ' AND target = ?';
            array_push($where, $filters['target']);
        }
        if(isset($filters['dept_id']) && $filters['dept_id'])
        {
            $sql .= ' AND dept_id = ?';
            $count_sql .= ' AND dept_id = ?';
            array_push($where, $filters['dept_id']);
        }
        if(isset($filters['staff_code']) && $filters['staff_code'])
        {
            $sql .= ' AND staff_code = ?';
            $count_sql .= ' AND staff_code = ?';
            array_push($where, $filters['staff_code']);
        }
        if(isset($filters['type']) && $filters['type'])
        {
            $sql .= ' AND type = ?';
            $count_sql .= ' AND type = ?';
            array_push($where, $filters['type']);
        }
        if($is_enable == 1)
        {
            $sql .= ' AND is_enable = 1';
        }
        $sql .= ' ORDER BY '. $orderby .' ASC';
        $sql .= ' LIMIT ' . ($filters['page']-1) * $filters['page_size'] . ','. $filters['page_size'];
        $query = $this->db->query($sql, $where); 
        $count_query = $this->db->query($count_sql, $where);
        $holidays = $query->result_array();
        $count = $count_query->row_array();
        if($holidays)
        {
            return array('status' => 1, 'msg' => '成功', 'data' => $holidays, 'total'=>$count['total']);
        }
        return array('status' => 2, 'msg' => '不存在', 'data' => array(), 'total'=>$count['total']);
    }

    public function get_all_holiday_by_month($month, $is_enable = 1)
    {
        $sql = "SELECT * FROM s_holiday WHERE holiday >= ? AND holiday <= ?";
        $month_start = $month . '-01';
        $month_end = $month . '-31';
        $where = array($month_start, $month_end);
        if($is_enable == 1)
        {
            $sql .= ' AND is_enable = 1';
        }
        $query = $this->db->query($sql, $where); 
        $holidays = $query->result_array();
        if($holidays)
        {
            return array('status' => 1, 'msg' => '成功', 'data' => $holidays,);
        }
        return array('status' => 2, 'msg' => '不存在', 'data' => array());
    }

    public function get_one_holiday($holiday_id, $is_enable = 1)
    {
        $sql = "SELECT * FROM s_holiday WHERE id = ? ";
        if($is_enable == 1)
        {
            $sql .= ' AND is_enable = 1';
        }
        $sql .= " LIMIT 1";
        $query = $this->db->query($sql, array($holiday_id)); 
        $holiday = $query->row_array();
        if($holiday)
        {
            return array('status' => 1, 'msg' => '成功', 'data' => $holiday);
        }
        return array('status' => 2, 'msg' => '用户不存在', 'data' => array() );
    }

    public function save($holiday_id, $target, $dept_id, $staff_code, $holiday, $hours, $type, $is_enable, $user)
    {
        if(!in_array($target, array(1,2,3)))
        {
            return array('status' => 2, 'msg' => '请选择放假对象', 'data' => array() );
        }
        if($target == 1 && !$dept_id)
        {
            return array('status' => 2, 'msg' => '请选择部门', 'data' => array() );
        }
        if($target == 2 && !$staff_code)
        {
            return array('status' => 2, 'msg' => '请输入工号', 'data' => array() );            
        }
        if($target == 3)
        {
            $dept_id = 0;
            $staff_code = '';
        }elseif ($target == 1) 
        {
            $staff_code = '';
        }else
        {
            $dept_id = 0;
        }
        if(!$holiday)
        {
            return array('status' => 2, 'msg' => '请选择假期日期', 'data' => array() );
        }
        if(!$hours)
        {
            return array('status' => 2, 'msg' => '请选择假期时长', 'data' => array() );
        }
        if(!$type)
        {
            return array('status' => 2, 'msg' => '请选择类型', 'data' => array() );            
        }
        if($holiday_id == 0)
        {
            $data = array('target' => $target, 'dept_id' => $dept_id, 'staff_code' => $staff_code, 'holiday' => $holiday, 'hours' => $hours, 'type' => $type, 'is_enable' => $is_enable, 'create_user' => $user, 'update_user' => $user);
            $str = $this->db->insert_string('s_holiday', $data);
        }else{
            $data = array('target' => $target, 'dept_id' => $dept_id, 'staff_code' => $staff_code, 'holiday' => $holiday, 'hours' => $hours, 'type' => $type, 'is_enable' => $is_enable, 'update_user' => $user);
            $where = "id = ". $holiday_id;
            $str = $this->db->update_string('s_holiday', $data, $where);
        }
            $query = $this->db->query($str);
            return array('status' => 1, 'msg' => '成功！', 'data' => $this->db->affected_rows());
    }
}