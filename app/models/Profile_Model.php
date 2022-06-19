<?php


class Profile_Model
{
    private $db;
    public function __construct()
    {
        $this->db = new Database;
    }
    public function editProfile($data)
    {
        $this->db->query('INSERT INTO public.mst_profile(
           tn_profile_name, en_profile_name, profile_photo,profile_check, tn_profile_position, en_profile_position, en_profile_qualification, tn_profile_qualification, en_profile_constis_name, tn_profile_constis_name, en_profile_party, tn_profile_party, profile_contact, profile_mobile,profile_fax, profile_email, en_profile_address, tn_profile_address, created_by, created_on, status)
            VALUES (:tn_profile_name, :en_profile_name, :profile_photo,:profile_check, :tn_profile_position, :en_profile_position, :en_profile_qualification, :tn_profile_qualification, :en_profile_constis_name, :tn_profile_constis_name, :en_profile_party, :tn_profile_party, :profile_contact, :profile_mobile,:profile_fax, :profile_email, :en_profile_address, :tn_profile_address, :created_by, :created_on, :status);');
        $this->db->bind(':tn_profile_name', $data['tn_profile_name']);
        $this->db->bind(':en_profile_name', $data['en_profile_name']);
        $this->db->bind(':profile_photo', $data['profile_photo']);
        $this->db->bind(':profile_check', $data['profile_check']);
        $this->db->bind(':tn_profile_position', $data['tn_profile_position']);
        $this->db->bind(':en_profile_position', $data['en_profile_position']);
        $this->db->bind(':en_profile_qualification', $data['en_profile_qualification']);
        $this->db->bind(':tn_profile_qualification', $data['tn_profile_qualification']);
        $this->db->bind(':en_profile_constis_name', $data['en_profile_constis_name']);
        $this->db->bind(':tn_profile_constis_name', $data['tn_profile_constis_name']);
        $this->db->bind(':en_profile_party', $data['en_profile_party']);
        $this->db->bind(':tn_profile_party', $data['tn_profile_party']);
        $this->db->bind(':profile_contact', $data['profile_contact']);
        $this->db->bind(':profile_mobile', $data['profile_mobile']);
        $this->db->bind(':profile_fax', $data['profile_fax']);
        $this->db->bind(':profile_email', $data['profile_email']);
        $this->db->bind(':en_profile_address', $data['en_profile_address']);
        $this->db->bind(':tn_profile_address', $data['tn_profile_address']);
        $this->db->bind(':created_by', $data['created_by']);
        $this->db->bind(':created_on', $data['created_on']);
        $this->db->bind(':status', $data['status']);
        // echo"<pre>";
        // print_r($this->db->execute());
        // die;
        if ($this->db->execute()) {
            return true;
        } else {
            return false;
        }
    }

