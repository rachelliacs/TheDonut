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

    function check_login()
    {
        if (empty($this->session->userdata('is_login'))) {
            redirect('login');
        }
    }

    function delete($productID)
    {
        $this->db->where('productID', $productID);
        $this->db->delete('tb_product');
    }
}