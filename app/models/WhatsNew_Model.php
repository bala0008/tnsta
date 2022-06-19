<?php


class WhatsNew_Model
{
    private $db;
    public function __construct()
    {
        $this->db = new Database;
    }
    public function editdWhatsNew($data)
    {
        $this->db->query('INSERT INTO mst_whatsnew(
            tn_whatsnew_title, en_whatsnew_title,tn_wh_new_pdf,en_wh_new_pdf,wh_new_from_date,wh_new_to_date,created_by,created_on,status)
            VALUES (:tn_whatsnew_title,:en_whatsnew_title,:tn_wh_new_pdf,:en_wh_new_pdf,:wh_new_from_date,:wh_new_to_date,:created_by,:created_on,:status);');
        $this->db->bind(':tn_whatsnew_title', $data['tn_whatsnew_title']);
        $this->db->bind(':en_whatsnew_title', $data['en_whatsnew_title']);
        $this->db->bind(':tn_wh_new_pdf', $data['tn_wh_new_pdf']);
        $this->db->bind(':en_wh_new_pdf', $data['en_wh_new_pdf']);


        $this->db->bind(':wh_new_from_date', $data['wh_new_from_date']);
        $this->db->bind(':wh_new_to_date', $data['wh_new_to_date']);

        $this->db->bind(':created_by', $data['created_by']);
        $this->db->bind(':created_on', $data['created_on']);
        $this->db->bind(':status', $data['status']);
        
        if ($this->db->execute()) {
            return true;
        } else {
            return false;
        }
    }

    public function updatedWhatsNew($data)
    {
        $this->db->query('UPDATE mst_whatsnew SET tn_whatsnew_title = :tn_whatsnew_title, en_whatsnew_title = :en_whatsnew_title ,tn_wh_new_pdf = :tn_wh_new_pdf,en_wh_new_pdf = :en_wh_new_pdf,wh_new_from_date=:wh_new_from_date,wh_new_to_date =:wh_new_to_date,updated_by=:updated_by,updated_on=:updated_on ,status =:status WHERE whatsnew_id = :whatsnew_id');
        $this->db->bind(':whatsnew_id', $data['whatsnew_id']);
        $this->db->bind(':tn_whatsnew_title', $data['tn_whatsnew_title']);
        $this->db->bind(':en_whatsnew_title', $data['en_whatsnew_title']);
        $this->db->bind(':tn_wh_new_pdf', $data['tn_wh_new_pdf']);
        $this->db->bind(':en_wh_new_pdf', $data['en_wh_new_pdf']);

        $this->db->bind(':wh_new_from_date', $data['wh_new_from_date']);
        $this->db->bind(':wh_new_to_date', $data['wh_new_to_date']);

        $this->db->bind(':updated_by', $data['updated_by']);
        $this->db->bind(':updated_on', $data['updated_on']);
        $this->db->bind(':status', $data['status']);

        if ($this->db->execute()) {
            return true;
        } else {
            return false;
        }
    }
    public function deletedWhatsNew($data)
    {
       
        $this->db->query('UPDATE mst_whatsnew SET deleted_by=:deleted_by,deleted_on=:deleted_on ,status =:status WHERE whatsnew_id = :whatsnew_id');
        $this->db->bind(':whatsnew_id', $data['whatsnew_id']);
        $this->db->bind(':deleted_by', $data['deleted_by']);
        $this->db->bind(':deleted_on', $data['deleted_on']);
        $this->db->bind(':status', $data['status']);

        if ($this->db->execute()) {
            return true;
        } else {
            return false;
        }
    }
    public function publishWhatsNew($data)
    {
       
        $this->db->query('UPDATE mst_whatsnew SET status =:status WHERE whatsnew_id = :whatsnew_id');
        $this->db->bind(':whatsnew_id', $data['whatsnew_id']);
        $this->db->bind(':status', $data['status']);

        if ($this->db->execute()) {
            return true;
        } else {
            return false;
        }
    }
    public function getWhatsNewPublished($status)
    {   
        $this->db->query('SELECT * FROM mst_whatsnew WHERE status = :status ORDER BY whatsnew_id DESC');
        $this->db->bind(':status', $status);
        $row = $this->db->fetchAll();
        return $row;
    }
    public function getWhatsNewUnpublished($status)
    {
        $this->db->query('SELECT * FROM mst_whatsnew WHERE status = :status ORDER BY whatsnew_id DESC');
        $this->db->bind(':status', $status);
        // $this->db->bind(':status', $status);
        $row = $this->db->fetchAll();
        return $row;
    }
    public function getWhatsNewby($whatsnew_id)
    {
        $this->db->query('SELECT * FROM mst_whatsnew WHERE whatsnew_id = :whatsnew_id');
        $this->db->bind(':whatsnew_id', $whatsnew_id);
        $row = $this->db->single();
        return $row;
    }
    public function getUpdatedby($whatsnew_id)
    {
        $this->db->query('SELECT * FROM mst_whatsnew WHERE whatsnew_id = :whatsnew_id');
        $this->db->bind(':whatsnew_id', $whatsnew_id);
        $row = $this->db->single();
        return $row;
    }
    public function get_edit_id($whatsnew_id)
    {
        $this->db->query('SELECT * FROM mst_whatsnew where whatsnew_id = :whatsnew_id');
        $this->db->bind(':whatsnew_id', $whatsnew_id);
        $row = $this->db->single();
        return $row;
    }
    public function edit($whatsnew_id)
    {
        $this->db->query('SELECT * FROM mst_whatsnew where whatsnew_id = :whatsnew_id');
        $this->db->bind(':whatsnew_id', $whatsnew_id);
        $row = $this->db->single();
        return $row;
    }
    public function getWhatsNewPublishedCount($status)
    {
        // $sql = "select *  from mstmenu  where status = 1 order by menu_order";
        $this->db->query('SELECT count(*) FROM mst_whatsnew where status = :status');
        $this->db->bind(':status', $status);
        $row = $this->db->fetchAll();
        return $row;
    }
    public function getWhatsNewUnpublishedCount($status)
    {
        // $sql = "select *  from mstmenu  where status = 1 order by menu_order";
        $this->db->query('SELECT count(*) FROM mst_whatsnew where status = :status');
        $this->db->bind(':status', $status);
        $row = $this->db->fetchAll();
        return $row;

    }
    public function getWhatsNewAllCount()
    {
        // $sql = "select *  from mstmenu  where status = 1 order by menu_order";
        $this->db->query('SELECT count(*) FROM mst_whatsnew');
        $row = $this->db->fetchAll();
        return $row;
    }
    public function test(){
        echo $_SESSION['table'];
    }
}

