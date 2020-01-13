<?php

class Nosotros extends MY_Controller
{

    public function __construct()
    {
        parent::__construct();
    }

    public function index()
    {
        $this->load->view('nosotros_v', $this->data);
    }

}