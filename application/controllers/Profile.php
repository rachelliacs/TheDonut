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

        $userid = $this->session->userdata('userID');
        // Get the count of items in the cart
        $cart_count = $this->Cart->countItems($userid); // This function should return the count of items

        // Pass the count to the header view
        $data['cart_count'] = $cart_count;

        $this->load->view('user/templates/header', $data);
        $this->load->view('other/profile/profile', $data);
        $this->load->view('user/templates/footer');
    }

    public function update()
    {
        $this->Auth->check_customer();

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

    public function updatedata()
    {
        $id = $this->input->post('userid');
        $data = array(
            'userName' => $this->input->post('username'),
            'userEmail' => $this->input->post('useremail'),
            'userPhone' => $this->input->post('userphone'),
            'userPassword' => $this->input->post('userpassword'),
        );

        $this->Data->updateData('tb_user', 'userID', $id, $data);

        redirect('profile');
    }
}