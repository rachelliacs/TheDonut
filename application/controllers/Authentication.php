<?php
defined("BASEPATH") or exit("No direct script access allowed");

class Authentication extends CI_Controller
{

    function __construct()
    {
        parent::__construct();
        $this->load->model('Auth');
        $this->load->model('Data');
        $this->load->library('session');
    }

    public function index()
    {
        $data['title'] = 'Login';
        $table = 'tb_store';

        $this->load->database();

        $data['storedatas'] = $this->Data->getStoreData($table);
        $StoreName = '';
        if (!empty($data['storedatas'])) {
            $StoreName = $data['storedatas'][0]['storeName'];
        }
        $data['StoreName'] = $StoreName;

        $this->load->view('user/templates/header', $data);
        $this->load->view('user/pages/login', $data);
        $this->load->view('user/templates/footer');
    }

    public function login()
    {
        // Jika form login disubmit
        if ($this->input->post()) {

            $this->form_validation->set_rules('username', 'Username', 'trim|required');
            $this->form_validation->set_rules('userpassword', 'Password', 'trim|required');

            if ($this->form_validation->run() == TRUE) {
                $username = $this->input->post('username');
                $userpassword = $this->input->post('userpassword');

                // Proses autentikasi, contoh menggunakan model
                $user = $this->Auth->login($username, $userpassword);

                if ($user) {
                    // Jika autentikasi berhasil, atur sesi
                    $userstatus = $this->Auth->get_userstatus($username); // Mendapatkan status pengguna dari database
                    $user_data = array(
                        'userID' => $user->userID,
                        'userName' => $user->userName,
                        'userStatus' => $userstatus,
                        'logged_in' => true
                    );
                    $this->session->set_userdata($user_data);

                    // Redirect based on user status
                    $this->redirect_by_userstatus($userstatus);
                } else {
                    // Jika autentikasi gagal, tampilkan pesan kesalahan
                    $data['error'] = 'Username atau password salah';
                }
            }
        }

        $data['title'] = 'Login';
        $table = 'tb_store';

        $this->load->database();

        $data['storedatas'] = $this->Data->getStoreData($table);
        $StoreName = '';
        if (!empty($data['storedatas'])) {
            $StoreName = $data['storedatas'][0]['storeName'];
        }
        $data['StoreName'] = $StoreName;

        // Tampilkan halaman login
        $this->load->view('user/templates/header', $data);
        $this->load->view('user/pages/login', $data);
        $this->load->view('user/templates/footer');
    }

    private function redirect_by_userstatus($userstatus)
    {
        switch ($userstatus) {
            case 'admin':
                redirect('admin/dashboard');
                break;
            case 'customer':
                redirect('dashboard');
                break;
            case 'employee':
                redirect('employee/dashboard');
                break;
            default:
                // Jika status pengguna tidak dikenali, kembalikan ke halaman login
                redirect('authentication');
                break;
        }
    }

    public function logout()
    {
        // Hapus semua data sesi dan alihkan ke halaman login
        $this->session->sess_destroy();
        redirect('authentication');
    }
}