<?php

class Home extends CI_Controller
{
    public function index()
    {
        $view_data['header_title'] = 'Hack A Space';
        $this->load->view('templates/header', $view_data);
        $this->load->view('Home');
        $this->load->view('templates/footer');
    }
}
