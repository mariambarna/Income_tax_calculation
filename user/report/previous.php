<?php
//SHOW A DATABASE ON A PDF FILE
//CREATED BY: Carlos Vasquez S.
//E-MAIL: cvasquez@cvs.cl
//CVS TECNOLOGIA E INNOVACION
//SANTIAGO, CHILE

session_start();

function tax($totaltaxable, $agri){
    include_once '../../db/dbconnect.php';
                    $sql = "SELECT * FROM basic WHERE NIDNO = '".$_SESSION['NIDNO']."'  LIMIT 1";
                    
  
                    $auth = getDataFromDB($sql);
                    foreach($auth as $row){ 
                      $gender =   $row['Gender'];
                      $disable = $row['Disable'];
                      $ff = $row['FF'];
                      $age = $row['Age'];
  
                      if($age >= 18){
                          if($gender == "Male"){
                            if($age >= 65){
                              if($disable == "Yes"){
                                if($ff == "Yes"){
                                  $cut = 475000;
                                }
                                else{
                                  $cut = 450000;
                                }
                              }
                              else{
                                if($ff == "Yes"){
                                    $cut = 475000;
                                }
                                else{
                                  $cut = 350000;
                                }
                              }
                            }
                            else{
                              if($disable == "Yes"){
                                if($ff == "Yes"){
                                  $cut = 475000;
                                }
                                else{
                                  $cut = 450000;
                                }
                              }
                              else{
                                if($ff == "Yes"){
                                    $cut = 475000;
                                }
                                else{
   $cut = 300000;
                                }
                              }
                            }
                          }
                          else{
                            if($age >= 65){
                              if($disable == "Yes"){
                                if($ff == "Yes"){
                                  $cut = 475000;
                                }
                                else{
                                  $cut = 450000;
                                }
                              }
                              else{
                                if($ff == "Yes"){
                                    $cut = 475000;
                                }
                                else{
                                  $cut = 350000;
                                }
                              }
                            }
                            else{
                              if($disable == "Yes"){
                                if($ff == "Yes"){
                                  $cut = 475000;
                                }
                                else{
                                  $cut = 450000;
                                }
                              }
                              else{
                                if($ff == "Yes"){
                                    $cut = 475000;
                                }
                                else{
   $cut = 350000;
                                }
                              }
                            }
  
  
                          }
                         
                      }
                      else{
                        // $cut = 0;
                        
                      }
  
                     if($agri > 0){
                      $taxfree = $cut + 200000;
                      
                     }
                     else{
                      $taxfree = $cut;
                     }
  
                    //  $score > 10 ? 'genius' : 'nobody'
  
                    $zero = $taxfree;
                    $first = $totaltaxable - $taxfree > 0 ? ($totaltaxable - $taxfree < 100000 ? $totaltaxable - $taxfree : 100000) : 0;
  
                    $second = $totaltaxable - $taxfree - 100000 > 0 ? ($totaltaxable - $taxfree < 300000 ? $totaltaxable - $taxfree - 100000 : 300000) : 0;
                    
                    $third = $totaltaxable - $taxfree - 400000 > 0 ? ($totaltaxable - $taxfree - 400000 < 400000 ? $totaltaxable - $taxfree - 400000 : 400000) : 0;
                    
                    $fourth = $totaltaxable - $taxfree - 800000 > 0 ? ($totaltaxable - $taxfree - 800000 < 500000 ? $totaltaxable - $taxfree - 800000: 500000) : 0;
  
                    $fifth = $totaltaxable - $taxfree - 1300000 > 0 ? $totaltaxable - $taxfree - 1300000 : 0;
                    // $sixth = 
                    // return $fifth;
  
                    $totaltax = $zero*0 + $first*0.05 + $second*0.1 + $third * 0.15 + $fourth* 0.2 + $fifth * 0.25;
  return $totaltax;
  
                    };
  }


