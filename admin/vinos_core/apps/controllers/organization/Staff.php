<?php

class Staff extends MY_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('organization/Staff_m');
        $this->load->model('organization/Department_m');
        $this->load->model('organization/Position_m');
    }

    public function index()
    {
        $filters['dept_id'] = trim($this->input->get('dept_id'));
        $filters['name'] = trim($this->input->get('name'));
        $filters['staff_code'] = trim($this->input->get('staff_code'));
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
        $staff = $this->Staff_m->get_all_staff($filters, false);
        $this->data['total'] = $staff['total'];
        $this->data['filters'] = $filters;
        $this->data['staff'] = $staff['data'];
        $this->data['query_str'] = $query_str;
        $depts = $this->Department_m->get_all_dept();
        $sorted_depts = array();
        foreach ($depts['data'] as $row) 
        {
            $sorted_depts[$row['id']] = $row;
        }
        $this->data['depts'] = $depts['data'];
        $this->data['sorted_depts'] = $sorted_depts;
        $positions = $this->Position_m->get_all_position();
        $sorted_positions = array();
        foreach ($positions['data'] as $row) 
        {
            $sorted_positions[$row['id']] = $row;
        }
        $this->data['positions'] = $positions['data'];
        $this->data['sorted_positions'] = $sorted_positions;
        $this->load->view('organization/staff_list_v', $this->data);
    }


    public function one()
    {
        $staff_id = trim($this->input->post('staff_id'));
        $staff = $this->Staff_m->get_staff_by_id($staff_id, false);
        echo json_encode($staff);
    }

    public function save()
    {
        $staff_id = trim($this->input->post('staff_id'));
        $staff_code = trim($this->input->post('staff_code'));
        $name = trim($this->input->post('name'));
        $gender = trim($this->input->post('gender'));
        $dept_id = trim($this->input->post('dept_id'));
        $position_id = trim($this->input->post('position_id'));
        $phone = trim($this->input->post('phone'));
        $mobile = trim($this->input->post('mobile'));
        $birthday = trim($this->input->post('birthday'));
        $address = trim($this->input->post('address'));
        $in_date = trim($this->input->post('in_date'));
        $out_date = trim($this->input->post('out_date'));
        $is_enable = trim($this->input->post('is_enable'));
        $save = $this->Staff_m->save($staff_id, $staff_code, $name, $gender, $dept_id, $position_id, $phone, $mobile, $birthday, $address, $in_date, $out_date, $is_enable, $this->session->username);
        echo json_encode($save);
    }






}