<?php

class Home extends CI_Controller
{
    public function index()
    {
        if (!isset($_SESSION)) {
            session_start();
        }
        $view_data['header_title'] = 'Hack A Space';
        $this->load->view('templates/header', $view_data);
        $this->load->view('Home');
        $this->load->view('templates/footer');
    }
}
