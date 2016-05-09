<?php

defined('BASEPATH') or exit('No direct script access allowed');

class TestApp extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('UserModel');
    }

    public function test()
    {
        $user['fname'] = 'Chad';
        $user['lname'] = 'Hao';
        $user['email'] = 'chadhao@gmail.com';
        $user['password'] = md5('haoduan0812');
        $view_data['input'] = $user;
        $view_data['result'] = $this->UserModel->addUser($user);
        $this->utils->view('testmsg', 'App Test', $view_data);
    }
}
