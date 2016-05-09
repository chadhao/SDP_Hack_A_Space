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
}