function houserent($basic, $houserent){
    $discount1 = $basic * 12 * 50 / 100;
    $discount2 = 25000 * 12;
    if($discount1> $discount2){
      $discount = $discount2;
    }
    else{

      $discount = $discount1;
    }
      // return $discount2;
    $payable =  $houserent*12 - $discount;

    if($payable > 0){
      return $payable;
    }
    else{
      return 0;
    }
  
   }

   
   
   function medical($basic, $medical){
    $discount1 = $basic * 12 * 10 / 100;
    $discount2 = 10000 * 12;
    if($discount1> $discount2){
      $discount = $discount2;
    }
    else{

      $discount = $discount1;
    }
      // return $discount2;
    $payable =  $medical*12 - $discount;

    if($payable > 0){
      return $payable;
    }
    else{
      return 0;
    }
  
   }

   function transport($basic){
   
      // return $discount2;
    $payable =  $basic*12 - 30000;

    if($payable > 0){
      return $payable;
    }
    else{
      return 0;
    }
  
   }








require '../../fpdf/fpdf.php';

//Connect to your database
require '../../db/dbconnect.php';

//Select the Products you want to show in your PDF file
// $result=mysql_query("select Code,Name,Price from Products ORDER BY Code",$link);
// $number_of_products = mysql_numrows($result);
$sql= "SELECT * FROM earning WHERE NIDNO = '".$_SESSION['NIDNO']."' AND YEAR = '".$_GET['Year']."'  LIMIT 1";
// $number_of_products = mysql_numrows($result);
$result = getDataFromDB($sql);


//Initialize the 3 columns and the total
$column_code = "";
$column_name = "";
$column_price = "";
$total = 0;
$number_of_products = 1;
//For each row, add the field to the corresponding column
// while($row = mysql_fetch_array($result))
foreach($result as $row)
{
    $Year = $row['Year'];
    $basic = $row['BasicSalary'];
    $special = $row['SpecialSalary'];
    $houserent = $row['HouseRent'];
    $housetaxable = houserent($basic,$houserent);
    $medical = $row['MedicalAllowance'];
    $medicaltaxable = medical($basic, $medical);
    $critical = $row['CriticalCare'];
    $transport = $row['TransportAllowance'];
    $transporttaxable = transport($basic);
    $festival = $row['FestivalAllowance'];
    $assistant = $row['PAssistantAllowance'];
    $vacation = $row['VacationAllowance'];
    $prize = $row['PrizeAllowance'];
    $overtime = $row['OvertimeAllowance'];
    $policy = $row['PolicyAllowance'];
    $premium = $row['PolicyPremium'];
    $bonus = $row['BonusAllowance'];
    $allowance = $row['Allowance'];
    $others = $row['Others'];
$totaljob = $basic+$special+$housetaxable+$medicaltaxable+$transporttaxable+$festival+$assistant+$vacation+$prize+$overtime+$policy+$bonus+$allowance+$others;

    $sale = $row['SaleValue'];
    $purchase = $row['PurchaseValue'];
    $misc = $row['Misc'];
    $bill = $row['Bill'];
    $furniture = $row['Furniture'];
    $totalbus = $sale-$purchase-$misc-$bill;


    $agrisale = $row['AgriSaleValue'];
    $totalagri = $agrisale - $agrisale * 0.6;
    
    
    $homecount = $row['HomeCount'];
    $rent = $row['Rent'];
    $own = $row['OwnUse'];
    $hometax = $row['HomeTax'];
    $land = $row['LandTax'];
    $homeloan = $row['HomeLoan']; 

    // var_dump($row);
    $rentunit = $homecount-$own;
    // var_dump($rentunit);
    if($homecount == 0){

        $earnunit = 1;
    }
    else{

        $earnunit = $rentunit / $homecount;
    }
    // $earnunit = 1;
$rentyear = ceil($rent * 12 * $homecount * $earnunit);
$dev = $rentyear * 0.25;
$netrent = $rentyear - $dev;
$htax = $hometax * $earnunit;
$ltax = $land * $earnunit;
$hloan = $homeloan * $earnunit;

$totalhome = $netrent - $htax - $ltax - $hloan;
    
    $taxabletotal = $totaljob + $totalbus + $totalagri + $totalhome;
    $tax = tax($taxabletotal,$totalagri);
    

}


//Create a new PDF file
$pdf=new FPDF();
$pdf->AddPage();

$pdf->SetFont("Arial", "B", 32);
$pdf->Cell(0, 12, "National Board Of Revenue", 0, 2, 'C');
$pdf->Cell(0, 12, "Bangladesh", 0, 2, 'C');
$pdf->SetFont("Arial", "B", 22);
$pdf->SetY(40);
$pdf->Cell(0, 12, "Income Report of Job Holder", 0, 2, 'C');
//Fields Name position
$Y_Fields_Name_position = 60;
//Table position, under Fields Name
$Y_Table_Position = 66;

