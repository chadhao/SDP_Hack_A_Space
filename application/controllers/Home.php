<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Home extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
    }

    public function index()
    {
        if (!isset($_SESSION)) {
            session_start();
        }
        $header_data['header_title'] = 'Hack A Space';
        $this->load->view('templates/header_home', $header_data);
        $this->load->view('Home');
        $this->load->view('templates/footer');
    }

    public function error()
    {
        if (!isset($_SESSION)) {
            session_start();
        }
        if (!isset($_SESSION['user_loggedin']) || !$_SESSION['user_loggedin']) {
            $data['heading'] = 'Warning!';
            $data['message'] = '<p>You need to <a href="'.site_url('user/login').'">login</a> to access this page!</p>';
            $this->utils->view('errors/html/error_general', 'Hack A Space', $data);
        }
    }
}
