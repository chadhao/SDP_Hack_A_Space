<?php

class UserModel extends CI_Model
{
    private static $table_name = 'users';

    public function getAllUser()
    {
        return $this->db->get(self::$table_name)->result();
    }

    /**
     * function used to add new user.
     *
     * @param $user is an associative array which represents a user to be added to database
     *
     * @return false on SQL execution failure
     *         1 on email exists
     */
    public function addUser($user)
    {
        if ($this->userExist($user['email'])) {
            return 1;
        }

        return $this->db->insert(self::$table_name, $user);
    }

    public function deleteUser($id)
    {
        if ($this->userExist($id)) {
            return $this->db->delete(self::$table_name, array('id' => intval($id)));
        }

        return false;
    }

    public function userExist($user)
    {
        $condition = is_numeric($user) ? array('id' => intval($user)) : array('email' => $user);

        return $this->db->get_where(self::$table_name, $condition)->conn_id->affected_rows > 0 ? true : false;
    }

    public function verifyUser($user)
    {
        return $this->db->get_where(self::$table_name, array('email' => $user['email'], 'password' => $user['password']))->conn_id->affected_rows > 0 ? true : false;
    }

    public function getUser($user)
    {
        $condition = is_numeric($user) ? array('id' => intval($user)) : array('email' => $user);

        return $this->db->get_where(self::$table_name, $condition)->result()[0];
    }

    public function updateUser($id, $user)
    {
        if ($this->userExist($id)) {
            return $this->db->update(self::$table_name, $user, array('id' => $id));
        }

        return false;
    }
}
