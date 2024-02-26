<?php
class Profile extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Auth');
        $this->load->model('Data');
        $this->load->library('session');
        $this->Auth->check_customer(); // Memeriksa apakah pengguna adalah customer
    }

    public function index()
    {


        $data['title'] = 'Profile';
        $table = 'tb_store';

        $data['storedatas'] = $this->Data->getStoreData($table);
        $StoreName = '';
        if (!empty($data['storedatas'])) {
            $StoreName = $data['storedatas'][0]['storeName'];
        }
        $data['StoreName'] = $StoreName;

        $query = $this->db->get('tb_user');
        if ($query) {
            $data['users'] = $query->result_array();
        } else {
            echo "Error retrieving data from the database.";
        }

        $this->load->view('user/templates/header', $data);
        $this->load->view('other/profile/profile', $data);
        $this->load->view('user/templates/footer');
    }

    public function edit()
    {
        $data['title'] = 'Edit Profile';
        $table = 'tb_store';

        $data['storedatas'] = $this->Data->getStoreData($table);
        $StoreName = '';
        if (!empty($data['storedatas'])) {
            $StoreName = $data['storedatas'][0]['storeName'];
        }
        $data['StoreName'] = $StoreName;

        $query = $this->db->get('tb_user');
        if ($query) {
            $data['users'] = $query->result_array();
        } else {
            echo "Error retrieving data from the database.";
        }

        $this->load->view('user/templates/header', $data);
        $this->load->view('other/profile/edit', $data);
        $this->load->view('user/templates/footer');
    }
}