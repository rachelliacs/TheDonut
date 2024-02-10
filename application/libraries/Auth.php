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

    function login_user($username, $userpassword)
    {
        $query = $this->db->get_where('tb_user', array('username' => $username));
        if ($query->num_rows() > 0) {
            $data_user = $query->row();
            if (password_verify($userpassword, $data_user->password)) {
                $this->session->set_userdata('username', $username);
                $this->session->set_userdata('is_login', TRUE);
                return TRUE;
            } else {
                return FALSE;
            }
        } else {
            return FALSE;
        }
    }

    function check_login()
    {
        if (empty($this->session->userdata('is_login'))) {
            redirect('login');
        }
    }
}