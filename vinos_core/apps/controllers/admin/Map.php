<?php

class Map extends MY_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('Map_m');
        $this->load->model('Zone_m');
    }

    public function index()
    {
        $maps = $this->Map_m->get_all_map(0, false);
        $this->data['maps'] = $maps['data'];
        $zones = $this->Zone_m->get_all_zone();
        $sorted_zones = array();
        foreach ($zones['data'] as $row) 
        {
            $sorted_zones[$row['id']] = $row;
        }
        $this->data['zones'] = $zones['data'];
        $this->data['sorted_zones'] = $sorted_zones;
        $this->load->view('admin/map_list_v', $this->data);
    }


    public function one()
    {
        $id = trim($this->input->post('id'));
        $map = $this->Map_m->get_one_map($id, false);
        echo json_encode($map);
    }

    public function save()
    {
        $id = trim($this->input->post('id'));
        $zone_id = trim($this->input->post('zone_id'));
        $img = trim($this->input->post('img'));
        $save = $this->Map_m->save($id, $zone_id, $img, $this->session->username);
        echo json_encode($save);
    }






}