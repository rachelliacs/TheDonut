<?php
class Auth extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
    }

    public function login($username, $userpassword)
    {
        // Lakukan query ke database untuk memeriksa apakah pengguna dengan username dan password tertentu ada
        $query = $this->db->get_where(
            'tb_user',
            array(
                'userName' => $username,
                'userPassword' => $userpassword
            )
        );

        // Periksa apakah pengguna ditemukan
        if ($query->num_rows() == 1) {
            // Jika pengguna ditemukan, kembalikan seluruh baris hasil query
            return $query->row();
        } else {
            // Jika pengguna tidak ditemukan, kembalikan null atau nilai lain yang sesuai dengan kebutuhan Anda
            return null;
        }
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

    public function get_userstatus($username)
    {
        $query = $this->db->get_where(
            'tb_user',
            array('userName' => $username)
        );
        if ($query->num_rows() == 1) {
            $user = $query->row_array();
            return $user['userStatus'];
        } else {
            return null;
        }
    }

    function delete($productID)
    {
        $this->db->where('productID', $productID);
        $this->db->delete('tb_product');
    }

    public function check_admin()
    {
        if (!$this->session->userdata('logged_in')) {
            redirect('authentication');
        }

        $userstatus = $this->session->userdata('userStatus');
        if ($userstatus !== 'admin') {
            // Jika pengguna bukan admin, lakukan sesuatu, misalnya kembalikan pesan kesalahan atau alihkan ke halaman lain
            redirect('authentication');
        }
    }

    public function check_customer()
    {
        if (!$this->session->userdata('logged_in')) {
            redirect('authentication');
        }

        $userstatus = $this->session->userdata('userStatus');
        if ($userstatus !== 'customer') {
            // Jika pengguna bukan customer, lakukan sesuatu
            redirect('authentication');
        }
    }

    public function check_employee()
    {
        if (!$this->session->userdata('logged_in')) {
            redirect('authentication');
        }

        $userstatus = $this->session->userdata('userStatus');
        if ($userstatus !== 'employee') {
            // Jika pengguna bukan employee, lakukan sesuatu
            redirect('authentication');
        }
    }

    public function error()
    {
        echo "Anda tidak memiliki izin untuk mengakses halaman ini.";
    }
}