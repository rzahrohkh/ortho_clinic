<?php
defined('BASEPATH') OR exit('No direct script access allowed');

require_once(dirname(__FILE__) . '/dompdf/autoload.inc.php');
use Dompdf\Dompdf;
use Dompdf\Options;
class Pdf
{
    function createPDF($html, $filename='', $download=TRUE, $paper='A4', $orientation='landscape'){
        $options = new Options();
        $options->set('isRemoteEnabled', TRUE);
        $options->set('tempDir', '/tmp');
        $options->set('chroot', __DIR__);
        $dompdf = new Dompdf($options);
        $dompdf->load_html($html);
        $dompdf->set_paper($paper, $orientation);
        $dompdf->render();
        if($download)
            $dompdf->stream($filename.'.pdf', array('Attachment' => 1));
        else
            $dompdf->stream($filename.'.pdf', array('Attachment' => 0));
    }
}
?>