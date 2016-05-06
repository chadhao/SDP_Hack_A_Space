<?php

class User extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('UserModel');
    }

    public function signup()
    {
        $view_data['header_title'] = 'Sign Up - Hack A Space';
        $this->load->view('templates/header', $view_data);
        $this->load->view('UserSignUp');
        $this->load->view('templates/footer');
    }

    public function signupProcess()
    {
        $user['fname'] = $_POST['inputFirstname'];
        $user['lname'] = $_POST['inputLastname'];
        $user['email'] = $_POST['inputEmail'];
        $user['password'] = md5($_POST['inputPassword']);

        return $this->UserModel->addUser($user);
    }
}
