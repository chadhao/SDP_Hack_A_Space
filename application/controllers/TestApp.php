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
        $view_data['input'] = $this->UserModel->getUser(6);
        $view_data['result'] = (array) $this->UserModel->getUser(6);
        $this->utils->view('testmsg', 'App Test', $view_data);
    }
}
