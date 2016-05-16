<?php

class UTest extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('UserModel');
        $this->load->library('unit_test');
    }

    public function index()
    {
        $this->unit->run($this->UserModel->userExist('haoduan@outlook.com'),
        true,
        'userExist() - Testing with existent user',
        'Expected result: TRUE');

        $this->unit->run($this->UserModel->userExist('abc@abc.com'),
        false,
        'userExist() - Testing with non-existent user',
        'Expected result: FALSE');

        $this->unit->run($this->UserModel->verifyUser(array('email' => 'abc@abc.com', 'password' => 'abc123')),
        false,
        'verifyUser() - Testing with non-existent user',
        'Expected result: FALSE');

        $this->unit->run($this->UserModel->verifyUser(array('email' => 'haoduan@outlook.com', 'password' => md5('abc123'))),
        false,
        'verifyUser() - Testing with existent user and wrong password',
        'Expected result: FALSE');

        $this->unit->run($this->UserModel->verifyUser(array('email' => 'haoduan@outlook.com', 'password' => md5('fufeng'))),
        true,
        'verifyUser() - Testing with existent user and right password',
        'Expected result: TRUE');

        echo $this->unit->report();
    }
}
