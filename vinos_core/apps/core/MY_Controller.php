<?php

class MY_Controller extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->data = array();
        $this->check_login();
    }

    private function check_login()
    {
    	$directory_name = trim($this->router->fetch_directory(), '/');
    	if($directory_name == 'admin'){
	        if($this->session->is_logged_in === 1)
	        {
        		$this->load->model('admin/Menu_m_b');
        		$this->get_menus();
	            $this->data['user'] = array();
	            $this->data['user']['username'] = $this->session->username;

                //get current menu
                $directory_name = trim($this->router->fetch_directory(), '/');
                $class_name = $this->router->fetch_class();
                $method_name = $this->router->fetch_method();
                $menu = $this->Menu_m_b->get_one_menu($directory_name, $class_name, $method_name);
                $this->data['current_menu'] = $menu['data'];
	        }else
	        {
	            redirect('admin/login');
	        }

    	}else{            
            $this->load->model('Menu_m');
            $menu = $this->Menu_m->get_all_menu();
            $this->data['menus'] = $menu['data'];
            $this->data['current_menu'] = $this->router->class;
        }
    }

    private function get_menus()
    {
        $menus = $this->Menu_m_b->get_all_menu();
        if($menus['status'] == 1)
        {
            $sorted_menus = array();
            foreach ($menus['data'] as $row) 
            {
                $sorted_menus[$row['id']] = $row;
            }
            $menu_level = array();
            foreach ($sorted_menus as $key => $value)
            {
                if($value['parent_id'] == 0)
                {
                    if($value['is_hidden'] == 0)
                    {
                        $menu_level[$key] = $value;
                    }                    
                }
                elseif(isset($sorted_menus[$value['parent_id']]) && $sorted_menus[$value['parent_id']]['is_hidden'] == 0)
                {
                    if($value['is_hidden'] == 0)
                    {
                        $menu_level[$value['parent_id']]['child'][] = $value;
                    }
                }
            }
            $this->data['menus'] = $menu_level;

        }else
        {
            $this->data['menus'] = array();
        }
    }

}