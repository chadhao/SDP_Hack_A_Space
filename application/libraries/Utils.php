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
     *         $return_on_failure on string does not match pattern.
     */
    public function check($str, $regex, $return_on_success = true, $return_on_failure = false)
    {
        return preg_match($regex, $str) ? $return_on_success : $return_on_failure;
    }
}
