<?php


class Role_Honour_Model
{
    private $db;
    public function __construct()
    {
        $this->db = new Database;
    }
    public function getrole_honourPublished()
    {
        $this->db->query('SELECT * FROM public.mst_about_role_honor
        ORDER BY role_honor_id ASC');
        $row = $this->db->fetchAll();
        return $row;
    }
    public function editrole_honour($data)
    {
        // echo "<pre>";
        // print_r($data);
        // die;
        $this->db->query('INSERT INTO mst_about_role_honor(
            en_role_honor_name, role_honor_fromdate, role_honor_todate, tn_role_honor_name)
            VALUES (:en_role_honor_name, :role_honor_fromdate, :role_honor_todate, :tn_role_honor_name)');
        $this->db->bind(':en_role_honor_name', $data['en_role_honor_name']);
        $this->db->bind(':tn_role_honor_name', $data['tn_role_honor_name']);
        $this->db->bind(':role_honor_fromdate', $data['role_honor_fromdate']);
        $this->db->bind(':role_honor_todate', $data['role_honor_todate']);
        if ($this->db->execute()) {
            return true;
        } else {
            return false;
        }
    }

    public function getAbout_level_id($id)
    {
        $this->db->query('SELECT * FROM public.mst_about_level_2 WHERE role_honor_id = :id');
        $this->db->bind(':id', $id);
        $row = $this->db->fetchAll();
        return $row;
    }

    public function getAbout_level_id1($id)
    {
        $this->db->query('SELECT * FROM public.mst_about_role_honor WHERE role_honor_id = :id');
        $this->db->bind(':id', $id);
        $row = $this->db->single();
        return $row;
    }
    public function publishcontactus_view($status)
    {
        $this->db->query('SELECT * FROM public.mst_about_role_honor WHERE status = :status ORDER BY role_honor_id ASC');
        $this->db->bind(':status', $status);
        $row = $this->db->fetchAll();
        return $row;
    }
}
