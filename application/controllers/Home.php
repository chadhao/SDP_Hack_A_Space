<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Home extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
    }
    public function index()
    {
        if (!isset($_SESSION)) {
            session_start();
        }
        $this->utils->view('Home');
    }
}
