<?php


class Common_model
{
    private $db;
    // private $table_name = $_SESSION['table'];

    public function __construct()
    {
        $this->db = new Database;
    }
    public function getAllSubDashPub()
    {
        // $sql = "select *  from mstmenu  where status = 1 order by menu_order";
        $this->db->query('SELECT count(*) FROM mst_whatsnew  where status = :status');
        $this->db->bind(':status', '1');
        $row = $this->db->fetchAll();
        return $row;
    }
    public function getAllSubDashUnPub()
    {
        // $sql = "select *  from mstmenu  where status = 1 order by menu_order";
        $this->db->query('SELECT count(*) FROM mst_whatsnew  where status = :status');
        $this->db->bind(':status', '0');
        $row = $this->db->fetchAll();
        return $row;
    }
}
