<?php


class Tender_Model
{
    private $db;
    public function __construct()
    {
        $this->db = new Database;
    }
    public function edittender($data)
    {
        $this->db->query('INSERT INTO mst_tender(
            tn_tender_title, en_tender_title,tn_tender_pdf, en_tender_pdf,tender_from_date,tender_to_date,created_by,created_on,status)
            VALUES (:tn_tender_title,:en_tender_title,:tn_tender_pdf, :en_tender_pdf,:tender_from_date,:tender_to_date,:created_by,:created_on,:status);');
        $this->db->bind(':tn_tender_title', $data['tn_tender_title']);
        $this->db->bind(':en_tender_title', $data['en_tender_title']);
        $this->db->bind(':tn_tender_pdf', $data['tn_tender_pdf']);
        $this->db->bind(':en_tender_pdf', $data['en_tender_pdf']);

        $this->db->bind(':tender_from_date', $data['tender_from_date']);
        $this->db->bind(':tender_to_date', $data['tender_to_date']);

        $this->db->bind(':created_by', $data['created_by']);
        $this->db->bind(':created_on', $data['created_on']);
        $this->db->bind(':status', $data['status']);

        if ($this->db->execute()) {
            return true;
        } else {
            return false;
        }
    }

    public function updatedTender($data)
    {
        $this->db->query('UPDATE mst_tender SET tn_tender_title = :tn_tender_title, en_tender_title = :en_tender_title ,tn_tender_pdf = :tn_tender_pdf,en_tender_pdf = :en_tender_pdf,tender_from_date=:tender_from_date,tender_to_date =:tender_to_date,updated_by=:updated_by,updated_on=:updated_on ,status =:status WHERE tender_id = :tender_id');
        $this->db->bind(':tender_id', $data['tender_id']);
        $this->db->bind(':tn_tender_title', $data['tn_tender_title']);
        $this->db->bind(':en_tender_title', $data['en_tender_title']);
        $this->db->bind(':tn_tender_pdf', $data['tn_tender_pdf']);
        $this->db->bind(':en_tender_pdf', $data['en_tender_pdf']);

        $this->db->bind(':tender_from_date', $data['tender_from_date']);
        $this->db->bind(':tender_to_date', $data['tender_to_date']);

        $this->db->bind(':updated_by', $data['updated_by']);
        $this->db->bind(':updated_on', $data['updated_on']);
        $this->db->bind(':status', $data['status']);

        if ($this->db->execute()) {
            return true;
        } else {
            return false;
        }
    }
    public function deletedTender($data)
    {
       
        $this->db->query('UPDATE mst_tender SET deleted_by=:deleted_by,deleted_on=:deleted_on ,status =:status WHERE tender_id = :tender_id');
        $this->db->bind(':tender_id', $data['tender_id']);
        $this->db->bind(':deleted_by', $data['deleted_by']);
        $this->db->bind(':deleted_on', $data['deleted_on']);
        $this->db->bind(':status', $data['status']);

        if ($this->db->execute()) {
            return true;
        } else {
            return false;
        }
    }
    public function publishTender($data)
    {
       
        $this->db->query('UPDATE mst_tender SET status =:status WHERE tender_id = :tender_id');
        $this->db->bind(':tender_id', $data['tender_id']);
        $this->db->bind(':status', $data['status']);

        if ($this->db->execute()) {
            return true;
        } else {
            return false;
        }
    }
    public function getTenderPublished($status)
    {   
        $this->db->query('SELECT * FROM mst_tender WHERE status = :status ORDER BY tender_id DESC');
        $this->db->bind(':status', $status);
        $row = $this->db->fetchAll();
        return $row;
    }
    public function getTenderUnpublished($status)
    {
        $this->db->query('SELECT * FROM mst_tender WHERE status = :status ORDER BY tender_id DESC');
        $this->db->bind(':status', $status);
        // $this->db->bind(':status', $status);
        $row = $this->db->fetchAll();
        return $row;
    }
    public function getWhatsNewby($tender_id)
    {
        $this->db->query('SELECT * FROM mst_tender WHERE tender_id = :tender_id');
        $this->db->bind(':tender_id', $tender_id);
        $row = $this->db->single();
        return $row;
    }
    public function getUpdatedby($tender_id)
    {
        $this->db->query('SELECT * FROM mst_tender WHERE tender_id = :tender_id');
        $this->db->bind(':tender_id', $tender_id);
        $row = $this->db->single();
        return $row;
    }
    public function get_edit_id($tender_id)
    {
        $this->db->query('SELECT * FROM mst_tender where tender_id = :tender_id');
        $this->db->bind(':tender_id', $tender_id);
        $row = $this->db->single();
        return $row;
    }
    public function edit($tender_id)
    {
        $this->db->query('SELECT * FROM mst_tender where tender_id = :tender_id');
        $this->db->bind(':tender_id', $tender_id);
        $row = $this->db->single();
        return $row;
    }
}