//First create each Field Name
//Gray color filling each Field Name box
$pdf->SetFillColor(232,232,232);
//Bold Font for Field Name
$pdf->SetFont('Arial','B',12);
$pdf->SetY($Y_Fields_Name_position);
$pdf->SetX(25);
$pdf->Cell(20,6,'Serial',1,0,'C',1);
$pdf->SetX(45);
$pdf->Cell(45,6,'Terms',1,0,'C',1);
$pdf->SetX(90);
$pdf->Cell(30,6,'Amount',1,0,'C',1);
$pdf->SetX(120);
$pdf->Cell(30,6,'Tax Free',1,0,'C',1);
$pdf->SetX(150);
$pdf->Cell(30,6,'Taxable',1,0,'C',1);
$pdf->Ln();

//Now show the 3 columns
// $pdf->SetFont('Arial','',12);
// $pdf->SetY($Y_Table_Position);
// $pdf->SetX(45);
// $pdf->MultiCell(20,6,$column_code,1);
// $pdf->SetY($Y_Table_Position);
// $pdf->SetX(65);
// $pdf->MultiCell(100,6,$column_name,1);
// $pdf->SetY($Y_Table_Position);
// $pdf->SetX(135);
// $pdf->MultiCell(30,6,$column_price,1,'R');
// $pdf->SetX(135);
// $pdf->MultiCell(30,6,'$ '.$total,1,'R');

$pdf->SetFillColor(255,255,255);
$pdf->SetFont('Arial','',12);
// $pdf->SetY($Y_Fields_Name_position);
$pdf->SetX(25);
$pdf->Cell(20,6,'1',1,0,'C',1);
$pdf->SetX(45);
$pdf->Cell(45,6,'Basic Salary',1,0,'C',1);
$pdf->SetX(90);
$pdf->Cell(30,6,$basic,1,0,'C',1);
$pdf->SetX(120);
$pdf->Cell(30,6,'0%',1,0,'C',1);
$pdf->SetX(150);
$pdf->Cell(30,6,$basic,1,0,'C',1);
$pdf->Ln();

$pdf->SetX(25);
$pdf->Cell(20,6,'2',1,0,'C',1);
$pdf->SetX(45);
$pdf->Cell(45,6,'Special Salary',1,0,'C',1);
$pdf->SetX(90);
$pdf->Cell(30,6,$special,1,0,'C',1);
$pdf->SetX(120);
$pdf->Cell(30,6,'0%',1,0,'C',1);
$pdf->SetX(150);
$pdf->Cell(30,6,$special,1,0,'C',1);
$pdf->Ln();

$pdf->SetX(25);
$pdf->Cell(20,6,'3',1,0,'C',1);
$pdf->SetX(45);
$pdf->Cell(45,6,'House Rent',1,0,'C',1);
$pdf->SetX(90);
$pdf->Cell(30,6,$houserent,1,0,'C',1);
$pdf->SetX(120);
$pdf->Cell(30,6,'Point 1',1,0,'C',1);
$pdf->SetX(150);
$pdf->Cell(30,6,$housetaxable,1,0,'C',1);
$pdf->Ln();

$pdf->SetX(25);
$pdf->Cell(20,6,'4',1,0,'C',1);
$pdf->SetX(45);
$pdf->Cell(45,6,'Medical Allowance',1,0,'C',1);
$pdf->SetX(90);
$pdf->Cell(30,6,$medical,1,0,'C',1);
$pdf->SetX(120);
$pdf->Cell(30,6,'Point 2',1,0,'C',1);
$pdf->SetX(150);
$pdf->Cell(30,6,$medicaltaxable,1,0,'C',1);
$pdf->Ln();

$pdf->SetX(25);
$pdf->Cell(20,6,'5',1,0,'C',1);
$pdf->SetX(45);
$pdf->Cell(45,6,'Critical Care',1,0,'C',1);
$pdf->SetX(90);
$pdf->Cell(30,6,$critical,1,0,'C',1);
$pdf->SetX(120);
$pdf->Cell(30,6,'Full',1,0,'C',1);
$pdf->SetX(150);
$pdf->Cell(30,6,0,1,0,'C',1);
$pdf->Ln();

