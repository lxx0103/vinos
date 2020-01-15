<?php

class Zone extends MY_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('Zone_m');
    }

    public function index()
    {
        $zones = $this->Zone_m->get_all_zone(false);
        $this->data['zones'] = $zones['data'];
        $this->load->view('admin/zone_list_v', $this->data);
    }


    public function one()
    {
        $id = trim($this->input->post('id'));
        $zone = $this->Zone_m->get_one_zone($id, false);
        echo json_encode($zone);
    }

    public function save()
    {
        $id = trim($this->input->post('id'));
        $name = trim($this->input->post('name'));
        $row = trim($this->input->post('row'));
        $is_show = trim($this->input->post('is_show'));
        $save = $this->Zone_m->save($id, $name, $row, $is_show, $this->session->username);
        echo json_encode($save);
    }


    public function del()
    {
        $id = trim($this->input->post('id'));
        $zone = $this->Zone_m->del($id);
        echo json_encode($zone);
    }






}