<?php

class Vino extends MY_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('Vino_m');
        $this->load->model('Type_m');
    }

    public function index()
    {
        $vinos = $this->Vino_m->get_all_vino(false);
        $this->data['vinos'] = $vinos['data'];

        $types = $this->Type_m->get_all_type();
        $sorted_types = array();
        foreach ($types['data'] as $row) 
        {
            $sorted_types[$row['id']] = $row;
        }
        $this->data['types'] = $types['data'];
        $this->data['sorted_types'] = $sorted_types;
        $this->load->view('admin/vino_list_v', $this->data);
    }


    public function one()
    {
        $id = trim($this->input->post('id'));
        $vino = $this->Vino_m->get_one_vino($id, false);
        echo json_encode($vino);
    }

    public function save()
    {
        $id = trim($this->input->post('id'));
        $name = trim($this->input->post('name'));
        $type_id = trim($this->input->post('type_id'));
        $img = trim($this->input->post('img'));
        $url = trim($this->input->post('url'));
        $desc = trim($this->input->post('desc'));
        $is_show = trim($this->input->post('is_show'));
        $save = $this->Vino_m->save($id, $name, $type_id, $img, $url, $desc, $is_show, $this->session->username);
        echo json_encode($save);
    }






}