$pdf->SetX(25);
$pdf->Cell(20,6,'6',1,0,'C',1);
$pdf->SetX(45);
$pdf->Cell(45,6,'Transport Allowance',1,0,'C',1);
$pdf->SetX(90);
$pdf->Cell(30,6,$transport,1,0,'C',1);
$pdf->SetX(120);
$pdf->Cell(30,6,'Point 3',1,0,'C',1);
$pdf->SetX(150);
$pdf->Cell(30,6,$transporttaxable,1,0,'C',1);
$pdf->Ln();

$pdf->SetX(25);
$pdf->Cell(20,6,'7',1,0,'C',1);
$pdf->SetX(45);
$pdf->Cell(45,6,'Festival Allowance',1,0,'C',1);
$pdf->SetX(90);
$pdf->Cell(30,6,$festival,1,0,'C',1);
$pdf->SetX(120);
$pdf->Cell(30,6,'0%',1,0,'C',1);
$pdf->SetX(150);
$pdf->Cell(30,6,$festival,1,0,'C',1);
$pdf->Ln();

$pdf->SetX(25);
$pdf->Cell(20,6,'8',1,0,'C',1);
$pdf->SetX(45);
$pdf->Cell(45,6,'Personal Assistant',1,0,'C',1);
$pdf->SetX(90);
$pdf->Cell(30,6,$assistant,1,0,'C',1);
$pdf->SetX(120);
$pdf->Cell(30,6,'0%',1,0,'C',1);
$pdf->SetX(150);
$pdf->Cell(30,6,$assistant,1,0,'C',1);
$pdf->Ln();

$pdf->SetX(25);
$pdf->Cell(20,6,'9',1,0,'C',1);
$pdf->SetX(45);
$pdf->Cell(45,6,'Vacation Allowance',1,0,'C',1);
$pdf->SetX(90);
$pdf->Cell(30,6,$vacation,1,0,'C',1);
$pdf->SetX(120);
$pdf->Cell(30,6,'0%',1,0,'C',1);
$pdf->SetX(150);
$pdf->Cell(30,6,$vacation,1,0,'C',1);
$pdf->Ln();

$pdf->SetX(25);
$pdf->Cell(20,6,'10',1,0,'C',1);
$pdf->SetX(45);
$pdf->Cell(45,6,'Overtime Allowance',1,0,'C',1);
$pdf->SetX(90);
$pdf->Cell(30,6,$overtime,1,0,'C',1);
$pdf->SetX(120);
$pdf->Cell(30,6,'0%',1,0,'C',1);
$pdf->SetX(150);
$pdf->Cell(30,6,$overtime,1,0,'C',1);
$pdf->Ln();

$pdf->SetX(25);
$pdf->Cell(20,6,'11',1,0,'C',1);
$pdf->SetX(45);
$pdf->Cell(45,6,'Prize Allowance',1,0,'C',1);
$pdf->SetX(90);
$pdf->Cell(30,6,$prize,1,0,'C',1);
$pdf->SetX(120);
$pdf->Cell(30,6,'0%',1,0,'C',1);
$pdf->SetX(150);
$pdf->Cell(30,6,$prize,1,0,'C',1);
$pdf->Ln();

$pdf->SetX(25);
$pdf->Cell(20,6,'12',1,0,'C',1);
$pdf->SetX(45);
$pdf->Cell(45,6,'Policy Allowance',1,0,'C',1);
$pdf->SetX(90);
$pdf->Cell(30,6,$policy,1,0,'C',1);
$pdf->SetX(120);
$pdf->Cell(30,6,'0%',1,0,'C',1);
$pdf->SetX(150);
$pdf->Cell(30,6,$policy,1,0,'C',1);
$pdf->Ln();

$pdf->SetX(25);
$pdf->Cell(20,6,'13',1,0,'C',1);
$pdf->SetX(45);
$pdf->Cell(45,6,'Bonus',1,0,'C',1);
$pdf->SetX(90);
$pdf->Cell(30,6,$bonus,1,0,'C',1);
$pdf->SetX(120);
$pdf->Cell(30,6,'0%',1,0,'C',1);
$pdf->SetX(150);
$pdf->Cell(30,6,$bonus,1,0,'C',1);
$pdf->Ln();

