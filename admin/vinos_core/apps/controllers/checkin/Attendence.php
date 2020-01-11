<?php

class Attendence extends MY_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('checkin/Attendence_m');
        $this->load->model('organization/Department_m');
        $this->load->model('organization/Staff_m');
        $this->load->model('checkin/Setsche_m');
        $this->load->model('checkin/Holiday_m');
    }

    public function index()
    {
        $filters['machine_id'] = trim($this->input->get('machine_id'));
        $filters['start_time'] = trim($this->input->get('start_time'));
        $filters['end_time'] = trim($this->input->get('end_time'));
        $query_str = '?';
        foreach ($filters as $key => $value) 
        {
            if($value)
            {
                $query_str .= $key . '=' . $value . '&';
            }
        }
        $filters['page'] = $this->input->get('page')?$this->input->get('page'):1;
        $filters['page_size'] = isset($this->session->page_size)?$this->session->page_size:20;
        $attendence = $this->Attendence_m->get_all_attendence($filters);
        $this->data['total'] = $attendence['total'];
        $this->data['filters'] = $filters;
        $this->data['attendence'] = $attendence['data'];
        $this->data['query_str'] = $query_str;
        $this->load->view('checkin/attendence_list_v', $this->data);
    }

    public function staff()
    {
        $filters['dept_id'] = trim($this->input->get('dept_id'));
        $filters['staff_code'] = trim($this->input->get('staff_code'));
        $filters['month'] = $this->input->get('month')?trim($this->input->get('month')):date("Y-m");
        $query_str = '?';
        foreach ($filters as $key => $value) 
        {
            if($value)
            {
                $query_str .= $key . '=' . $value . '&';
            }
        }
        $filters['page'] = $this->input->get('page')?$this->input->get('page'):1;
        $filters['page_size'] = isset($this->session->page_size)?$this->session->page_size:20;
        $staff = $this->Staff_m->get_all_staff($filters, true, 'dept_id');
        $depts = $this->Department_m->get_all_dept();
        $sorted_depts = array();
        foreach ($depts['data'] as $row) 
        {
            $sorted_depts[$row['id']] = $row;
        }
        foreach ($staff['data'] as $staff_key => $staff_value) {
            $attendence = $this->calc_attendence($staff_value['id'], $filters['month']);
            $staff['data'][$staff_key]['sum'] = $attendence['sum'];
        }
        $this->data['staff'] = $staff['data'];
        $this->data['depts'] = $depts['data'];
        $this->data['sorted_depts'] = $sorted_depts;
        $this->data['total'] = $staff['total'];
        $this->data['filters'] = $filters;
        $this->data['query_str'] = $query_str;
        $this->load->view('checkin/attendence_staff_list_v', $this->data);
    }

    public function detail()
    {   
        //获取员工信息
        $staff_id = trim($this->input->get('staff_id'));
        $month = trim($this->input->get('month'));
        $attendence = $this->calc_attendence($staff_id, $month);
        $this->data['sum'] = $attendence['sum'];
        $this->data['staff'] = $attendence['staff']['data'];
        $this->data['attendences'] = $attendence['data'];
        $this->load->view('checkin/attendence_staff_detail_v', $this->data);
    }

    public function checkin()
    {
        $machine_id = trim($this->input->post('machine_id'));
        $check_date = trim($this->input->post('check_date'));
        $check_time = trim($this->input->post('check_time'));
        $save = $this->Attendence_m->save($machine_id, $check_date, $check_time, $this->session->username);
        echo json_encode($save);
    }

    public function calc_attendence($staff_id, $month)
    {   
        $staff = $this->Staff_m->get_staff_by_id($staff_id);
        //获取部门信息
        $department = $this->Department_m->get_one_dept($staff['data']['dept_id']);
        $staff['data']['dept_name'] = $department['data']['dept_name'];
        //获取假日信息
        $holiday = $this->Holiday_m->get_all_holiday_by_month($month);
        $holiday_array = array();
        foreach ($holiday['data'] as $holiday_row) 
        {
            $holiday_array[$holiday_row['holiday']][] = $holiday_row;
        }
        //获取考勤信息
        $attendence_filter = array();
        $attendence_filter['machine_id'] = $staff['data']['machine_id'];
        $attendence_filter['start_time'] = date('Y-m-d H:i:s', strtotime($month));;
        $attendence_filter['end_time'] = date('Y-m-d H:i:s', strtotime($month . "+ 1 month"));
        $staff_attendence = $this->Attendence_m->get_all_attendence($attendence_filter);
        //构建月数组
        $day = date('t', strtotime($month));
        $attendence_array = array();
        for ($i=0; $i < $day; $i++) { 
            $now_day = date('Y-m-d', strtotime($month. "+ $i days"));
            $attendence_array[$now_day] = array();
        }
        foreach ($staff_attendence['data'] as $row) {
            $check_time = $row['check_time'];
            $check_day = $row['check_date'];
            $attendence_array[$check_day][] = date('Y-m-d H:i:s', strtotime($check_time)- strtotime($check_time)%60);
        }
        $attendence_result = array();
        $sum = array();
        $sum['legal_work_time'] = 0;
        $sum['work_time'] = 0;
        $sum['over_time'] = 0;
        $sum['holiday_time'] = 0;
        $sum['off_time'] = 0;
        $sum['late_time'] = 0;
        $sum['check_count'] = 0;
        foreach ($attendence_array as $key => $value) {
            $day_sum = array();
            $day_sum['check_detail'] = $value;
            if(count($value)%2 != 0){
                unset($value[count($value)-1]);
            }
            $in_time_array = array();
            $out_time_array = array();
            $staff_sche = $this->Setsche_m->get_rule_by_staff_code($staff['data']['staff_code'], $key);
            if($staff_sche['status'] != 1)
            {
                $dept_sche = $this->Setsche_m->get_rule_by_dept_id($staff['data']['dept_id'], $key);
                if($dept_sche['status'] != 1)
                {
                    $in_time_array[] = '08:30:00';
                    $out_time_array[] = '18:00:00';
                }else
                {                        
                    foreach ($dept_sche['data'] as $dept_sche_row) {
                        $in_time_array[] = $dept_sche_row['start_time'];
                        $out_time_array[] = $dept_sche_row['end_time'];
                    }
                }
            }else{
                foreach ($staff_sche['data'] as $staff_sche_row) {
                    $in_time_array[] = $staff_sche_row['start_time'];
                    $out_time_array[] = $staff_sche_row['end_time'];
                }
            }
            $legal_work_time = 480;
            $work_time = 0;
            $late_time = 0;
            $over_time = 0;
            for ($i=0; $i < count($value)-1; $i+=2) {
                if(count($in_time_array) >= $i/2+1)
                {
                    $in_time = $in_time_array[$i/2];
                    $out_time = $out_time_array[$i/2];
                }else
                {
                    $in_time = $in_time_array[count($in_time_array) - 1];
                    $out_time = $out_time_array[count($out_time_array) - 1];
                }
                if(strtotime($value[$i]) < strtotime($key . ' ' . $in_time))//早于上班时间则默认为上班时间
                {
                    $value[$i] = $key . ' ' . $in_time;
                }
                if(strtotime($value[$i+1]) < strtotime($key . ' ' . $in_time))//早于上班时间则默认为上班时间
                {
                    $value[$i+1] = $key . ' ' . $in_time;
                }
                if(strtotime($value[$i]) >= strtotime($key . ' 12:00:00') && strtotime($value[$i]) < strtotime($key . ' 13:00:00'))
                {
                    $value[$i] = $key . ' 13:00:00' ;
                }
                if(strtotime($value[$i+1]) >= strtotime($key . ' 12:00:00') && strtotime($value[$i+1]) < strtotime($key . ' 13:00:00'))
                {
                    $value[$i+1] = $key . ' 13:00:00' ;
                }
                if(count($in_time_array) >= $i/2+1 && strtotime($value[$i]) > strtotime($key . ' ' . $in_time) && strtotime($value[$i]) < strtotime($key . ' ' . $out_time))//迟到时间
                {
                    $late_time += (strtotime($value[$i]) - strtotime($key . ' ' . $in_time))/60;
                    $value[$i] = $key . ' ' . $in_time;
                }
                if(strtotime($value[$i]) % 1800 >= 900)
                {
                    $value[$i] = date('Y-m-d H:i:s', (strtotime($value[$i]) + (1800 - strtotime($value[$i])%1800)));
                }
                else
                {
                    $value[$i] = date('Y-m-d H:i:s', (strtotime($value[$i]) - strtotime($value[$i])%1800));
                }
                if(strtotime($value[$i+1]) % 1800 >= 900)
                {
                    $value[$i+1] = date('Y-m-d H:i:s', (strtotime($value[$i+1]) + (1800 - strtotime($value[$i+1])%1800)));
                }
                else
                {
                    $value[$i+1] = date('Y-m-d H:i:s', (strtotime($value[$i+1]) - strtotime($value[$i+1])%1800));
                }
                if(strtotime($value[$i]) < strtotime($key . ' 12:00:00'))//如果上班卡早于12点
                {
                    if(strtotime($value[$i+1]) > strtotime($key . ' 12:00:00'))//如果下班卡晚于12点
                    {
                        $work_time += (strtotime($key . ' 12:00:00') - strtotime($value[$i]))/60;//早上做满了
                        if(strtotime($value[$i+1]) > strtotime($key . ' 17:30:00'))//如果下班卡晚于17:30
                        {
                            $work_time += 5.5;//下午做满了
                            if(strtotime($value[$i+1]) > strtotime($key . ' 18:00:00'))//如果下班卡晚于18:00
                            {
                                $over_time += (strtotime($value[$i+1]) - strtotime($key . ' 18:00:00'))/60;//加班了
                            }
                        }else
                        {
                            $work_time += (strtotime($value[$i+1]) - strtotime($key . ' 13:00:00'))/60;
                        }                    
                    }else//早上打卡下班了
                    {
                        $work_time += (strtotime($value[$i+1]) - strtotime($value[$i]))/60;
                    }
                }else
                {
                    if(strtotime($value[$i]) < strtotime($key . ' 17:30:00'))
                    {
                        if(strtotime($value[$i+1]) > strtotime($key . ' 17:30:00'))//如果下班卡晚于17:30
                        {
                            $work_time += (strtotime($key . ' 17:30:00') - strtotime($value[$i]))/60;//下午做满了
                            if(strtotime($value[$i+1]) > strtotime($key . ' 18:00:00'))//如果下班卡晚于18:00
                            {
                                $over_time += (strtotime($value[$i+1]) - strtotime($key . ' 18:00:00'))/60;//加班了
                            }
                        }else
                        {
                           $work_time += (strtotime($value[$i+1]) - strtotime($value[$i]))/60; 
                        }
                    }else
                    {
                        $over_time += (strtotime($value[$i+1]) - strtotime($value[$i]))/60;
                    }
                }
            }        
            $holiday_time = 0;
            if(isset($holiday_array[$key]))
            {                   
                foreach ($holiday_array[$key] as $holiday_key => $holiday_value) 
                {
                    if($holiday_value['target'] == 3 || ($holiday_value['target'] == 1 && $holiday_value['dept_id'] == $staff['data']['dept_id']) || ($holiday_value['target'] == 2 && $holiday_value['staff_code'] == $staff['data']['staff_code']))
                    {
                        $holiday_time = $holiday_value['hours'];
                        break;
                    }
                }
            }
            $day_sum['legal_work_time'] = $legal_work_time/60;
            $day_sum['work_time'] = $work_time/60;
            $day_sum['over_time'] = $over_time/60;
            $day_sum['holiday_time'] = intval($holiday_time);
            $day_sum['off_time'] = ($legal_work_time - $work_time - intval($holiday_time)*60)/60;
            $day_sum['late_time'] = $late_time;
            $day_sum['check_count'] = count($value);

            $sum['legal_work_time'] += $day_sum['legal_work_time'];
            $sum['work_time'] += $day_sum['work_time'];
            $sum['over_time'] += $day_sum['over_time'];
            $sum['holiday_time'] += $day_sum['holiday_time'];
            $sum['off_time'] += $day_sum['off_time'];
            $sum['late_time'] += $day_sum['late_time'];
            $sum['check_count'] += $day_sum['check_count'];
            $attendence_result[$key] = $day_sum;

        }
        return array('sum' => $sum, 'data' => $attendence_result, 'staff' => $staff);
    }


    public function setcheckdate()
    {
        $check_id = $this->input->post('check_id');
        $type = $this->input->post('type');
        $save = $this->Attendence_m->set_check_date($check_id, $type);
        echo json_encode($save);
    }
}