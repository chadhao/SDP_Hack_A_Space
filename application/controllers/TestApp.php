<?php

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
        $view_data['header_title'] = 'App Test';
        $view_data['input'] = $user;
        $view_data['result'] = $this->UserModel->addUser($user);
        $this->load->view('templates/header', $view_data);
        $this->load->view('testmsg', $view_data);
        $this->load->view('templates/footer');
    }
}
