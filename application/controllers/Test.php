<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Test extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('UserModel');
    }

    public function index()
    {
        $view_data['input'] = 'base_url';
        $view_data['result'] = base_url();
        $this->utils->view('testmsg', 'App Test', $view_data);
    }
}