$pdf->SetX(25);
$pdf->Cell(20,6,'14',1,0,'C',1);
$pdf->SetX(45);
$pdf->Cell(45,6,'Others',1,0,'C',1);
$pdf->SetX(90);
$pdf->Cell(30,6,$others,1,0,'C',1);
$pdf->SetX(120);
$pdf->Cell(30,6,'0%',1,0,'C',1);
$pdf->SetX(150);
$pdf->Cell(30,6,$others,1,0,'C',1);
$pdf->Ln();

$pdf->SetX(25);
$pdf->Cell(20,6,'15',1,0,'C',1);
$pdf->SetX(45);
$pdf->Cell(45,6,'Extra',1,0,'C',1);
$pdf->SetX(90);
$pdf->Cell(30,6,$allowance,1,0,'C',1);
$pdf->SetX(120);
$pdf->Cell(30,6,'0%',1,0,'C',1);
$pdf->SetX(150);
$pdf->Cell(30,6,$allowance,1,0,'C',1);
$pdf->Ln();


$pdf->SetX(25);
$pdf->Cell(130,6,'Total',1,0,'C',1);
$pdf->SetX(150);
$pdf->Cell(30,6,$totaljob,1,0,'C',1);
$pdf->Ln();

$pdf->SetX(25);
$pdf->Cell(0, 12, "", 0, 2, 'L');
$pdf->Cell(0, 6, "Point 1: House Rent", 0, 2, 'L');

$pdf->SetFont("Arial", "I", 10);
$pdf->Cell(0, 6, "The lowest between 50% of basic (yearly) and 25000 monthly will be tax free. ", 0, 1, 'L');


$pdf->SetX(25);
$pdf->Cell(0, 12, "", 0, 2, 'L');
$pdf->Cell(0, 6, "Point 2: Medical Allowance", 0, 2, 'L');

$pdf->SetFont("Arial", "I", 10);
$pdf->Cell(0, 6, "The lowest between 10% of basic (yearly) and 10000 monthly will be tax free. ", 0, 1, 'L');


$pdf->SetX(25);
$pdf->Cell(0, 12, "", 0, 2, 'L');
$pdf->Cell(0, 6, "Point 3: Transport", 0, 2, 'L');

$pdf->SetFont("Arial", "I", 10);
$pdf->Cell(0, 6, "The lowest between 30000 yearly and paid allowance  will be tax free. ", 0, 1, 'L');













$pdf->AddPage();

$pdf->SetFont("Arial", "B", 32);
$pdf->Cell(0, 12, "National Board Of Revenue", 0, 2, 'C');
$pdf->Cell(0, 12, "Bangladesh", 0, 2, 'C');
$pdf->SetFont("Arial", "B", 22);
$pdf->SetY(40);
$pdf->Cell(0, 12, "Income Report of Businessman", 0, 2, 'C');



$pdf->SetFont('Arial','B',12);
$pdf->SetY($Y_Fields_Name_position);
$pdf->SetX(25);
$pdf->Cell(50,6,'Debit',1,0,'C',1);
$pdf->SetX(75);
$pdf->Cell(25,6,'Amount',1,0,'C',1);
$pdf->SetX(105);
$pdf->Cell(50,6,'Credit',1,0,'C',1);
$pdf->SetX(150);
$pdf->Cell(25,6,'Amount',1,0,'C',1);
$pdf->Ln();


$pdf->SetX(25);
$pdf->Cell(50,18,'Sale',1,0,'C',1);
$pdf->SetX(75);
$pdf->Cell(25,18,$sale,1,0,'C',1);
$pdf->SetX(105);
$pdf->Cell(50,6,'Purchase',1,0,'C',1);
$pdf->SetX(150);
$pdf->Cell(25,6,$purchase,1,0,'C',1);
$pdf->Ln();


$pdf->SetX(25);

$pdf->SetX(105);
$pdf->Cell(50,6,'Misc',1,0,'C',1);
$pdf->SetX(150);
$pdf->Cell(25,6,$misc,1,0,'C',1);
$pdf->Ln();


$pdf->SetX(25);

$pdf->SetX(105);
$pdf->Cell(50,6,'Bill',1,0,'C',1);
$pdf->SetX(150);
$pdf->Cell(25,6,$bill,1,0,'C',1);
$pdf->Ln();


