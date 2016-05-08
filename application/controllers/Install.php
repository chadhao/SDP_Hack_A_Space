<?php

class Install extends CI_Controller
{
    public function index()
    {
        $view_data['header_title'] = 'Install Database';
        if ($this->db->table_exists('users')) {
            $view_data['msg'] = 'Table already exists!';
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
        );
            $this->dbforge->add_field($fields);
            $this->dbforge->add_key('id', true);
            if ($this->dbforge->create_table('users')) {
                $view_data['msg'] = 'Tables created!';
            } else {
                $view_data['msg'] = 'Failed to create tables!';
            }
        }
        $this->load->view('templates/header', $view_data);
        $this->load->view('Install', $view_data);
        $this->load->view('templates/footer');
    }
}
