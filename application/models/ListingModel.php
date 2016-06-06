<?php

class ListingModel extends CI_Model
{
    private static $table_name = 'listings';

    public function getAllListing()
    {
        return $this->db->get(self::$table_name)->result();
    }

    public function getListing($condition, $fields = '')
    {
        if (!empty($fields)) {
            $this->db->select($fields);
        }
        $result = $this->db->get_where(self::$table_name, $condition, 1);
        if ($result === false || $result->num_rows() == 0) {
            return false;
        }

        return $result->result()[0];
    }

    public function addListing($listing)
    {
        return $this->db->insert(self::$table_name, $listing);
    }

    public function validateInput($listing)
    {
        $isValid = true;
        if (empty($listing['title'])) {
            $str = 'Title is empty!<br>';
            $isValid = $isValid === true ? $str : ($isValid.$str);
        }
        if (empty($listing['location'])) {
            $str = 'Location is empty!<br>';
            $isValid = $isValid === true ? $str : ($isValid.$str);
        }
        if (empty($listing['availability'])) {
            $str = 'Availability is empty!<br>';
            $isValid = $isValid === true ? $str : ($isValid.$str);
        }
        if (empty($listing['description'])) {
            $str = 'Description is empty!<br>';
            $isValid = $isValid === true ? $str : ($isValid.$str);
        }

        return $isValid;
    }
}
