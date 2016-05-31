<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Utils
{
    private $ci;

    public function __construct()
    {
        $this->ci = &get_instance();
    }

    public function view($file, $title = 'Hack A Space', $data = null)
    {
        if (is_null($data)) {
            $data = array();
        }
        $data['header_title'] = $title == 'Hack A Space' ? $title : ($title.' - Hack A Space');
        $this->ci->load->view('templates/header', $data);
        $this->ci->load->view($file);
        $this->ci->load->view('templates/footer');
    }

    /**
     * function used to check if input string matches input pattern.
     *
     * @param $str is the string to compare,
     *        $regex is the pattern to match,
     *        $return_on_success(optional) is the return value on success,
     *        $return_on_fail(optional) is the return value on failure.
     *
     * @return $return_on_success on string matches pattern,
     *                            $return_on_failure on string does not match pattern.
     */
    public function check($str, $regex, $return_on_success = true, $return_on_failure = false)
    {
        return preg_match($regex, $str) ? $return_on_success : $return_on_failure;
    }

    public function uriMatch($class_str, $method_str = '')
    {
        if ($class_str == 'Home') {
            $url_now = 'http://'.$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI'];
            if ($url_now == base_url()) {
                return true;
            }
        }
        $uri_str = explode('/', substr($_SERVER['REQUEST_URI'], 1));
        if (count($uri_str) == 1 && empty($method_str)) {
            return strcasecmp($uri_str[0], $class_str) == 0 ? true : false;
        } elseif (count($uri_str) > 1) {
            return strcasecmp($uri_str[0], $class_str) == 0 && strpos($uri_str[1], $method_str) !== false ? true : false;
        } else {
            return false;
        }
    }
    
    public function is_loggedin() {
	if (!isset($_SESSION)) {
            session_start();
        }
        if (!$_SESSION['user']->user_loggedin) {
            header('Location: '.site_url('error'));
            exit();
        }
    }
}