$pdf->SetX(25);
$pdf->Cell(50,6,'Total',1,0,'C',1);
$pdf->SetX(75);
$pdf->Cell(25,6,$sale,1,0,'C',1);
$pdf->SetX(105);
$pdf->Cell(50,6,'Total',1,0,'C',1);
$pdf->SetX(150);
$pdf->Cell(25,6,$purchase+$misc+$bill,1,0,'C',1);
$pdf->Ln();


$pdf->Cell(0, 12, "", 0, 2, 'C');

$pdf->Cell(0, 12, "Total Taxable", 0, 2, 'C');
$pdf->Cell(0, 12, $totalbus, 0, 2, 'C');



$pdf->AddPage();

$pdf->SetFont("Arial", "B", 32);
$pdf->Cell(0, 12, "National Board Of Revenue", 0, 2, 'C');
$pdf->Cell(0, 12, "Bangladesh", 0, 2, 'C');
$pdf->SetFont("Arial", "B", 22);
$pdf->SetY(40);
$pdf->Cell(0, 12, "Income Report of Farming", 0, 2, 'C');



$pdf->Cell(0, 12, "", 0, 2, 'C');

$pdf->SetFont('Arial','',12);
$pdf->Cell(0, 12, "Total Sale", 0, 2, 'C');
$pdf->Cell(0, 12, $agrisale, 0, 2, 'C');

$pdf->Cell(0, 12, "Costing (60% of total sale)", 0, 2, 'C');
$pdf->Cell(0, 12, $agrisale*60/100, 0, 2, 'C');


$pdf->Cell(0, 12, "", 0, 2, 'C');

$pdf->Cell(0, 12, "Total Taxable", 0, 2, 'C');
$pdf->Cell(0, 12, $agrisale-$agrisale*60/100, 0, 2, 'C');



$pdf->AddPage();

$pdf->SetFont("Arial", "B", 32);
$pdf->Cell(0, 12, "National Board Of Revenue", 0, 2, 'C');
$pdf->Cell(0, 12, "Bangladesh", 0, 2, 'C');
$pdf->SetFont("Arial", "B", 22);
$pdf->SetY(40);
$pdf->Cell(0, 12, "Income Report of House Owner", 0, 2, 'C');


$pdf->SetFont('Arial','',12);
$pdf->Cell(0, 30, "Earning", 0, 2, 'C');
$pdf->SetY(76);


$pdf->SetX(25);
$pdf->Cell(105,12,'Rent Per Unit',0,0,'C',1);
$pdf->SetX(130);
$pdf->Cell(50,12,$rent,0,0,'C',1);
$pdf->Ln();


$pdf->SetX(25);
$pdf->Cell(105,12,'Total Number of Units',0,0,'C',1);
$pdf->SetX(130);
$pdf->Cell(50,12,$homecount,0,0,'C',1);
$pdf->Ln();


$pdf->SetX(25);
$pdf->Cell(105,12,'Units Own Use',0,0,'C',1);
$pdf->SetX(130);
$pdf->Cell(50,12,$own,0,0,'C',1);
$pdf->Ln();



$pdf->SetX(25);
$pdf->Cell(105,12,'Units On Rent',0,0,'C',1);
$pdf->SetX(130);
$pdf->Cell(50,12,$homecount-$own,0,0,'C',1);
$pdf->Ln();



$pdf->SetX(25);
$pdf->Cell(105,12,'Monthly Rent',0,0,'C',1);
$pdf->SetX(130);
$pdf->Cell(50,12,($homecount-$own)*$rent,0,0,'C',1);
$pdf->Ln();



$pdf->SetX(25);
$pdf->Cell(105,12,'Yearly Rent',0,0,'C',1);
$pdf->SetX(130);
$pdf->Cell(50,12,($homecount-$own)*$rent*12,0,0,'C',1);
$pdf->Ln();



$pdf->SetX(25);
$pdf->Cell(105,12,'Development Charge (25% of rent)',0,0,'C',1);
$pdf->SetX(130);
$pdf->Cell(50,12,($homecount-$own)*$rent*12*0.25,0,0,'C',1);
$pdf->Ln();

