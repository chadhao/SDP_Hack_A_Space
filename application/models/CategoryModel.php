<?php

class CategoryModel extends CI_Model
{
    private static $table_name = 'categories';

    public function getAllCategory()
    {
        return $this->db->get(self::$table_name)->result();
    }

    public function getCategoryName($cid)
    {
        $condition = array('id' => intval($cid));

        return $this->db->get_where(self::$table_name, $condition)->result()[0];
    }

    public function addCategory($cname)
    {
        if ($this->categoryExist($cname)) {
            return 1;
        }

        return $this->db->insert(self::$table_name, array('cname' => $cname));
    }

    public function deleteCategory($cid)
    {
        if ($this->categoryExist($cid)) {
            return $this->db->delete(self::$table_name, array('id' => intval($cid)));
        }

        return false;
    }

    public function updateCategory($cid, $cname)
    {
        if ($this->categoryExist($cid)) {
            return $this->db->update(self::$table_name, array('cname' => $cname), array('id' => $cid));
        }

        return false;
    }

    public function categoryExist($category)
    {
        $condition = is_numeric($category) ? array('id' => intval($category)) : array('cname' => $category);

        return $this->db->get_where(self::$table_name, $condition)->conn_id->affected_rows > 0 ? true : false;
    }
}
