<?php

class Vinos extends MY_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('Vino_m');
        $this->load->model('Type_m');
    }

    public function index()
    {
        $type_id = trim($this->input->get('type_id'));
    	$types = $this->Type_m->get_all_type();
    	$this->data['types'] = $types['data'];
    	$vinos = $this->Vino_m->get_all_vino($type_id);
    	$this->data['vinos'] = $vinos['data'];
    	$this->data['current_type'] = $type_id;
        $this->load->view('vinos_v', $this->data);
    }

}