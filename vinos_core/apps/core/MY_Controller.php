<?php

class MY_Controller extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->data = array();
        $this->load->model('Menu_m');
        $menu = $this->Menu_m->get_all_menu();
        $this->data['menus'] = $menu['data'];
        $this->data['current_menu'] = $this->router->class;
    }

}