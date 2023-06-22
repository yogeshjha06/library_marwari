<!DOCTYPE html>
<html>
<head>
    <title>Notice - Print</title>
    <link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>


<?php
include('db.php');//path to db.php

if(isset($_POST['delete']))
{
    $sql="DELETE FROM db_notice WHERE id='$_POST[id]'";
    $result=$con->query($sql);
    header('location:notice.php');
}
if(isset($_POST['print']))
{
    ob_start();
    //require ('fpdf/fpdf.php');//path to fpdf.php
    require ('fpdf/fit.php');//path to fpdf.php
    $pdf = new FPDF_CellFit();
    $image1="assets/img/marwari.jpeg";
    $pdf->AddPage();
    $pdf->Image($image1, 6,3,25,25);
    $pdf->Image($image1, 166,3,25,25);
    $pdf->SetFont('Times', 'B', 16);
    $pdf->Cell(176, 5, 'MARWARI COLLEGE RANCHI - JHARKHAND', 0, 0, 'C');
    $pdf->Ln();
    $pdf->SetFont('Times', 'B', 10);
    $pdf->Cell(176, 10, 'NAAC Accredited Autonomous College With Potential For Excellence', 0, 0, 'C');
    $pdf->Ln(20);
    $pdf->SetFont('Times', 'I', 11);    
    $pdf->Cell(170,12,'Date: '.$_POST["id_date"], 0, 0, 'R');
    $pdf->Ln();
    $pdf->Cell(40,10,'Subject: '.$_POST["id_sub"], 0, 0, 'L');
    $pdf->Ln();
    $pdf->SetFont('Times', 'B', 14); 
    $pdf->Cell(176,10,'NOTICE', 0, 0, 'C');
    $pdf->Ln(20);
    $pdf->SetFont('Times', 'I', 11); 
    //$pdf1 = new FPDF_CellFit();
    $pdf->MultiCell(176,5,$_POST["id_notice"]);//(170,100,$_POST["id_notice"],100,100,'',100);


    $pdf->Ln(20);
    $pdf->SetFont('Times', 'I', 14);    
    $pdf->Cell(176,10,'Signature', 0, 0, 'R');

    $pdf->Output();
    ob_end_flush();
}
else
{
    $idnotice=$_GET['id'];//id of the notice

     //find notice details
     $sqlx="SELECT * FROM db_notice WHERE id = '$idnotice'";
     $queryx=mysqli_query($con,$sqlx);//query fire
     $rs1x = mysqli_fetch_array($queryx);
       $subject = $rs1x["subject"];//subject of the notice
       $notice = $rs1x["notice"];//subject of the notice
       $date = $rs1x["date"];//subject of the notice

    ob_start();
    //require ('fpdf/fpdf.php');//path to fpdf.php
    require ('fpdf/fit.php');//path to fpdf.php
    $pdf = new FPDF_CellFit();
    $image1="assets/img/marwari.jpeg";
    $pdf->AddPage();
    $pdf->Image($image1, 6,3,25,25);
    $pdf->Image($image1, 166,3,25,25);
    $pdf->SetFont('Times', 'B', 16);
    $pdf->Cell(176, 5, 'MARWARI COLLEGE RANCHI - JHARKHAND', 0, 0, 'C');
    $pdf->Ln();
    $pdf->SetFont('Times', 'B', 10);
    $pdf->Cell(176, 10, 'NAAC Accredited Autonomous College With Potential For Excellence', 0, 0, 'C');
    $pdf->Ln(20);
    $pdf->SetFont('Times', 'I', 11);    
    $pdf->Cell(170,12,'Date: '.$date, 0, 0, 'R');
    $pdf->Ln();
    $pdf->Cell(40,10,'Subject: '.$subject, 0, 0, 'L');
    $pdf->Ln();
    $pdf->SetFont('Times', 'B', 14); 
    $pdf->Cell(176,10,'NOTICE', 0, 0, 'C');
    $pdf->Ln(20);
    $pdf->SetFont('Times', 'I', 11); 
    //$pdf1 = new FPDF_CellFit();
    $pdf->MultiCell(176,5,$notice);//(170,100,$_POST["id_notice"],100,100,'',100);


    $pdf->Ln(20);
    $pdf->SetFont('Times', 'I', 14);    
    $pdf->Cell(176,10,'Signature', 0, 0, 'R');

    $pdf->Output();
    ob_end_flush();
}
?>

</body>
</html>