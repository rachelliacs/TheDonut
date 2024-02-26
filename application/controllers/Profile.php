<?php
class Profile extends CI_Controller
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
        $this->Auth->check_customer(); // Memeriksa apakah pengguna adalah customer

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

    public function update()
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

        // $id = $this->input->post('userid');
        // $data = array(
        //     'userName' => $this->input->post('username'),
        //     'userEmail' => $this->input->post('useremail'),
        //     'userPhone' => $this->input->post('userphone'),
        //     'userPassword' => $this->input->post('userpassword'),
        // );
        // $this->Data->updateData('tb_user', 'userID', $id, $data);

        $this->load->view('user/templates/header', $data);
        $this->load->view('other/profile/edit', $data);
        $this->load->view('user/templates/footer');
    }
}