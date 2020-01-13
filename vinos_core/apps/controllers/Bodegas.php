<?php

class Bodegas extends MY_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('Bodega_m');
        $this->load->model('Zone_m');
    }

    public function index()
    {
        $zone_id = trim($this->input->get('zone_id'));
    	$zones = $this->Zone_m->get_all_zone();
    	$this->data['zones'] = $zones['data'];
    	$bodegas = $this->Bodega_m->get_all_bodega($zone_id);
    	$this->data['bodegas'] = $bodegas['data'];
    	$this->data['current_zone'] = $zone_id;
        $this->load->view('bodegas_v', $this->data);
    }

}