<?php
session_start();
date_default_timezone_set("Asia/Dhaka");
$currenttime = date("Y-m-d H:i:s");
if ($_SESSION["Flag"] == 'Running') {
    require("../../db/dbconnect.php");
    $sql = "SELECT * FROM earning INNER JOIN user ON earning.NIDNO = user.NIDNO WHERE earning.NIDNO = '".$_SESSION['NIDNO']."'";
   
    require '../../fpdf/fpdf.php';
    $pdf = new FPDF();
    $pdf->AddPage('L');

    $pdf->SetFont("Arial", "B", 32);
    $pdf->Cell(0, 12, "National Board Of Revenue", 0, 2, 'C');
    $pdf->SetFont("Arial", "B", 38);
    $pdf->Cell(0, 16, "Bangladesh", 'B', 1, 'C');
    $pdf->SetFont("Arial", "", 22);
    $pdf->Cell(0, 40, "", '', 1, 'C');
    $pdf->Cell(0, 10, "This is certify that Mr/Mrs ".$_SESSION["Name"]." child of   ", '', 1, 'C');
    $pdf->Cell(0, 10, "Mr. ".$_SESSION["LName"]." and Mrs. ".$_SESSION["MName"]." has paid  ", '', 1, 'C');
    $pdf->Cell(0, 10, " his income tax for the financial year 2022-2023.  ", '', 1, 'C');
    $pdf->Cell(0, 10, "Which has been settled as per Rule 82 of  ", '', 1, 'C');
    $pdf->Cell(0, 10, "Income Tax Ordinance 1984.  ", '', 1, 'C');
    
    $pdf->SetFont("Arial", "", 8);

    $pdf->Cell(0, 50, "", '', 1, 'C');
    $pdf->Cell(0, 4, $currenttime , 0, 1, 'R');
    $pdf->SetFont("Arial", "", 6);
    $pdf->Cell(0, 3, 'Printed By - '.$_SESSION["NIDNO"].' [ '. $_SESSION["Name"].' ]' , 0, 1, 'R');
    $pdf->SetFont("Arial", "B", 11);
    
   

    
           
       

            
    
    
    


    $pdf->output();

 
} else {
    echo '<script language="javascript">';
    echo 'alert("Access Denied"); location.href="../index.html"';
    echo '</script>';
}
