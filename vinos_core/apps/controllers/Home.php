<?php

class Home extends MY_Controller
{

    public function __construct()
    {
        parent::__construct();
    }

    public function index()
    {
        $this->load->view('home_v', $this->data);
    }

    public function privilege()
    {
        if(isset($_SERVER["HTTP_X_REQUESTED_WITH"]) && strtolower($_SERVER["HTTP_X_REQUESTED_WITH"])=="xmlhttprequest"){ 
            echo json_encode(array('status' => 2, 'msg' => '没有权限')); 
        }else{ 
            $this->load->view('errors/privilege_v', $this->data);
        };
    }



    public function exists()
    {
        if(isset($_SERVER["HTTP_X_REQUESTED_WITH"]) && strtolower($_SERVER["HTTP_X_REQUESTED_WITH"])=="xmlhttprequest"){ 
            echo json_encode(array('status' => 2, 'msg' => '文件不存在')); 
        }else{ 
            $this->load->view('errors/exists_v', $this->data);
        };
    }




}