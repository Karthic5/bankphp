<?php
// require_once('tcpdf/config/lang/eng.php');
require_once('tcpdf/tcpdf.php');
      ob_start();  

// create new PDF document
$pdf = new TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);
// set document information
$pdf->SetCreator(PDF_CREATOR);
$pdf->SetAuthor('Ben');
$pdf->SetTitle('PDF');
$pdf->SetSubject('PDF');
$pdf->SetKeywords('PDF');
// set default monospaced font
$pdf->SetDefaultMonospacedFont(PDF_FONT_MONOSPACED);
//set margins
$pdf->SetMargins(PDF_MARGIN_LEFT, PDF_MARGIN_TOP, PDF_MARGIN_RIGHT);
//set auto page breaks
$pdf->SetAutoPageBreak(TRUE, PDF_MARGIN_BOTTOM);
//set image scale factor
$pdf->setImageScale(PDF_IMAGE_SCALE_RATIO);
//set some language-dependent strings
$pdf->setLanguageArray($l);
// ---------------------------------------------------------
// set default font subsetting mode
$pdf->setFontSubsetting(true);
// Set font
// dejavusans is a UTF-8 Unicode font, if you only need to
// print standard ASCII chars, you can use core fonts like
// helvetica or times to reduce file size.
$pdf->SetFont('dejavusans', '', 14, '', true);
// Add a page
// This method has several options, check the source code documentation for more information.
$pdf->AddPage();
// Set some content to print
$tbl_header = '<table border="1">';
$tbl_footer = '</table>';
$tbl ='';
$con=mysql_connect("localhost", "root", "");// or die (mysql_error()); //Connect to server
mysql_select_db("bankproject",$con);// or die ("Cannot connect to database"); //Connect to database 
    
      // $sql = "SELECT * FROM tbl_employee ORDER BY id ASC";  
      $query=mysql_query("SELECT * FROM mstuser ORDER BY userid  ASC",$con);
while($row = mysql_fetch_array($query))
  {
  $id = $row['userid'];
  $key = $row['firstName'];
  $ke = $row['email'];
$tbl .= '<tr><td>' . $id . '</td><td>' . $key . '</td><td>' . $ke . '</td></tr>';
}
// Print text using writeHTMLCell()
$pdf->writeHTML($tbl_header . $tbl . $tbl_footer, true, false, false, false, '');
// ---------------------------------------------------------
// Close and output PDF document
// This method has several options, check the source code documentation for more information.
    ob_end_clean();

$pdf->Output('example.pdf', 'I');
//============================================================+
// END OF FILE
//============================================================+
?>