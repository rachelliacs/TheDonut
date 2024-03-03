<?php
defined('BASEPATH') or exit('No direct script access allowed');

require_once APPPATH . 'third_party/tcpdf/tcpdf.php'; // Include TCPDF library

class Pdf_library
{
    public function __construct()
    {
        log_message('Debug', 'PDF class is loaded.');
    }

    public function generateSalesPdf($data)
    {
        // Create new PDF document
        $pdf = new TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);

        // Set document information
        $pdf->SetCreator(PDF_CREATOR);
        $pdf->SetTitle('Sales Report');

        // Add a page
        $pdf->AddPage();

        // Set some content
        $html = '<h1>Sales Report</h1>';
        $html .= '<p>This is the sales report content.</p>';

        // Output HTML content as PDF
        $pdf->writeHTML($html, true, false, true, false, '');

        // Close and output PDF document
        $pdf->Output('sales_report.pdf', 'D');
    }
}