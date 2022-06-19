<?php


class Mst_Contactus_Model
{
    private $db;
    public function __construct()
    {
        $this->db = new Database;
    }
    public function editMst_Contactus($data)
    {

        $this->db->query('INSERT INTO mst_contactus(
                tn_title, en_title, tn_pdf, en_pdf, mst_con_dropdown,created_by,created_on,status)
                VALUES (:tn_title,:en_title,:tn_pdf,:en_pdf,:mst_con_dropdown,:created_by,:created_on,:status)');
        $this->db->bind(':tn_title', $data['tn_title']);
        $this->db->bind(':en_title', $data['en_title']);
        $this->db->bind(':tn_pdf', $data['tn_pdf']);
        $this->db->bind(':en_pdf', $data['en_pdf']);
        $this->db->bind(':mst_con_dropdown', $data['mst_con_dropdown']);
        $this->db->bind(':created_by', $data['created_by']);
        $this->db->bind(':created_on', $data['created_on']);
        $this->db->bind(':status', $data['status']);

        if ($this->db->execute()) {
            return true;
        } else {
            return false;
        }
    }
    public function editMst_Contactus_office_name($data)
    {
        // echo"<pre>";
        // print_r($data);
        // die;
        $this->db->query('UPDATE mst_contactus_office SET status =:status_office WHERE mst_con_off_id = :mst_con_dropdown');
        $this->db->bind(':mst_con_dropdown', $data['mst_con_dropdown']);
        $this->db->bind(':status_office', $data['status_office']);
        if ($this->db->execute()) {
            return true;
        } else {
            return false;
        }
    }


    public function updateMst_Contactus($data)
    {
        $this->db->query('UPDATE mst_contactus SET tn_title = :tn_title, en_title = :en_title ,tn_pdf = :tn_pdf,en_pdf = :en_pdf,mst_con_dropdown=:mst_con_dropdown,updated_by=:updated_by,updated_on=:updated_on ,status =:status WHERE mst_contactus_id = :mst_contactus_id');
        $this->db->bind(':mst_contactus_id', $data['mst_contactus_id']);
        $this->db->bind(':tn_title', $data['tn_title']);
        $this->db->bind(':en_title', $data['en_title']);
        $this->db->bind(':tn_pdf', $data['tn_pdf']);
        $this->db->bind(':en_pdf', $data['en_pdf']);
        $this->db->bind(':mst_con_dropdown', $data['mst_con_dropdown']);
        $this->db->bind(':updated_by', $data['updated_by']);
        $this->db->bind(':updated_on', $data['updated_on']);
        $this->db->bind(':status', $data['status']);

        if ($this->db->execute()) {
            return true;
        } else {
            return false;
        }
    }
    public function deleteMst_Contactus($data)
    {

        $this->db->query('UPDATE mst_contactus SET deleted_by=:deleted_by,deleted_on=:deleted_on ,status =:status WHERE mst_contactus_id = :mst_contactus_id');
        $this->db->bind(':mst_contactus_id', $data['mst_contactus_id']);
        $this->db->bind(':deleted_by', $data['deleted_by']);
        $this->db->bind(':deleted_on', $data['deleted_on']);
        $this->db->bind(':status', $data['status']);

        if ($this->db->execute()) {
            return true;
        } else {
            return false;
        }
    }
    public function getcon_staoffice($data)
    {

        $this->db->query('SELECT * FROM mst_contactus WHERE status = :status or status = :status1 ORDER BY mst_contactus_id DESC');
        $this->db->bind(':status', $data['status']);
        $this->db->bind(':status1', $data['status1']);

        $row = $this->db->fetchAll();
        return $row;
    }
    public function getcon_staoffice_name($data)
    {

        $this->db->query('SELECT * FROM mst_contactus_office WHERE status = :status ORDER BY mst_con_off_id ASC');
        $this->db->bind(':status', $data['status']);
        $row = $this->db->fetchAll();
        return $row;
    }
    public function getcon_staoffice_name_publish()
    {

        $this->db->query('SELECT * FROM mst_contactus_office ORDER BY mst_con_off_id ASC');
        $row = $this->db->fetchAll();
        return $row;
    }
    public function publishMst_Contactus($data)
    {

        $this->db->query('UPDATE mst_contactus SET status =:status WHERE mst_contactus_id = :mst_contactus_id');
        $this->db->bind(':mst_contactus_id', $data['mst_contactus_id']);
        $this->db->bind(':status', $data['status']);

        if ($this->db->execute()) {
            return true;
        } else {
            return false;
        }
    }
    public function getMst_ContactusPublished($data)
    {
        // echo "<pre>";
        // print_r($data);
        // die;
        $this->db->query('SELECT * FROM mst_contactus WHERE status = :status and mst_con_dropdown = :mst_con_dropdown  ORDER BY mst_contactus_id DESC');
        $this->db->bind(':status', $data['status']);
        $this->db->bind(':mst_con_dropdown', $data['ch']);
        $row = $this->db->single();
        return $row;
    }
    public function getMst_ContactusUnpublished($status)
    {
        $this->db->query('SELECT * FROM mst_contactus WHERE status = :status ORDER BY mst_contactus_id DESC');
        $this->db->bind(':status', $status);
        // $this->db->bind(':status', $status);
        $row = $this->db->fetchAll();
        return $row;
    }
    public function getMst_Contactusby($mst_contactus_id)
    {
        $this->db->query('SELECT * FROM mst_contactus WHERE mst_contactus_id = :mst_contactus_id');
        $this->db->bind(':mst_contactus_id', $mst_contactus_id);
        $row = $this->db->single();
        return $row;
    }
    public function getUpdatedby($mst_contactus_id)
    {
        $this->db->query('SELECT * FROM mst_contactus WHERE mst_contactus_id = :mst_contactus_id');
        $this->db->bind(':mst_contactus_id', $mst_contactus_id);
        $row = $this->db->single();
        return $row;
    }
    public function get_edit_id($mst_contactus_id)
    {
        $this->db->query('SELECT * FROM mst_contactus where mst_contactus_id = :mst_contactus_id');
        $this->db->bind(':mst_contactus_id', $mst_contactus_id);
        $row = $this->db->single();
        return $row;
    }
    public function edit($mst_contactus_id)
    {
        $this->db->query('SELECT * FROM mst_contactus where mst_contactus_id = :mst_contactus_id');
        $this->db->bind(':mst_contactus_id', $mst_contactus_id);
        $row = $this->db->single();
        return $row;
    }
    public function getWhatsNewPublishedCount($status)
    {
        // $sql = "select *  from mstmenu  where status = 1 order by menu_order";
        $this->db->query('SELECT count(*) FROM mst_contactus where status = :status');
        $this->db->bind(':status', $status);
        $row = $this->db->fetchAll();
        return $row;
    }
    public function getWhatsNewUnpublishedCount($status)
    {
        // $sql = "select *  from mstmenu  where status = 1 order by menu_order";
        $this->db->query('SELECT count(*) FROM mst_contactus where status = :status');
        $this->db->bind(':status', $status);
        $row = $this->db->fetchAll();
        return $row;
    }
    public function getWhatsNewAllCount()
    {
        // $sql = "select *  from mstmenu  where status = 1 order by menu_order";
        $this->db->query('SELECT count(*) FROM mst_contactus');
        $row = $this->db->fetchAll();
        return $row;
    }
    public function Contactus_office_ajax($data)
    {
  

    }
}
