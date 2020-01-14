<?php

class Contact extends MY_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('Contacto_m');
    }

    public function index()
    {
        $contacts = $this->Contacto_m->get_all_contact();
        $this->data['contacts'] = $contacts['data'];
        $this->load->view('admin/contact_list_v', $this->data);
    }
}