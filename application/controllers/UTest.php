<?php

class UTest extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('UserModel');
        $this->load->model('CategoryModel');
        $this->load->model('ListingModel');
        $this->load->library('unit_test');
    }

    public function index()
    {
        echo '<h2>Unit Test</h2>';
        $this->s1();
        $this->s2();
        echo $this->unit->report();
    }

    private function s1()
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
    }

    private function s2()
    {
        $this->unit->run($this->CategoryModel->categoryExist('Garden'),
        true,
        'categoryExist() - Testing with existent category',
        'Expected result: TRUE');

        $this->unit->run($this->ListingModel->listingExist('1'),
        true,
        'listingExist() - Testing with existent listing',
        'Expected result: TRUE');
    }
}
