<?php
class Auth extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
    }

    function register($username, $useremail, $userphone, $userpassword)
    {
        $data_user = array(
            'userName' => $username,
            'userEmail' => $useremail,
            'userPhone' => $userphone,
            'userPassword' => password_hash($userpassword, PASSWORD_DEFAULT)
        );
        $this->db->insert('tb_user', $data_user);
    }

    public function check_login($username, $userpassword)
    {
        // Query to check if username and password exist in database
        $query = $this->db->get_where('tb_user', array('username' => $username, 'userpassword' => $userpassword));

        // Check if there is a matching user
        if ($query->num_rows() == 1) {
            return true;
        } else {
            return false;
        }
    }

    function delete($productID)
    {
        $this->db->where('productID', $productID);
        $this->db->delete('tb_product');
    }
}