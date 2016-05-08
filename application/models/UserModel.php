<?php

class UserModel extends CI_Model
{
    private static $table_name = 'users';

    public function getAllUser()
    {
        return $this->db->get('user');
    }

    /**
     * function used to add new user.
     *
     * @return false : SQL execution failure, 1 : email exists
     */
    public function addUser($user)
    {
        if ($this->emailExist($user['email'])) {
            return 1;
        }

        return $this->db->insert(self::$table_name, $user);
    }

    private function emailExist($email)
    {
        return $this->db->get_where(self::$table_name, array('email' => $email))->conn_id->affected_rows;
    }
    
    public function verifyUser($user) {
	return $this->db->get_where(self::$table_name, array('email' => $user['email'], 'password' => $user['password']))->conn_id->affected_rows>0?TRUE:FALSE;
    }
    
    public function getUserByEmail($email) {
	return $this->db->get_where(self::$table_name, array('email' => $email))->result();
    }
}
