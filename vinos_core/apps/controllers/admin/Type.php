<?php

class Type extends MY_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('Type_m');
    }

    public function index()
    {
        $types = $this->Type_m->get_all_type(false);
        $this->data['types'] = $types['data'];
        $this->load->view('admin/type_list_v', $this->data);
    }


    public function one()
    {
        $id = trim($this->input->post('id'));
        $type = $this->Type_m->get_one_type($id, false);
        echo json_encode($type);
    }

    public function save()
    {
        $id = trim($this->input->post('id'));
        $name = trim($this->input->post('name'));
        $row = trim($this->input->post('row'));
        $is_show = trim($this->input->post('is_show'));
        $save = $this->Type_m->save($id, $name, $row, $is_show, $this->session->username);
        echo json_encode($save);
    }






}