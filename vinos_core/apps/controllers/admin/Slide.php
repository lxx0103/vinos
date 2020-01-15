<?php

class Slide extends MY_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('Slide_m');
    }

    public function index()
    {
        $slides = $this->Slide_m->get_all_slide(0, false);
        $this->data['slides'] = $slides['data'];
        $this->load->view('admin/slide_list_v', $this->data);
    }


    public function one()
    {
        $id = trim($this->input->post('id'));
        $slide = $this->Slide_m->get_one_slide($id, false);
        echo json_encode($slide);
    }

    public function save()
    {
        $id = trim($this->input->post('id'));
        $type = trim($this->input->post('type'));
        $img = trim($this->input->post('img'));
        $url = trim($this->input->post('url'));
        $desc = trim($this->input->post('desc'));
        $is_show = trim($this->input->post('is_show'));
        $save = $this->Slide_m->save($id, $type, $img, $url, $desc, $is_show, $this->session->username);
        echo json_encode($save);
    }


    public function del()
    {
        $id = trim($this->input->post('id'));
        $slide = $this->Slide_m->del($id);
        echo json_encode($slide);
    }

}