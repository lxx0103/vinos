<?php

class Index extends MY_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('Slide_m');
        $this->load->model('Map_m');
        $this->load->model('Zone_m');
    }

    public function index()
    {
    	$slides = $this->Slide_m->get_all_slide();
    	foreach ($slides['data'] as $row) {
    		if($row['type'] == 1){
    			$this->data['slides']['type_1'][] = $row;
    		}
    		elseif($row['type'] == 2){
    			$this->data['slides']['type_2'][] = $row;
    		}
    		elseif($row['type'] == 3){
    			$this->data['slides']['type_3'][] = $row;
    		}
    		elseif($row['type'] == 4){
    			$this->data['slides']['type_4'][] = $row;
    		}
    		elseif($row['type'] == 5){
    			$this->data['slides']['type_5'][] = $row;
    		}
    		elseif($row['type'] == 6){
    			$this->data['slides']['type_6'][] = $row;
    		}
    	}        
        $maps = $this->Map_m->get_all_map();
        $this->data['maps'] = $maps['data'];
        $zones = $this->Zone_m->get_all_zone();
        $sorted_zones = array();
        foreach ($zones['data'] as $row) 
        {
            $sorted_zones[$row['id']] = $row;
        }
        $this->data['zones'] = $zones['data'];
        $this->data['sorted_zones'] = $sorted_zones;
        $this->load->view('index_v', $this->data);
    }

}