    public function updatedProfile($data)
    {
        $this->db->query('UPDATE public.mst_profile
        SET tn_profile_name=:tn_profile_name, en_profile_name=:en_profile_name, profile_photo=:profile_photo, profile_check=:profile_check,tn_profile_position=:tn_profile_position, en_profile_position=:en_profile_position, en_profile_qualification=:en_profile_qualification, tn_profile_qualification=:tn_profile_qualification, en_profile_constis_name=:en_profile_constis_name, tn_profile_constis_name=:tn_profile_constis_name, en_profile_party=:en_profile_party, tn_profile_party=:tn_profile_party, profile_contact=:profile_contact, profile_mobile=:profile_mobile, profile_fax=:profile_fax, profile_email=:profile_email, en_profile_address=:en_profile_address, tn_profile_address=:tn_profile_address, updated_by=:updated_by, updated_on=:updated_on, status=:status
        WHERE profile_id=:profile_id');

        $this->db->bind(':profile_id', $data['profile_id']);
        $this->db->bind(':tn_profile_name', $data['tn_profile_name']);
        $this->db->bind(':en_profile_name', $data['en_profile_name']);
        $this->db->bind(':profile_photo', $data['profile_photo']);
        $this->db->bind(':profile_check', $data['profile_check']);

        $this->db->bind(':tn_profile_position', $data['tn_profile_position']);
        $this->db->bind(':en_profile_position', $data['en_profile_position']);
        $this->db->bind(':en_profile_qualification', $data['en_profile_qualification']);
        $this->db->bind(':tn_profile_qualification', $data['tn_profile_qualification']);
        $this->db->bind(':en_profile_constis_name', $data['en_profile_constis_name']);
        $this->db->bind(':tn_profile_constis_name', $data['tn_profile_constis_name']);
        $this->db->bind(':en_profile_party', $data['en_profile_party']);
        $this->db->bind(':tn_profile_party', $data['tn_profile_party']);
        $this->db->bind(':profile_contact', $data['profile_contact']);
        $this->db->bind(':profile_mobile', $data['profile_mobile']);
        $this->db->bind(':profile_fax', $data['profile_fax']);
        $this->db->bind(':profile_email', $data['profile_email']);
        $this->db->bind(':en_profile_address', $data['en_profile_address']);
        $this->db->bind(':tn_profile_address', $data['tn_profile_address']);
        $this->db->bind(':updated_by', $data['updated_by']);
        $this->db->bind(':updated_on', $data['updated_on']);
        $this->db->bind(':status', $data['status']);

        if ($this->db->execute()) {
            return true;
        } else {
            return false;
        }
    }
    public function deletedProfile($data)
    {

        $this->db->query('UPDATE mst_profile SET deleted_by=:deleted_by,deleted_on=:deleted_on ,status =:status WHERE profile_id = :profile_id');
        $this->db->bind(':profile_id', $data['profile_id']);
        $this->db->bind(':deleted_by', $data['deleted_by']);
        $this->db->bind(':deleted_on', $data['deleted_on']);
        $this->db->bind(':status', $data['status']);

        if ($this->db->execute()) {
            return true;
        } else {
            return false;
        }
    }
    public function publishProfile($data)
    {

        $this->db->query('UPDATE mst_profile SET status =:status WHERE profile_id = :profile_id');
        $this->db->bind(':profile_id', $data['profile_id']);
        $this->db->bind(':status', $data['status']);

        if ($this->db->execute()) {
            return true;
        } else {
            return false;
        }
    }
    public function getProfile_view($status, $position)
    {
        $this->db->query('SELECT * FROM mst_profile WHERE status = :status and profile_check = :en_profile_position  ORDER BY profile_id DESC');
        $this->db->bind(':status', $status);
        $this->db->bind(':en_profile_position', $position);
        $row = $this->db->single();
        // echo"<pre>";
        // print_r($row);
        // die;
        return $row;
    }
    public function getProfileUnpublished($status)
    {
        $this->db->query('SELECT * FROM mst_profile WHERE status = :status ORDER BY profile_id DESC');
        $this->db->bind(':status', $status);
        $row = $this->db->fetchAll();
        return $row;
    }
    public function getProfilePublished($status)
    {
        $this->db->query('SELECT * FROM mst_profile WHERE status = :status ORDER BY profile_id DESC');
        $this->db->bind(':status', $status);
        // $this->db->bind(':status', $status);
        $row = $this->db->fetchAll();
        return $row;
    }
    public function getWhatsNewby($profile_id)
    {
        $this->db->query('SELECT * FROM mst_profile WHERE profile_id = :profile_id');
        $this->db->bind(':profile_id', $profile_id);
        $row = $this->db->single();
        return $row;
    }
    public function getUpdatedby($profile_id)
    {
        $this->db->query('SELECT * FROM mst_profile WHERE profile_id = :profile_id');
        $this->db->bind(':profile_id', $profile_id);
        $row = $this->db->single();
        return $row;
    }
    public function get_edit_id($profile_id)
    {
        $this->db->query('SELECT * FROM mst_profile where profile_id = :profile_id');
        $this->db->bind(':profile_id', $profile_id);
        $row = $this->db->single();
        return $row;
    }
    public function edit($profile_id)
    {
        $this->db->query('SELECT * FROM mst_profile where profile_id = :profile_id');
        $this->db->bind(':profile_id', $profile_id);
        $row = $this->db->single();
        return $row;
    }
    public function getprofile_cmPublished($status, $profile_position)
    {
        $this->db->query('SELECT * FROM mst_profile where status = :status and en_profile_position = :en_profile_position');
        $this->db->bind(':status', $status);
        $this->db->bind(':en_profile_position', $profile_position);
        $row = $this->db->single();
        return $row;
    }
    public function getprofile_tmPublished($status, $profile_position)
    {
        $this->db->query('SELECT * FROM mst_profile where status = :status and en_profile_position = :en_profile_position');
        $this->db->bind(':status', $status);
        $this->db->bind(':en_profile_position', $profile_position);
        $row = $this->db->single();
        return $row;
    }
    public function getWhatsNewPublishedCount($status)
    {
        // $sql = "select *  from mstmenu  where status = 1 order by menu_order";
        $this->db->query('SELECT count(*) FROM mst_profile where status = :status');
        $this->db->bind(':status', $status);
        $row = $this->db->fetchAll();
        return $row;
    }
    public function getWhatsNewUnpublishedCount($status)
    {
        // $sql = "select *  from mstmenu  where status = 1 order by menu_order";
        $this->db->query('SELECT count(*) FROM mst_profile where status = :status');
        $this->db->bind(':status', $status);
        $row = $this->db->fetchAll();
        return $row;
    }
    public function getWhatsNewAllCount()
    {
        // $sql = "select *  from mstmenu  where status = 1 order by menu_order";
        $this->db->query('SELECT count(*) FROM mst_profile');
        $row = $this->db->fetchAll();
        return $row;
    }
    public function test()
    {
        echo $_SESSION['table'];
    }
}