$pdf->SetX(25);
$pdf->Cell(25,12,'Home Tax',0,0,'C',1);
$pdf->SetX(50);
$pdf->Cell(25,12,$hometax,0,0,'C',1);
$pdf->SetX(75);
$pdf->Cell(55,12,'Payable = Home Tax * '.$homecount-$own.'/'.$homecount,0,0,'C',1);
$pdf->SetX(130);
$pdf->Cell(50,12,ceil($htax),0,0,'C',1);
$pdf->Ln();


$pdf->SetX(25);
$pdf->Cell(25,12,'Land Tax',0,0,'C',1);
$pdf->SetX(50);
$pdf->Cell(25,12,$land,0,0,'C',1);
$pdf->SetX(75);
$pdf->Cell(55,12,'Payable = Land Tax * '.$homecount-$own.'/'.$homecount,0,0,'C',1);
$pdf->SetX(130);
$pdf->Cell(50,12,ceil($ltax),0,0,'C',1);
$pdf->Ln();



$pdf->SetX(25);
$pdf->Cell(25,12,'Home Loan',0,0,'C',1);
$pdf->SetX(50);
$pdf->Cell(25,12,$homeloan,0,0,'C',1);
$pdf->SetX(75);
$pdf->Cell(55,12,'Payable = Home Loan * '.$homecount-$own.'/'.$homecount,0,0,'C',1);
$pdf->SetX(130);
$pdf->Cell(50,12,ceil($hloan),0,0,'C',1);
$pdf->Ln();



$pdf->SetX(25);
$pdf->Cell(105,12,'Net Earning / Taxable',0,0,'C',1);
$pdf->SetX(130);
$pdf->Cell(50,12,ceil($totalhome),0,0,'C',1);
$pdf->Ln();


$pdf->AddPage();

$pdf->SetFont("Arial", "B", 32);
$pdf->Cell(0, 12, "National Board Of Revenue", 0, 2, 'C');
$pdf->Cell(0, 12, "Bangladesh", 0, 2, 'C');
$pdf->SetFont("Arial", "B", 22);
$pdf->SetY(40);
$pdf->Cell(0, 12, "Tax Free Limit", 0, 2, 'C');

$pdf->SetFont('Arial','',12);
$pdf->SetY(66);


$pdf->SetX(25);
$pdf->Cell(105,12,'Freedom Fighter',0,0,'L',1);
$pdf->SetX(130);
$pdf->Cell(50,12,'4,75,000/=',0,0,'C',1);
$pdf->Ln();


$pdf->SetX(25);
$pdf->Cell(105,12,'Disabled',0,0,'L',1);
$pdf->SetX(130);
$pdf->Cell(50,12,'4,50,000/=',0,0,'C',1);
$pdf->Ln();

$pdf->SetX(25);
$pdf->Cell(105,12,'Female / Common Gender / Age 65+',0,0,'L',1);
$pdf->SetX(130);
$pdf->Cell(50,12,'3,50,000/=',0,0,'C',1);
$pdf->Ln();

$pdf->SetX(25);
$pdf->Cell(105,12,'General',0,0,'L',1);
$pdf->SetX(130);
$pdf->Cell(50,12,'3,00,000/=',0,0,'C',1);
$pdf->Ln();

$pdf->SetX(25);

$pdf->Cell(0, 12, "*** Income from farming will add a tax free limit of 2,00,000/=", 0, 2, 'L');


// $totalhome = $netrent - $htax - $ltax - $hloan;
    
    // $taxabletotal = $totaljob + $totalbus + $totalagri + $totalhome;
$pdf->Cell(0, 36, "", 0, 2, 'L');
$pdf->Cell(0, 12, "Total Taxable Amount", 0, 2, 'C');
$pdf->Cell(0, 12, ceil($taxabletotal), 0, 2, 'C');
$pdf->Cell(0, 12, "Total Tax", 0, 2, 'C');
$pdf->Cell(0, 12, $tax, 0, 2, 'C');
//Create lines (boxes) for each ROW (Product)
//If you don't use the following code, you don't create the lines separating each row
$i = 0;
$pdf->SetY($Y_Table_Position);
while ($i < $number_of_products)
{
    $pdf->SetX(45);
    // $pdf->MultiCell(120,6,'',1);
    $i = $i +1;
}

$pdf->Output();
?>