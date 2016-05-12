<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Install extends CI_Controller
{
    public function index()
    {
        $view_data['heading'] = 'Install Database';
        if ($this->db->table_exists('users')) {
            $view_data['message'] = '<p>Table already exists!</p>';
        } else {
            $this->load->dbforge();
            $fields = array(
        'id' => array(
            'type' => 'INT',
            'constraint' => 11,
            'unsigned' => true,
            'auto_increment' => true,
        ),
        'fname' => array(
            'type' => 'VARCHAR',
            'constraint' => 128,
        ),
        'lname' => array(
            'type' => 'VARCHAR',
            'constraint' => 128,
        ),
        'email' => array(
            'type' => 'VARCHAR',
            'constraint' => 128,
        ),
        'password' => array(
            'type' => 'VARCHAR',
            'constraint' => 32,
        ),
        'is_admin' => array(
            'type' => 'BOOLEAN',
        ),
        );
            $this->dbforge->add_field($fields);
            $this->dbforge->add_key('id', true);
            if ($this->dbforge->create_table('users')) {
                $view_data['message'] = '<p>Tables created!</p>';
            } else {
                $view_data['message'] = '<p>Failed to create tables!</p>';
            }
        }
        $this->utils->view('errors/html/error_general', 'Install Database', $view_data);
    }
}
