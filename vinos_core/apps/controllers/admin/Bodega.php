<?php

class Bodega extends MY_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('Bodega_m');
        $this->load->model('Zone_m');
    }

    public function index()
    {
        $bodegas = $this->Bodega_m->get_all_bodega(false);
        $this->data['bodegas'] = $bodegas['data'];

        $zones = $this->Zone_m->get_all_zone();
        $sorted_zones = array();
        foreach ($zones['data'] as $row) 
        {
            $sorted_zones[$row['id']] = $row;
        }
        $this->data['zones'] = $zones['data'];
        $this->data['sorted_zones'] = $sorted_zones;
        $this->load->view('admin/bodega_list_v', $this->data);
    }


    public function one()
    {
        $id = trim($this->input->post('id'));
        $bodega = $this->Bodega_m->get_one_bodega($id, false);
        echo json_encode($bodega);
    }

    public function save()
    {
        $id = trim($this->input->post('id'));
        $name = trim($this->input->post('name'));
        $zone_id = trim($this->input->post('zone_id'));
        $img = trim($this->input->post('img'));
        $url = trim($this->input->post('url'));
        $desc = trim($this->input->post('desc'));
        $is_show = trim($this->input->post('is_show'));
        $save = $this->Bodega_m->save($id, $name, $zone_id, $img, $url, $desc, $is_show, $this->session->username);
        echo json_encode($save);
    }

    public function del()
    {
        $id = trim($this->input->post('id'));
        $bodega = $this->Bodega_m->del($id);
        echo json_encode($bodega);
    }






}