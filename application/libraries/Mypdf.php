<?php
defined('BASEPATH') or exit('No Direct script access allowed');
require_once('assets/dompdf/autoload.inc.php');

use Dompdf\Dompdf;

class Mypdf
{
    protected $ci;

    public function __construct()
    {
        $this->ci = &get_instance();
    }

    public function generate($view, $data = [], $file_name = "laporan", $paper = "A4", $orientation = "potrait")
    {
        $dompdf = new Dompdf();
        $html = $this->ci->load->view($view, $data, TRUE);
        $dompdf->loadHtml($html);
        $dompdf->setPaper($paper, $orientation);

        // Render the HTML as PDF
        $dompdf->render();
        ob_clean();
        $dompdf->stream($file_name . ".pdf", array("Attachment" => FALSE));
    }
}
