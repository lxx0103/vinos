<?php

class Index extends MY_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('Slide_m');
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
        $this->load->view('index_v', $this->data);
    }

}