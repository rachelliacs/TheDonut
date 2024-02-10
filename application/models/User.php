<?php
class User extends CI_Model
{
    public function deleteUser($tb_name, $userid)
    {
        $this->db->where('userID', $userid);
        $this->db->delete($tb_name);
    }
}