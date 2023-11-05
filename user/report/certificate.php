
  <?php  
    require '../../fpdf/fpdf.php';
 session_start();
         $name=$_SESSION["Name"];
         $id=$_SESSION["NIDNO"];
         $fullname=$_SESSION["Name"];

         include_once('../../db/dbconnect.php');
         $fetch = "SELECT * FROM user WHERE NIDNO = '$id'";
         $auth = getDataFromDB($fetch);
         foreach($auth as $key){
          $paystatus = $key['paymentstatus'];

         }

         if($paystatus == 'pending'){
          echo '<script language="javascript">';
          echo 'alert("Your tax is not paid yet. Pay the tax as soon as possible to get the certificate."); location.href="../home.php"';
          echo '</script>';
            // echo "Your tax is not paid yet. Pay the tax as soon as possible to get the certificate.";
         }
         else{
class PDF extends FPDF 
{ 

function Footer() 
{ 

$this->SetY(-27); 
$this->SetFont('Arial','I',8); 

$this->Cell(0,10,'This certificate has been ©  © produced by thetutor',0,0,'R'); 
} 
} 

$pdf = new FPDF('L','pt','A4'); 

//Loading data 
$pdf->SetTopMargin(20); $pdf->SetLeftMargin(20); $pdf->SetRightMargin(20); 

$pdf->AddPage(); 
//  Print the edge of
$pdf->Image("fpdf181/cert.png", 20, 20, 780); 
// Print the certificate logo  
$pdf->Image("fpdf181/cert.jpg", 180, 220, 140); 
// Print the title of the certificate  
$pdf->SetFont('times','B',45); 
$pdf->Cell(920+10,200,"National Board Of Revenue",0,0,'C'); 


$pdf->SetFont('Arial','I',34); 
$pdf->SetXY(370,220); 

$pdf->Cell(350,25,$fullname,"B",0,'C',0); 


$pdf->SetFont('Arial','I',14); 
$pdf->SetXY(370,280); 
$message = "NATIONAL ID CARD HOLDER OF ".$id." IS ONE OF THE TAX PAYEES FOR THE FINANCIAL YEAR OF 2022-2023. SETTLED AS PER RULE OF 82 OF INCOME TAX ORDINANCE 1984."; 
$pdf->MultiCell(350,14,$message,0,'C',0); 


$pdf->SetFont('Arial','B',16); 
$pdf->SetXY(370,470); 
$signataire = "AUTHORIZED SIGNATURE"; 
$pdf->Cell(350,19,$signataire,"T",0,'C'); 

$pdf->Output(); 
}?> 
