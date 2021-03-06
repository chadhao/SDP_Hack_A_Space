<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Admin extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('UserModel');
        $this->load->model('CategoryModel');
    }

    private function is_admin()
    {
        if (!isset($_SESSION)) {
            session_start();
        }
        if (!$_SESSION['user']->is_admin) {
            header('Location: '.site_url('Admin/error'));
            exit();
        }
    }

    public function error()
    {
        $data['heading'] = 'Warning!';
        $data['message'] = '<p>You do not have permissions to access admin panel!</p>';
        $this->utils->view('errors/html/error_general', 'Hack A Space', $data);
    }

    public function index($where)
    {
        $this->is_admin();
        header('Location: '.site_url('Admin/dashboard'));
        exit();
    }

    public function dashboard()
    {
        $this->is_admin();
        $this->utils->view('Admin_Dashboard', 'Dashboard');
    }

    public function user()
    {
        $this->is_admin();
        $result = $this->UserModel->getAllUser();
        $data['users'] = empty($result) ? false : $result;
        $this->utils->view('Admin_UserList', 'User List', $data);
    }

    public function userDelete($id)
    {
        $this->is_admin();
        if ($this->UserModel->deleteUser($id)) {
            header('Location: '.site_url('Admin/user'));
            exit();
        } else {
            $data['heading'] = 'Oops! An error occurred...';
            $data['message'] = '<p>There is an error occurred while deleting user.</p>';
            $this->utils->view('errors/html/error_general', 'Hack A Space', $data);
        }
    }

    public function userEdit($id)
    {
        $this->is_admin();
        if ($this->UserModel->userExist($id)) {
            $data['user'] = $this->UserModel->getUser($id, 'id, fname, lname, email, is_admin');
            $this->utils->view('Admin_EditUser', 'Edit User', $data);
        } else {
            header('Location: '.site_url('Admin/user'));
            exit();
        }
    }

    public function userEditProcess($id)
    {
        $this->is_admin();
        if ($this->UserModel->userExist($id)) {
            $userOrigin = (array) $this->UserModel->getUser($id);
            unset($userOrigin['id']);
            $user['fname'] = ucfirst(strtolower($_POST['inputFirstname']));
            $user['lname'] = ucfirst(strtolower($_POST['inputLastname']));
            $user['email'] = strtolower($_POST['inputEmail']);
            if (empty($_POST['inputPassword'])) {
                unset($userOrigin['password']);
            } else {
                $user['password'] = md5($_POST['inputPassword']);
            }
            $user['is_admin'] = isset($_POST['inputIsAdmin']) ? '1' : '0';
            if (count(array_diff($user, $userOrigin)) == 0) {
                $data['heading'] = 'Oops! An error occurred...';
                $data['message'] = '<p>No change has been made to this user.</p>';
                $this->utils->view('errors/html/error_general', 'Hack A Space', $data);
            } else {
                if ($this->UserModel->updateUser($id, $user)) {
                    header('Location: '.site_url('Admin/user'));
                    exit();
                } else {
                    $data['heading'] = 'Oops! An error occurred...';
                    $data['message'] = '<p>There is an error occurred while updating user.</p>';
                    $this->utils->view('errors/html/error_general', 'Hack A Space', $data);
                }
            }
        } else {
            $data['heading'] = 'Oops! An error occurred...';
            $data['message'] = '<p>There is an error occurred while updating user.</p>';
            $this->utils->view('errors/html/error_general', 'Hack A Space', $data);
        }
    }

    public function category()
    {
        $this->is_admin();
        $result = $this->CategoryModel->getAllCategory();
        $data['cats'] = empty($result) ? false : $result;
        $this->utils->view('Admin_CategoryList', 'Category List', $data);
    }

    public function categoryEdit($cid)
    {
        $this->is_admin();
        if ($this->CategoryModel->categoryExist($cid)) {
            $data['caction'] = 'edit';
            $data['cid'] = $cid;
            $data['cname'] = $this->CategoryModel->getCategory($cid)->cname;
            $this->utils->view('Admin_CategoryForm', 'Edit Category', $data);
        } else {
            header('Location: '.site_url('Admin/category'));
            exit();
        }
    }

    public function categoryAdd()
    {
        $this->is_admin();
        $data['caction'] = 'add';
        $this->utils->view('Admin_CategoryForm', 'Add Category', $data);
    }

    public function categoryProcess($caction)
    {
        $this->is_admin();
        if ($caction == 'add') {
            if ($this->CategoryModel->categoryExist($_POST['inputCName'])) {
                $data['heading'] = 'Oops! An error occurred...';
                $data['message'] = '<p>The category name already exists.</p>';
                $this->utils->view('errors/html/error_general', 'Hack A Space', $data);
            } else {
                if ($this->CategoryModel->addCategory($_POST['inputCName'])) {
                    header('Location: '.site_url('Admin/category'));
                    exit();
                } else {
                    $data['heading'] = 'Oops! An error occurred...';
                    $data['message'] = '<p>There is an error occurred while adding category.</p>';
                    $this->utils->view('errors/html/error_general', 'Hack A Space', $data);
                }
            }
        } else {
            if ($this->CategoryModel->updateCategory($caction, $_POST['inputCName'])) {
                header('Location: '.site_url('Admin/category'));
                exit();
            } else {
                $data['heading'] = 'Oops! An error occurred...';
                $data['message'] = '<p>There is an error occurred while updating category.</p>';
                $this->utils->view('errors/html/error_general', 'Hack A Space', $data);
            }
        }
    }

    public function categoryDelete($cid)
    {
        $this->is_admin();
        if ($this->CategoryModel->deleteCategory($cid)) {
            header('Location: '.site_url('Admin/category'));
            exit();
        } else {
            $data['heading'] = 'Oops! An error occurred...';
            $data['message'] = '<p>There is an error occurred while deleting category.</p>';
            $this->utils->view('errors/html/error_general', 'Hack A Space', $data);
        }
    }
}
