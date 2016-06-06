<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Listing extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('ListingModel');
        $this->load->model('CategoryModel');
        $this->load->model('UserModel');
    }

    public function index()
    {
        $view_data['heading'] = 'class Listing - index';
        $view_data['message'] = '<p>Listing index</p>';
        $this->utils->view('errors/html/error_general', 'Hack A Space', $view_data);
    }

    public function getListingById($lid)
    {
        $listing = $this->ListingModel->getListing(intval($lid));
        if ($listing) {
            $user = $this->UserModel->getUser($listing->uploader);
            $view_data['uploader'] = $user->fname.' '.$user->lname;
            $view_data['listing'] = $listing;
            $this->utils->view('Listing_Profile', $listing->title, $view_data);
        } else {
            $view_data['heading'] = 'Oops! An error occurred...';
            $view_data['message'] = '<p>Requested listing cannot be found!</p>';
            $this->utils->view('errors/html/error_general', 'Hack A Space', $view_data);
        }
    }

    public function getListingByCategory($cid)
    {
    }

    public function create()
    {
        $this->utils->is_loggedin();
        $view_data['cats'] = $this->CategoryModel->getAllCategory();
        $this->utils->view('Listing_Create', 'Create Listing', $view_data);
    }

    public function createProcess()
    {
        if (!isset($_SESSION)) {
            session_start();
        }
        $listing_data['title'] = $_POST['inputTitle'];
        $listing_data['location'] = $_POST['inputLocation'];
        $listing_data['availability'] = $_POST['inputAvailability'];
        $listing_data['image'] = $_SESSION['uploaded_image'];
        $listing_data['description'] = $_POST['inputDescription'];
        $listing_data['uploader'] = intval($_SESSION['user']->id);
        $listing_data['category'] = empty($_POST['inputCategory']) ? 0 : intval($_POST['inputCategory']);
        $listing_data['update_time'] = date('Y-m-d H:i:s');

        $vlisting = $this->ListingModel->validateInput($listing_data);
        if ($vlisting === true) {
            if ($this->ListingModel->addListing($listing_data)) {
                unset($_SESSION['uploaded_image']);
                header('Location: '.base_url());
                exit();
            } else {
                $view_data['heading'] = 'Oops! An error occurred...';
                $view_data['message'] = '<p>Failed creating listing!</p>';
                $this->utils->view('errors/html/error_general', 'Hack A Space', $view_data);
            }
        } else {
            $view_data['heading'] = 'Oops! An error occurred...';
            $view_data['message'] = '<p>'.$vlisting.'</p>';
            $this->utils->view('errors/html/error_general', 'Hack A Space', $view_data);
        }
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
