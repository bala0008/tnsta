<?php


class Common_model
{
    private $db;
    // private $table_name = $_SESSION['table'];

    public function __construct()
    {
        $this->db = new Database;
    }
    public function getAllSubDashPub($myTag)
    {
        $mysql_tb = 'mst_'.$myTag;
        // $sql = "select *  from mstmenu  where status = 1 order by menu_order";
        $this->db->query("SELECT count(*) FROM " . $mysql_tb . "  where status = :status");
        $this->db->bind(':status', '1');
        $row = $this->db->fetchAll();
        return $row;
    }
    public function getAllSubDashUnPub($myTag)
    {
        $mysql_tb = 'mst_'.$myTag;
        // $sql = "select *  from mstmenu  where status = 1 order by menu_order";
        $this->db->query("SELECT count(*) FROM " . $mysql_tb . "  where status = :status");
        $this->db->bind(':status', '0');
        $row = $this->db->fetchAll();
        return $row;
    }
 
}
