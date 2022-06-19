<?php


class Page_Model
{
    private $db;
    public function __construct()
    {
        $this->db = new Database;
    }
    public function editPage($data)
    {
      
        $this->db->query('INSERT INTO mst_page(
            tn_title, en_title,tn_page_content, en_page_content,created_by,created_on,status)
            VALUES (:tn_title,:en_title,:tn_page_content, :en_page_content,:created_by,:created_on,:status);');
        $this->db->bind(':tn_title', $data['tn_title']);
        $this->db->bind(':en_title', $data['en_title']);
        $this->db->bind(':tn_page_content', $data['tn_page_content']);
        $this->db->bind(':en_page_content', $data['en_page_content']);
        $this->db->bind(':created_by', $data['created_by']);
        $this->db->bind(':created_on', $data['created_on']);
        $this->db->bind(':status', $data['status']);

        if ($this->db->execute()) {
            return true;
        } else {
            return false;
        }
    }

    public function updatedPage($data)
    {
        $this->db->query('UPDATE public.mst_page
        SET  tn_title=:tn_title, en_title=:en_title, tn_page_content=:tn_page_content, en_page_content=:en_page_content,  updated_by=:updated_by, updated_on=:updated_on, status=:status
        WHERE page_id=:page_id');
        $this->db->bind(':page_id', $data['page_id']);
        $this->db->bind(':tn_title', $data['tn_title']);
        $this->db->bind(':en_title', $data['en_title']);
        $this->db->bind(':tn_page_content', $data['tn_page_content']);
        $this->db->bind(':en_page_content', $data['en_page_content']);

        $this->db->bind(':updated_by', $data['updated_by']);
        $this->db->bind(':updated_on', $data['updated_on']);
        $this->db->bind(':status', $data['status']);

        if ($this->db->execute()) {
            return true;
        } else {
            return false;
        }
    }
    public function deletedPage($data)
    {
       
        $this->db->query('UPDATE mst_page SET deleted_by=:deleted_by,deleted_on=:deleted_on ,status =:status WHERE page_id = :page_id');
        $this->db->bind(':page_id', $data['page_id']);
        $this->db->bind(':deleted_by', $data['deleted_by']);
        $this->db->bind(':deleted_on', $data['deleted_on']);
        $this->db->bind(':status', $data['status']);

        if ($this->db->execute()) {
            return true;
        } else {
            return false;
        }
    }
    public function publishPage($data)
    {
       
        $this->db->query('UPDATE mst_page SET status =:status WHERE page_id = :page_id');
        $this->db->bind(':page_id', $data['page_id']);
        $this->db->bind(':status', $data['status']);

        if ($this->db->execute()) {
            return true;
        } else {
            return false;
        }
    }
    public function getPagePublished($status)
    {   
        $this->db->query('SELECT * FROM mst_page WHERE status = :status ORDER BY page_id DESC');
        $this->db->bind(':status', $status);
        $row = $this->db->fetchAll();
        return $row;
    }
    public function getPageUnpublished($status)
    {
        $this->db->query('SELECT * FROM mst_page WHERE status = :status ORDER BY page_id DESC');
        $this->db->bind(':status', $status);
        // $this->db->bind(':status', $status);
        $row = $this->db->fetchAll();
        return $row;
    }
    public function getWhatsNewby($page_id)
    {
        $this->db->query('SELECT * FROM mst_page WHERE page_id = :page_id');
        $this->db->bind(':page_id', $page_id);
        $row = $this->db->single();
        return $row;
    }
    public function getUpdatedby($page_id)
    {
        $this->db->query('SELECT * FROM mst_page WHERE page_id = :page_id');
        $this->db->bind(':page_id', $page_id);
        $row = $this->db->single();
        return $row;
    }
    public function get_edit_id($page_id)
    {
        $this->db->query('SELECT * FROM mst_page where page_id = :page_id');
        $this->db->bind(':page_id', $page_id);
        $row = $this->db->single();
        return $row;
    }
    public function edit($page_id)
    {
        $this->db->query('SELECT * FROM mst_page where page_id = :page_id');
        $this->db->bind(':page_id', $page_id);
        $row = $this->db->single();
        return $row;
    }
    public function DisplayPage($id)
    {
        $this->db->query('SELECT * FROM mst_page WHERE page_id = :id');
        $this->db->bind(':id', $id);
        $row = $this->db->single();
        return $row;
    }

}
