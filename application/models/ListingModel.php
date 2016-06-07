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

    public function getListings($condition, $fields = '')
    {
        if (!empty($fields)) {
            $this->db->select($fields);
        }
        $this->db->order_by('id', 'DESC');

        return $this->db->get_where(self::$table_name, $condition)->result();
    }

    public function getLatestListing($fields = 'id, title', $image = true, $num = 4)
    {
        $this->db->select($fields.($image ? ', image' : ''));
        $this->db->from(self::$table_name);
        $this->db->order_by('id', 'DESC');
        if ($image === true) {
            $this->db->where('image >', '');
        }
        $this->db->limit($num);

        return $this->db->get()->result();
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

    public function listingExist($lid)
    {
        return $this->db->get_where(self::$table_name, array('id' => intval($lid)))->conn_id->affected_rows > 0 ? true : false;
    }

    public function updateListing($lid, $listing)
    {
        if ($this->listingExist($lid)) {
            return $this->db->update(self::$table_name, $listing, array('id' => intval($lid)));
        }

        return false;
    }

    public function deleteListing($lid)
    {
        if ($this->listingExist($lid)) {
            return $this->db->delete(self::$table_name, array('id' => intval($lid)));
        }

        return false;
    }
}
