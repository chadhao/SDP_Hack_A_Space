<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Install extends CI_Controller
{
    public function index()
    {
        $view_data['heading'] = 'Install Database';
        $view_data['message'] = $this->usersTable().$this->categoriesTable().$this->listingsTable();
        $this->utils->view('errors/html/error_general', 'Install Database', $view_data);
    }

    private function usersTable()
    {
        if ($this->db->table_exists('users')) {
            return '<p>Users table already exists!</p>';
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
                return '<p>Users tables created!</p>';
            } else {
                return '<p>Failed to create users tables!</p>';
            }
        }
    }

    private function categoriesTable()
    {
        if ($this->db->table_exists('categories')) {
            return '<p>Categories table already exists!</p>';
        } else {
            $this->load->dbforge();
            $fields = array(
                'id' => array(
                    'type' => 'INT',
                    'constraint' => 11,
                    'unsigned' => true,
                    'auto_increment' => true,
                ),
                'cname' => array(
                    'type' => 'VARCHAR',
                    'constraint' => 128,
                ),
            );
            $this->dbforge->add_field($fields);
            $this->dbforge->add_key('id', true);
            if ($this->dbforge->create_table('categories')) {
                return '<p>Categories tables created!</p>';
            } else {
                return '<p>Failed to create categories tables!</p>';
            }
        }
    }

    private function listingsTable()
    {
        if ($this->db->table_exists('listings')) {
            return '<p>Listings table already exists!</p>';
        } else {
            $this->load->dbforge();
            $fields = array(
                'id' => array(
                    'type' => 'INT',
                    'constraint' => 11,
                    'unsigned' => true,
                    'auto_increment' => true,
                ),
                'title' => array(
                    'type' => 'VARCHAR',
                    'constraint' => 128,
                ),
                'location' => array(
                    'type' => 'VARCHAR',
                    'constraint' => 512,
                ),
                'availability' => array(
                    'type' => 'VARCHAR',
                    'constraint' => 128,
                    'null' => true,
                ),
                'image' => array(
                    'type' => 'VARCHAR',
                    'constraint' => 128,
                    'null' => true,
                ),
                'description' => array(
                    'type' => 'VARCHAR',
                    'constraint' => 2048,
                ),
                'uploader' => array(
                    'type' => 'INT',
                    'constraint' => 11,
                    'unsigned' => true,
                ),
                'category' => array(
                    'type' => 'INT',
                    'constraint' => 11,
                    'unsigned' => true,
                ),
                'update_time' => array(
                    'type' => 'DATETIME',
                    'default' => '1000-01-01 00:00:00',
                ),
            );
            $this->dbforge->add_field($fields);
            $this->dbforge->add_key('id', true);
            if ($this->dbforge->create_table('listings')) {
                $fkey1 = 'ALTER TABLE listings ADD CONSTRAINT fk_uploader FOREIGN KEY (uploader) REFERENCES users(id)';
                $fkey2 = 'ALTER TABLE listings ADD CONSTRAINT fk_category FOREIGN KEY (category) REFERENCES categories(id)';
                if ($this->db->query($fkey1) && $this->db->query($fkey2)) {
                    return '<p>Listings tables created!</p>';
                } else {
                    $this->dbforge->drop_table('listings', true);

                    return '<p>Failed to create listings tables!</p>';
                }
            } else {
                return '<p>Failed to create listings tables!</p>';
            }
        }
    }
}
