<?php

class Department extends MY_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('organization/Department_m');
    }

    public function index()
    {
        $depts = $this->Department_m->get_all_dept(false);
        $this->data['depts'] = $depts['data'];
        $this->load->view('organization/department_list_v', $this->data);
    }


    public function one()
    {
        $dept_id = trim($this->input->post('dept_id'));
        $dept = $this->Department_m->get_one_dept($dept_id, false);
        echo json_encode($dept);
    }

    public function save()
    {
        $dept_id = trim($this->input->post('dept_id'));
        $dept_name = trim($this->input->post('dept_name'));
        $is_enable = trim($this->input->post('is_enable'));
        $save = $this->Department_m->save($dept_id, $dept_name, $is_enable, $this->session->username);
        echo json_encode($save);
    }






}