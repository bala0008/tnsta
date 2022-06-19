<?php


class Users
{
    private $db;
    public function __construct()
    {
        $this->db = new Database;
    }
    public function addWhatsNew($data)
    {
        $this->db->query('INSERT INTO mst_whatsnew(
            tn_whatsnew_title, en_whatsnew_title,wh_new_pdf,wh_new_from_date,wh_new_to_date,created_by,created_on,status)
            VALUES (:tn_whatsnew_title,:en_whatsnew_title,:wh_new_pdf,:wh_new_from_date,:wh_new_to_date,:created_by,:created_on,:status);');
        $this->db->bind(':tn_whatsnew_title', $data['tn_whatsnew_title']);
        $this->db->bind(':en_whatsnew_title', $data['en_whatsnew_title']);
        $this->db->bind(':wh_new_pdf', $data['wh_new_pdf']);

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
    public function login($username, $password)
    {
        $this->db->query('SELECT mst_account.acc_name as username, mst_account.acc_email as useremail, mst_account.acc_password as userpassword, mst_account.acc_id as userid,roles.role_id as roleid, roles.role_name as rolename FROM mst_account JOIN roles
        ON mst_account.acc_role = roles.role_id where mst_account.acc_name =:acc_name and mst_account.acc_password = :acc_password');
        $this->db->bind(':acc_name', $username);
        $this->db->bind(':acc_password', $password);

        $row = $this->db->single();
        //check the row 
        if ($this->db->rowCount() > 0) {
            
            return $row;
        } else {
            return false;
        }
    }
    //find user by email
    public function findUserByUserName($username)
    {
        $this->db->query('SELECT * FROM mst_account WHERE acc_name = :acc_name');
        $this->db->bind(':acc_name', $username);


        $row = $this->db->single();
        //check the row 
        if ($this->db->rowCount() > 0) {
            return true;
        } else {
            return false;
        }
    }
}
