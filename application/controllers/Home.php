<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Home extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('ListingModel');
    }

    public function index()
    {
        if (!$this->utils->installed()) {
            header('Location: '.site_url('install'));
            exit();
        }
        if (!isset($_SESSION)) {
            session_start();
        }
        $header_data['header_title'] = 'Hack A Space';
        $body_data['listings'] = $this->ListingModel->getLatestListing();
        $this->load->view('templates/header_home', $header_data);
        $this->load->view('Home', $body_data);
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
