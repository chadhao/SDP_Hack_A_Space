<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Listing extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('ListingModel');
        $this->load->model('CategoryModel');
    }

    public function index()
    {
        $view_data['heading'] = 'class Listing - index';
        $view_data['message'] = '<p>Listing index</p>';
        $this->utils->view('errors/html/error_general', 'Hack A Space', $view_data);
    }

    public function getListingById($lid)
    {
        $view_data['heading'] = 'class Listing - getListingById';
        $view_data['message'] = '<p>'.$lid.'</p>';
        $this->utils->view('errors/html/error_general', 'Hack A Space', $view_data);
    }

    public function getListingByCategory($cid)
    {
    }

    public function create()
    {
        $view_data['cats'] = $this->CategoryModel->getAllCategory();
        $this->utils->view('Listing_Create', 'Create Listing', $view_data);
    }

    public function uploadImage()
    {
        if (!empty($_FILES)) {
            $tempFile = $_FILES['file']['tmp_name'];
            $fileName = date('Ymd').md5(time().rand(0, 1000)).'.'.pathinfo($_FILES['file']['name'], PATHINFO_EXTENSION);
            $targetPath = getcwd().'/uploads/';
            $targetFile = $targetPath.$fileName;
            if (move_uploaded_file($tempFile, $targetFile)) {
                if (!isset($_SESSION)) {
                    session_start();
                }
                $_SESSION['uploaded_image'] = $fileName;
            }
        }
    }
}
