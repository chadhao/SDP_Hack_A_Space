<?php

class ListingModel extends CI_Model
{
    private static $table_name = 'listings';

    public function getAllListing()
    {
        return $this->db->get(self::$table_name)->result();
    }

    public function getListing($lid)
    {
    }
}
