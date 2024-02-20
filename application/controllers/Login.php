<?php
defined("BASEPATH") or exit("No direct script access allowed");

class Login extends CI_Controller
{

    function __construct()
    {
        parent::__construct();
        $this->load->model('Auth');
        $this->load->model('Data');
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

    public function process()
    {
        // Check if the form is submitted
        if ($this->input->post()) {
            // Form validation rules
            $this->form_validation->set_rules('username', 'username', 'trim|required');
            $this->form_validation->set_rules('userpassword', 'userpassword', 'trim|required');

            // Run form validation
            if ($this->form_validation->run() == TRUE) {
                // Get username and password from form
                $username = $this->input->post('username');
                $userpassword = $this->input->post('userpassword');

                // Load model to check user credentials
                $this->load->model('Auth');

                // Check if the user exists and the password is correct
                if ($this->Auth->check_login($username, $userpassword)) {
                    // Set user session or redirect to dashboard
                    $this->session->set_userdata('logged_in', TRUE);
                    // Jika proses verifikasi username dan password berhasil
                    $username = $this->input->post('username'); // Misalnya, Anda mengambil username dari formulir
                    // Contoh: setelah verifikasi username dan password berhasil

                    $query = $this->db->get('tb_user');
                    if ($query) {
                        $data['users'] = $query->result_array();
                    } else {
                        echo "Error retrieving data from the database.";
                    }

                    $this->session->set_userdata('username', $username); // Simpan nama pengguna dalam sesi
                    $this->session->set_userdata('useremail', $users['userEmail']);
                    $this->session->set_userdata('userphone', $users['userPhone']);
                    $this->session->set_userdata('userpassword', $userpassword);
                    // Redirect to dashboard or desired page
                    redirect('');
                } else {
                    // Set error flashdata and redirect back to login page
                    $this->session->set_flashdata('error', 'Invalid username or password');
                    redirect('login');
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

        $this->load->view('user/templates/header', $data);
        $this->load->view('user/pages/login', $data);
        $this->load->view('user/templates/footer');
    }

    public function logout()
    {
        // Hapus sesi 'logged_in' atau sesi lain yang menandakan login
        $this->session->unset_userdata('logged_in');
        $this->session->set_flashdata('logout_message', 'Anda telah logout.');

        // Redirect pengguna ke halaman login atau halaman lain
        redirect('home'); // Ganti 'login' dengan URL halaman login yang sesuai
    }


}