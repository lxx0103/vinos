<?php

class Contacto extends MY_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('Contacto_m');
    }

    public function index()
    {
        $this->load->view('contacto_v', $this->data);
    }

    public function save()
    {    	
        $name = trim($this->input->post('name'));
        $email = trim($this->input->post('email'));
        $phone = trim($this->input->post('phone'));
        $message = trim($this->input->post('message'));
        $save = $this->Contacto_m->save('', $name, $email, $phone, $message);
        echo json_encode($save);
    }

}