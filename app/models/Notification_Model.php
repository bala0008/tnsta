<?php


class Notification_Model
{
    private $db;
    public function __construct()
    {
        $this->db = new Database;
    }
    public function SaveNotification($data)
    {
        $this->db->query('INSERT INTO mst_notification(
            tn_notification_title, en_notification_title,tn_notification_pdf, en_notification_pdf,notification_from_date,notification_to_date,created_by,created_on,status)
            VALUES (:tn_notification_title,:en_notification_title,:tn_notification_pdf, :en_notification_pdf,:notification_from_date,:notification_to_date,:created_by,:created_on,:status);');
        $this->db->bind(':tn_notification_title', $data['tn_notification_title']);
        $this->db->bind(':en_notification_title', $data['en_notification_title']);
        $this->db->bind(':tn_notification_pdf', $data['tn_notification_pdf']);
        $this->db->bind(':en_notification_pdf', $data['en_notification_pdf']);

        $this->db->bind(':notification_from_date', $data['notification_from_date']);
        $this->db->bind(':notification_to_date', $data['notification_to_date']);

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
        $this->db->query('UPDATE mst_notification SET tn_notification_title = :tn_notification_title, en_notification_title = :en_notification_title ,tn_notification_pdf = :tn_notification_pdf,en_notification_pdf = :en_notification_pdf,notification_from_date=:notification_from_date,notification_to_date =:notification_to_date,updated_by=:updated_by,updated_on=:updated_on ,status =:status WHERE notification_id = :notification_id');
        $this->db->bind(':notification_id', $data['notification_id']);
        $this->db->bind(':tn_notification_title', $data['tn_notification_title']);
        $this->db->bind(':en_notification_title', $data['en_notification_title']);
        $this->db->bind(':tn_notification_pdf', $data['tn_notification_pdf']);
        $this->db->bind(':en_notification_pdf', $data['en_notification_pdf']);

        $this->db->bind(':notification_from_date', $data['notification_from_date']);
        $this->db->bind(':notification_to_date', $data['notification_to_date']);

        $this->db->bind(':updated_by', $data['updated_by']);
        $this->db->bind(':updated_on', $data['updated_on']);
        $this->db->bind(':status', $data['status']);

        if ($this->db->execute()) {
            return true;
        } else {
            return false;
        }
    }
    public function deletedNotification($data)
    {
       
        $this->db->query('UPDATE mst_notification SET deleted_by=:deleted_by,deleted_on=:deleted_on ,status =:status WHERE notification_id = :notification_id');
        $this->db->bind(':notification_id', $data['notification_id']);
        $this->db->bind(':deleted_by', $data['deleted_by']);
        $this->db->bind(':deleted_on', $data['deleted_on']);
        $this->db->bind(':status', $data['status']);

        if ($this->db->execute()) {
            return true;
        } else {
            return false;
        }
    }
    public function notification_publish($data)
    {
       
        $this->db->query('UPDATE mst_notification SET status =:status WHERE notification_id = :notification_id');
        $this->db->bind(':notification_id', $data['notification_id']);
        $this->db->bind(':status', $data['status']);

        if ($this->db->execute()) {
            return true;
        } else {
            return false;
        }
    }
    public function getNotificationPublished($status)
    {   
        $this->db->query('SELECT * FROM mst_notification WHERE status = :status ORDER BY notification_id DESC');
        $this->db->bind(':status', $status);
        $row = $this->db->fetchAll();
        return $row;
    }
    public function getWhatsNewUnpublished($status)
    {
        $this->db->query('SELECT * FROM mst_notification WHERE status = :status ORDER BY notification_id DESC');
        $this->db->bind(':status', $status);
        // $this->db->bind(':status', $status);
        $row = $this->db->fetchAll();
        return $row;
    }
    public function getWhatsNewby($notification_id)
    {
        $this->db->query('SELECT * FROM mst_notification WHERE notification_id = :notification_id');
        $this->db->bind(':notification_id', $notification_id);
        $row = $this->db->single();
        return $row;
    }
    public function getUpdatedby($notification_id)
    {
        $this->db->query('SELECT * FROM mst_notification WHERE notification_id = :notification_id');
        $this->db->bind(':notification_id', $notification_id);
        $row = $this->db->single();
        return $row;
    }
    public function get_edit_id($notification_id)
    {
        $this->db->query('SELECT * FROM mst_notification where notification_id = :notification_id');
        $this->db->bind(':notification_id', $notification_id);
        $row = $this->db->single();
        return $row;
    }
    public function edit($notification_id)
    {
        $this->db->query('SELECT * FROM mst_notification where notification_id = :notification_id');
        $this->db->bind(':notification_id', $notification_id);
        $row = $this->db->single();
        return $row;
    }
}
