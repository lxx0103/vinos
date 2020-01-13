<?php

class Legal extends MY_Controller
{

    public function __construct()
    {
        parent::__construct();
    }

    public function index()
    {
        $this->load->view('legal_v', $this->data);
    }

}