<?php


class About_level_Model
{
    private $db;
    public function __construct()
    {
        $this->db = new Database;
    }
    public function getAllAbout_level()
    {
        $this->db->query('SELECT * FROM public.mst_about_level_1
        ORDER BY level_1_id ASC');
        $row = $this->db->fetchAll();
        return $row;
    }

    public function getAbout_level_id($id)
    {
        $this->db->query('SELECT * FROM public.mst_about_level_2 WHERE level_1_id = :id');
        $this->db->bind(':id', $id);
        $row = $this->db->fetchAll();
        return $row;
    }
    
    public function getAbout_level_id1($id)
    {
        $this->db->query('SELECT * FROM public.mst_about_level_1 WHERE level_1_id = :id');
        $this->db->bind(':id', $id);
        $row = $this->db->single();
        return $row;
    }
}
