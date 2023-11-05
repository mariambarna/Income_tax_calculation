<?php

print_r($_POST);
require "../db/db.php";
$BasicSalary = ($_POST["BasicSalary"] == "") ? 0 : $_POST["BasicSalary"];
$Allowence = ($_POST["Allowence"] == "") ? 0 : $_POST["Allowence"];
$MedicalAllowence = ($_POST["MedicalAllowence"] == "") ? 0 : $_POST["MedicalAllowence"];
$FestivalAllowence = ($_POST["FestivalAllowence"] == "") ? 0 : $_POST["FestivalAllowence"];

$PrizeAllowence = ($_POST["PrizeAllowence"] == "") ? 0 : $_POST["PrizeAllowence"];
$BonousAllowence = ($_POST["BonousAllowence"] == "") ? 0 : $_POST["BonousAllowence"];
$SpecialSalary = ($_POST["SpecialSalary"] == "") ? 0 : $_POST["SpecialSalary"];
$HouseRent = ($_POST["HouseRent"] == "") ? 0 : $_POST["HouseRent"];
$TransportAllownece = ($_POST["TransportAllownece"] == "") ? 0 : $_POST["TransportAllownece"];
$OvertimeAlowence = ($_POST["OvertimeAlowence"] == "") ? 0 : $_POST["OvertimeAlowence"];
$VacationAllowence = ($_POST["VacationAllowence"] == "") ? 0 : $_POST["VacationAllowence"];



$freelimit = 300000;
$annualsalary = 12*$BasicSalary;
$annualallowance = 12 * $Allowence;
$annualhouserent = 12 * $HouseRent;
$transportannual = 12 * $TransportAllownece;

function HouseTax(){
     global $annualsalary, $HouseRent;
    
$housefreelimit= $annualsalary*50/100;
    $annualhouserent = $HouseRent * 12;
    $free = 180000;
    if($housefreelimit > $free){
        $limit = $free;
    }
    else{
        $limit = $housefreelimit;
    }
     if($annualhouserent < $limit){
        return 0;
    }
    else{
        return $annualhouserent - $limit;
    }
    
}
function MedicalTax(){
     global $annualsalary, $MedicalAllowence;
    
$medicalfreelimit= $annualsalary*10/100;
    $annualmedall = $MedicalAllowence * 12;
    $free = 120000;

    if($medicalfreelimit > $free){
        $limit = $free;
    }
    else{
        $limit = $medicalfreelimit;
    }
    
    if($annualmedall < $limit){
        return 0;
    }
    else{
        return $annualmedall - $limit;
    }
    
}

function TransportTax(){
     global $annualsalary, $TransportAllownece;
    
$limit= 30000;
    $annualtransport = $TransportAllownece * 12;
    

    
    if($annualtransport < $limit){
        return 0;
    }
    else{
        return $annualmedall - $limit;
    }
    
}

$taxable = $annualsalary + $annualallowance + $PrizeAllowence + $BonousAllowence + $SpecialSalary + $OvertimeAlowence + $VacationAllowence + TransportTax() + MedicalTax() + HouseTax() + $FestivalAllowence;

 function tax(){
global $taxable,  $freelimit;
    //step 1
    $tax = 0;
    if($taxable < $freelimit){
        return $tax;
    }
    else{
        $taxof = $taxable - $freelimit;
        if($taxof > 100000){
            $step1 = 5 * 100000 / 100;
            $tax = $tax + $step1;
            $taxof = $taxof - 100000;
            
            if($taxof > 300000){
                $step2 = 10 * 300000 / 100;
                
            $tax = $tax + $step2;
            $taxof = $taxof - 300000;
                if($taxof > 400000){
                    $step3 = 15 * 400000 / 100;
                $tax = $tax + $step3;
                $taxof = $taxof - 400000;
                    if($taxof > 500000){
                        $step4 = 20 * 500000 / 100;
                $tax = $tax + $step4;
                $taxof = $taxof - 500000;
                        $step5 = 25 * $taxof / 100;
                        
                $tax = $tax + $step5;
            return $tax;
                    }
                    else{
                        
                     $step4 = 20 * $taxof / 100;
            $tax = $tax + $step4;
            return $tax;
                    }
                }
                else{
                     $step3 = 15 * $taxof / 100;
            $tax = $tax + $step3;
            return $tax;
                }
            }
            else{
                 $step2 = 10 * $taxof / 100;
            $tax = $tax + $step2;
            return $tax;
            }
        }
        else{
            $step1 = 5 * $taxof / 100;
            $tax = $tax + $step1;
            return $tax;
        }
    }
} 
echo tax();

//
//echo '<br>';
//echo $annualsalary;
//echo '<br>';
//echo '<br>';
//echo '<br>';
//$housefree = HouseTax();
//echo $housefree;
//echo '<br>';
//$medicalfree= MedicalTax();
//echo $medicalfree;


//
$query ="INSERT INTO `jobs`(`BasicSalary`, `Allowence`, `MedicalAllowence`, `PrizeAllowence`, `BonousAllowence`, `SpecialSalary`, `HouseRent`, `TransportAllownece`, `OvertimeAlowence`, `VacationAllowence`) VALUES ('$BasicSalary','$Allowence','$MedicalAllowence','$PrizeAllowence','$BonousAllowence','$SpecialSalary','$HouseRent','$TransportAllownece','$OvertimeAlowence','$VacationAllowence')";

var_dump($query);



/*
if($con->query($query) ===  TRUE){
    echo '<script language="javascript">';
  echo 'alert("Info Added Successfully"); location.href="../user/job.php"';
  echo '</script>';
      }
      
      else{
          echo $con->Error;
      }
      ?>*/
