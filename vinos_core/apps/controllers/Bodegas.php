<?php

class Bodegas extends MY_Controller
{

    public function __construct()
    {
        parent::__construct();
    }

    public function index()
    {
        $this->load->view('bodegas_v', $this->data);
    }

}