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
        $this->utils->view('User_SignUp', 'Sign Up');
    }

    public function signupProcess()
    {
        $result = $this->validataSignupForm();
        if (!empty($result)) {
            $view_data['heading'] = 'Oops! An error occurred...';
            $view_data['message'] = '<p>'.$result.'</p>';
            $this->utils->view('errors/html/error_general', 'Hack A Space', $view_data);
        } else {
            $user['fname'] = ucfirst(strtolower($_POST['inputFirstname']));
            $user['lname'] = ucfirst(strtolower($_POST['inputLastname']));
            $user['email'] = strtolower($_POST['inputEmail']);
            $user['password'] = md5($_POST['inputPassword']);
            $user['is_admin'] = 0;

            if ($this->UserModel->addUser($user) === true) {
                if (!isset($_SESSION)) {
                    session_start();
                } else {
                    $_SESSION = array();
                }
                $_SESSION['user_loggedin'] = true;
                $_SESSION['user'] = $this->UserModel->getUser($user['email']);
                header('Location: '.base_url());
                exit();
            } else {
                $view_data['heading'] = 'Oops! An error occurred...';
                $view_data['message'] = '<p>We cannot create your account.<br>It is probably because the email address you entered already exists.</p>';
                $this->utils->view('errors/html/error_general', 'Hack A Space', $view_data);
            }
        }
    }

    private function validataSignupForm()
    {
        $msg = !filter_var(strtolower($_POST['inputEmail']), FILTER_VALIDATE_EMAIL) ? 'Email address is invalid!<br>' : '';
        $msg = $msg.(md5($_POST['inputPassword']) != md5($_POST['inputConfirmPassword']) ? 'Password does not match confirm password!<br>' : '');

        return $msg;
    }

    public function login()
    {
        $this->utils->view('User_Login', 'Login');
    }

    public function loginProcess()
    {
        $user['email'] = strtolower($_POST['inputEmail']);
        $user['password'] = md5($_POST['inputPassword']);

        if ($this->UserModel->verifyUser($user)) {
            if (!isset($_SESSION)) {
                session_start();
            } else {
                $_SESSION = array();
            }
            $_SESSION['user'] = $this->UserModel->getUser($user['email']);
            $_SESSION['user_loggedin'] = true;
            if ($_SESSION['user']->is_admin) {
                header('Location: '.site_url('Admin'));
                exit();
            }
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
