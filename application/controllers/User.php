<?php

defined('BASEPATH') or exit('No direct script access allowed');

class User extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('UserModel');
    }

    public function signup()
    {
        $this->utils->view('UserSignUp', 'Sign Up');
    }

    public function signupProcess()
    {
        $user['fname'] = ucfirst(strtolower($_POST['inputFirstname']));
        $user['lname'] = ucfirst(strtolower($_POST['inputLastname']));
        $user['email'] = strtolower($_POST['inputEmail']);
        $user['password'] = md5($_POST['inputPassword']);

        if ($this->UserModel->addUser($user) === true) {
            if (!isset($_SESSION)) {
                session_start();
            } else {
                $_SESSION = array();
            }
            $_SESSION['user_loggedin'] = true;
            $_SESSION['user_fname'] = $user['fname'];
            header('Location: '.base_url());
            exit();
        } else {
            $view_data['heading'] = 'Oops! An error occurred...';
            $view_data['message'] = '<p>We cannot create your account.<br>It is probably because the email address you entered already exists.</p>';
            $this->utils->view('errors/html/error_general', 'Hack A Space', $view_data);
        }
    }

    public function login()
    {
        $this->utils->view('UserLogin', 'Login');
    }

    public function loginProcess()
    {
        $user['email'] = strtolower($_POST['inputEmail']);
        $user['password'] = md5($_POST['inputPassword']);

        if ($this->UserModel->verifyUser($user)) {
            $this_user = $this->UserModel->getUserByEmail($user['email']);
            if (!isset($_SESSION)) {
                session_start();
            } else {
                $_SESSION = array();
            }
            $_SESSION['user_loggedin'] = true;
            $_SESSION['user_fname'] = $this_user[0]->fname;
            header('Location: '.base_url());
            exit();
        } else {
            $view_data['heading'] = 'Oops! An error occurred...';
            $view_data['message'] = '<p>Login failed.<br>Your email does not exist or your password is wrong!</p>';
            $this->utils->view('errors/html/error_general', 'Hack A Space', $view_data);
        }
    }

    public function logout()
    {
        if (!isset($_SESSION)) {
            session_start();
        }
        $_SESSION = array();
        session_destroy();
        header('Location: '.base_url());
        exit();
    }
}
