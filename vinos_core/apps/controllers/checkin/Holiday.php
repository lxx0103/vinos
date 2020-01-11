<?php

class Holiday extends MY_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('checkin/Holiday_m');
        $this->load->model('organization/Department_m');
    }

    public function index()
    {
        $filters['target'] = trim($this->input->get('target'));
        $filters['dept_id'] = trim($this->input->get('dept_id'));
        $filters['staff_code'] = trim($this->input->get('staff_code'));
        $filters['type'] = trim($this->input->get('type'));
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
        $holidays = $this->Holiday_m->get_all_holiday($filters, false);
        $this->data['total'] = $holidays['total'];
        $this->data['filters'] = $filters;
        $this->data['holidays'] = $holidays['data'];
        $depts = $this->Department_m->get_all_dept();
        $sorted_depts = array();
        foreach ($depts['data'] as $row) 
        {
            $sorted_depts[$row['id']] = $row;
        }
        $this->data['depts'] = $depts['data'];
        $this->data['sorted_depts'] = $sorted_depts;
        $this->load->view('checkin/holiday_list_v', $this->data);
    }


    public function one()
    {
        $holiday_id = trim($this->input->post('holiday_id'));
        $holiday = $this->Holiday_m->get_one_holiday($holiday_id, false);
        echo json_encode($holiday);
    }

    public function save()
    {
        $holiday_id = trim($this->input->post('holiday_id'));
        $target = trim($this->input->post('target'));
        $dept_id = trim($this->input->post('dept_id'));
        $staff_code = trim($this->input->post('staff_code'));
        $holiday = trim($this->input->post('holiday'));
        $hours = trim($this->input->post('hours'));
        $type = trim($this->input->post('type'));
        $is_enable = trim($this->input->post('is_enable'));
        $save = $this->Holiday_m->save($holiday_id, $target, $dept_id, $staff_code, $holiday, $hours, $type, $is_enable, $this->session->username);
        echo json_encode($save);
    }






}