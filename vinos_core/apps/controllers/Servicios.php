<?php

class Servicios extends MY_Controller
{

    public function __construct()
    {
        parent::__construct();
    }

    public function index()
    {
        $this->load->view('servicios_v', $this->data);
    }

}