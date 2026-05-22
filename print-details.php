<?php 
include('config.php');
require 'dompdf/autoload.inc.php';
use Dompdf\Dompdf;

$id = $_GET['id'];
$sql = mysqli_query($connect,"SELECT * FROM crimevault_records WHERE id='$id'");
$user = mysqli_fetch_assoc($sql);

// instantiate and use the dompdf class
$dompdf = new Dompdf();
ob_start();
require('details_pdf.php');
$html =ob_get_contents();
ob_get_clean();

$dompdf->loadHtml($html);

// (Optional) Setup the paper size and orientation
$dompdf->setPaper('A4', 'landscape');

// Render the HTML as PDF
$dompdf->render();

// Output the generated PDF to Browser
$dompdf->stream('print-details.pdf',['Attachment'=>false]);
