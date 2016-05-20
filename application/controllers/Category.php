<?php

class Category extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('CategoryModel');
    }
    public function index()
    {
        $view_data['cats'] = $this->CategoryModel->getAllCategory();
        $this->utils->view('Cat_AllCatList', 'All Categories', $view_data);
    }
}
