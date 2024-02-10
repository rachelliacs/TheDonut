<?php
defined("BASEPATH") or exit("No direct script access allowed");

class UserDataCustomer extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('auth');
    }

    public function index()
    {
        $data['title'] = 'Customer';
        $this->load->database();

        $query = $this->db->get('tb_user');
        if ($query) {
            $data['users'] = $query->result_array();
        } else {
            echo "Error retrieving data from the database.";
        }

        $query = $this->db->get('tb_store');
        if ($query) {
            $data['storedatas'] = $query->result_array();
        } else {
            echo "Error retrieving data from the database.";
        }

        $this->load->view('admin/templates/header', $data);
        $this->load->view('admin/templates/contentTop');
        $this->load->view('admin/pages/userDataCustomer', $data);
        $this->load->view('admin/templates/contentBottom');
        $this->load->view('admin/templates/footer');
    }

    public function generateUniqueID()
    {
        $prefix = 'CUST';
        $timestamp = time();
        $random = mt_rand(1000, 9999);
        $userid = $prefix . $timestamp . $random;
        return $userid;
    }

    public function add()
    {
        $userid = $this->generateUniqueID();
        $data = array(
            'userID' => $userid,
            'userName' => $this->input->post('username'),
            'userPassword' => $this->input->post('userpassword'),
            'userEmail' => $this->input->post('useremail'),
            'userPhone' => $this->input->post('userphone'),
            'userStatus' => 'customer'
        );
        $this->db->insert('tb_user', $data);
        redirect('admin/userDataCustomer');
    }
}