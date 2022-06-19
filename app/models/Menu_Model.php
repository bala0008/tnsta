<?php


class Menu_Model
{
    private $db;
    public function __construct()
    {
        $this->db = new Database;
    }
    public function lastInsertedID()
    {
        $this->db->query('SELECT MAX(menu_id) as menu_id FROM mst_menu');
        $menu = $this->db->single();
        return $menu;
    }


    public function getMenuPublished()
    {
        $this->db->query('SELECT * FROM mst_menu WHERE status = :status');
        $this->db->bind(':status', '0');
        $row = $this->db->fetchAll();
        return $row;
    }
    public function reorderMenus()
    {
        $this->db->query('SELECT * FROM mst_menu WHERE parent_id = :parent_id ORDER BY menu_order');
        $this->db->bind(':parent_id', '0');
        $row = $this->db->fetchAll();
        return $row;
    }

    public function updatereorderMenu($data)
    {
        for ($count = 0; $count < count($data["page_id_array"]); $count++) {
            $this->db->query('UPDATE public.mst_menu SET  menu_order=:menu_order WHERE menu_id =:menu_id');
            $this->db->bind(':menu_id', $data['page_id_array'][$count]);
            $this->db->bind(':menu_order', $count + 1);
            $this->db->execute();
        }
    }
    public function getPageList()
    {
        $this->db->query('SELECT * FROM mst_page WHERE status = :status');
        $this->db->bind(':status', '0');
        $row = $this->db->fetchAll();
        return $row;
    }
    public function getMenu_parent_Published()
    {
        // $this->db->query('SELECT * FROM mst_menu WHERE status = :status');
        $this->db->query('SELECT * FROM mst_menu WHERE status = :status and parent_id =:parent_id');
        $this->db->bind(':status', '0');
        $this->db->bind(':parent_id', '0');

        $row = $this->db->fetchAll();
        return $row;
    }
    public function editmenu($data)
    {
        if (($data['level_id']) == 0) {
            $this->db->query('INSERT INTO mst_menu (tn_menu_name, en_menu_name, parent_id, level_id, is_redirect_popup,menu_order, menu_link,  menu_page,
            menu_attachment, menu_type, status) VALUES (:tn_menu_name, :en_menu_name, :parent_id, :level_id, :is_redirect_popup,:menu_order, :menu_link, :menu_page,
	:menu_attachment, :menu_type, :status)');
            $this->db->bind(':tn_menu_name', $data['tn_menu_name']);
            $this->db->bind(':en_menu_name', $data['en_menu_name']);
            $this->db->bind(':parent_id', $data['level_id']);
            $this->db->bind(':level_id', $data['level_id']);
            $this->db->bind(':menu_link', $data['menu_link']);
            $this->db->bind(':status', $data['status']);
            $this->db->bind(':menu_page', $data['menu_page']);
            $this->db->bind(':menu_attachment', $data['menu_attachment']);
            $this->db->bind(':menu_type', $data['menu_type']);
            $this->db->bind(':is_redirect_popup', $data['is_redirect_popup']);
            $this->db->bind(':menu_order', $data['menu_order']);


            if ($this->db->execute()) {
                return true;
            } else {
                return false;
            }
        } else {
            $this->db->query('INSERT INTO mst_menu (tn_menu_name, en_menu_name, parent_id, level_id, is_redirect_popup,menu_order, menu_link,  menu_page,
            menu_attachment, menu_type, status) VALUES (:tn_menu_name, :en_menu_name, :parent_id, :level_id, :is_redirect_popup,:menu_order, :menu_link, :menu_page,
	:menu_attachment, :menu_type, :status)');
            $this->db->bind(':tn_menu_name', $data['tn_menu_name']);
            $this->db->bind(':en_menu_name', $data['en_menu_name']);
            $this->db->bind(':parent_id', $data['parent_id']);
            $this->db->bind(':level_id', $data['level_id']);
            $this->db->bind(':menu_link', $data['menu_link']);
            $this->db->bind(':status', $data['status']);
            $this->db->bind(':menu_page', $data['menu_page']);
            $this->db->bind(':menu_attachment', $data['menu_attachment']);
            $this->db->bind(':menu_type', $data['menu_type']);
            $this->db->bind(':is_redirect_popup', $data['is_redirect_popup']);
            $this->db->bind(':menu_order', $data['menu_order']);

            if ($this->db->execute()) {
                return true;
            } else {
                return false;
            }
        }
    }
    public function getAllSubMenu($parent_id)
    {
        $this->db->query('SELECT * FROM mst_menu WHERE parent_id = :parent_id');
        $this->db->bind(':parent_id', $parent_id);
        $row = $this->db->fetchAll();
        return $row;
    }
}
