<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Test extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('ListingModel');
    }

    public function index()
    {
        if (!isset($_SESSION)) {
            session_start();
        }
        $view_data['input'] = '$_SESSION';
        $view_data['result'] = $_SESSION;
        $this->utils->view('testmsg', 'App Test', $view_data);
    }

    public function cs()
    {
        if (!isset($_SESSION)) {
            session_start();
        }
        $_SESSION = array();
        session_destroy();
    }
}
