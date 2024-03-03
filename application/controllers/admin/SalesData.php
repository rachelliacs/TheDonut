<?php
defined("BASEPATH") or exit("No direct script access allowed");

class SalesData extends CI_Controller
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
        $this->Auth->check_admin(); // Memeriksa apakah pengguna adalah admin

        $data['title'] = 'Sales';
        $table = 'tb_store';

        $this->load->database();

        $data['storedatas'] = $this->Data->getStoreData($table);
        $StoreName = '';
        if (!empty($data['storedatas'])) {
            $StoreName = $data['storedatas'][0]['storeName'];
        }
        $data['StoreName'] = $StoreName;

        $query = $this->db->get('tb_productCategory');
        if ($query) {
            $data['productcategories'] = $query->result_array();
        } else {
            echo "Error retrieving data from the database.";
        }

        // Fetch distinct months from the orders
        $this->db->distinct();
        $this->db->select("DATE_FORMAT(orderDate, '%Y-%m') AS month", false);
        $this->db->from('tb_order');
        $data['months'] = $this->db->get()->result_array();

        // Get the selected month (if any)
        $selectedMonth = $this->input->post('salesfilter');

        // Fetch orders based on the selected month, or load all orders if no month is selected
        $this->db->select('tb_order.*, tb_user.*');
        $this->db->from('tb_order');
        $this->db->join('tb_user', 'tb_user.userID = tb_order.userID');

        if ($selectedMonth) {
            $this->db->like('orderDate', $selectedMonth, 'after');
        }

        $query = $this->db->get();
        if ($query) {
            $data['orders'] = $query->result_array();
        } else {
            echo "Error retrieving data from the database.";
        }

        $this->load->view('admin/templates/header', $data);
        $this->load->view('admin/templates/contentTop');
        $this->load->view('admin/pages/salesData', $data);
        $this->load->view('admin/templates/contentBottom');
        $this->load->view('admin/templates/footer');
    }

    public function generatePdf()
    {
        // Get selected month from POST data
        $selectedMonth = $this->input->post('salesfilter');

        // Fetch sales data for the selected month from the database
        $salesData = $this->fetchSalesData($selectedMonth);

        // Format the sales data for the PDF content
        $pdfContent = $this->formatSalesDataForPdf($salesData, $selectedMonth);

        // Load TCPDF library
        $this->load->library('tcpdf');

        // Create new PDF document
        $pdf = new TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);

        // Set document information
        $pdf->SetCreator(PDF_CREATOR);
        $pdf->SetAuthor('Rachel');
        $pdf->SetTitle('Sales Report - ' . $selectedMonth);
        $pdf->SetSubject('Sales Report');
        $pdf->SetKeywords('Sales, Report, PDF');

        // Add a page
        $pdf->AddPage();

        // Set font
        $pdf->SetFont('helvetica', '', 12);

        // Output sales data in the PDF
        $pdf->writeHTML($pdfContent, true, false, true, false, '');

        // Close and output PDF
        $pdf->Output('Sales-Report-' . $selectedMonth . '.pdf', 'D');

    }

    private function fetchSalesData($selectedMonth)
    {
        if (!empty($selectedMonth)) {
            $this->db->like('orderDate', $selectedMonth, 'after');
        }
        $query = $this->db->get('tb_order');
        return $query->result_array();
    }


    private function formatSalesDataForPdf($salesData, $selectedMonth)
    {
        $totalRevenue = 0; // Initialize total revenue variable

        $html = '<div style="margin-bottom: 0px;"></div>';
        $html .= '<h2 style="margin-top: 20px; text-align: center; ">Sales Report - ' . date('F Y', strtotime($selectedMonth)) . '</h2>';
        $html .= '<p style="text-align: center; "></p>';

        foreach ($salesData as $sale) {
            $totalRevenue += $sale['orderTotalPrice'];
        }

        $html .= '<p>Total Revenue ' . ': ' . number_format($totalRevenue, 0, '.', '.') . ' IDR</p>';

        $html .= '<table border="1" cellspacing="0" cellpadding="5">';
        $html .= '<thead>';
        $html .= '<tr>';
        $html .= '<th>Order ID</th>';
        $html .= '<th>Customer</th>';
        $html .= '<th>Item Bought</th>';
        $html .= '<th>Total Pay</th>';
        $html .= '<th>Date</th>';
        $html .= '<th>Payment</th>';
        $html .= '</tr>';
        $html .= '</thead>';
        $html .= '<tbody>';

        foreach ($salesData as $sale) {
            $html .= '<tr>';
            $html .= '<td>' . $sale['orderID'] . '</td>';
            $html .= '<td>' . $sale['userID'] . '</td>';
            $html .= '<td>' . $sale['cartQuantity'] . '</td>';
            $html .= '<td>' . number_format($sale['orderTotalPrice'], 0, '.', '.') . ' IDR</td>';
            $html .= '<td>' . $sale['orderDate'] . '</td>';
            $html .= '<td>' . $sale['orderMethod'] . '</td>';
            $html .= '</tr>';
        }

        $html .= '</tbody>';
        $html .= '</table>';

        return $html;
    }
}