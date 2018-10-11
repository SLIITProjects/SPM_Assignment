<?php
//include connection file 
include_once("DBConnection.php");
include_once('pdf/fpdf.php');



class PDF extends FPDF
{
// Page header
function Header()
{
    $na=$_POST['faculty'];
    $im="../img/SLIIT_Logo.png";
    // Logo
     $this->Image($im,30,5,40);
    $this->SetFont('Arial','B',13);
    // Move to the right
    $this->Cell(80);
    // Title
    $this->Cell(80,10,$na.' Faculty',1,0,'C');
    // Line break
    $this->Ln(50);
}
 
// Page footer
function Footer()
{
    // Position at 1.5 cm from bottom
    $this->SetY(-15);
    // Arial italic 8
    $this->SetFont('Arial','I',8);
    // Page number
    $this->Cell(0,10,'Page '.$this->PageNo().'/{nb}',0,0,'C');
}
}

// $db = new dbObj();
// $connString =  $db->getConnstring();
$id=$_POST['faculty'];

if($id=="Computing"){
    $i="IT";
}
else if($id=="Business"){
    $i="BM";
}
else{
    $i="EN";
}

$year=$_POST['year'];
$stringParts = explode("20", $year);
$syear=$stringParts[1];
$display_heading = array('ssid'=>'ID', 'Vmark'=> 'Name',);
 
$result = mysqli_query($con, "SELECT ssid, Vmark  FROM total_marks where ssid LIKE '$i%' AND ssid LIKE '%$syear%'") or die("database error:". mysqli_error($con));
//$header = mysqli_query($con, "SHOW columns FROM total_marks ");
 
// $sql = "SELECT Reg_no, Name FROM schedule_tab where Viva_date=' ". $sdate. " '";
//   $result = $con->query($sql);
$header = mysqli_query($con,"SELECT UCASE(`COLUMN_NAME`) 
FROM `INFORMATION_SCHEMA`.`COLUMNS` 
WHERE `TABLE_SCHEMA`='crud' 
AND `TABLE_NAME`='total_marks'
and `COLUMN_NAME` in ('ssid','Vmark')");

$pdf = new PDF();
//header
$pdf->AddPage();
//foter page
$pdf->AliasNbPages();
$pdf->SetFont('Arial','B',12);
foreach($header as $heading) {
$pdf->Cell(40,12,$display_heading[$heading['Field']],1);
}
foreach($result as $row) {
$pdf->Ln();
foreach($row as $column)
$pdf->Cell(40,12,$column,1);
}
$pdf->Output();
?>