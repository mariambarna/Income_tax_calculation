<?php 
// var_dump($_POST);

$sql = "UPDATE `earning` SET `BasicSalary`='".$_POST['BasicSalary']."',`SpecialSalary`='".$_POST['SpecialSalary']."',`HouseRent`='".$_POST['HouseRent']."',`MedicalAllowance`='".$_POST['MedicalAllowence']."',`CriticalCare`='".$_POST['CriticalCare']."',`TransportAllowance`='".$_POST['TransportAllownece']."',`FestivalAllowance`='".$_POST['FestivalAllowence']."',`PAssistantAllowance`='".$_POST['PAssistantAllowance']."',`VacationAllowance`='".$_POST['VacationAllowence']."',`PrizeAllowance`='".$_POST['PrizeAllowence']."',`OvertimeAllowance`='".$_POST['OvertimeAlowence']."',`PolicyAllowance`='".$_POST['PolicyPremium']."',`PolicyPremium`='".$_POST['PolicyInterest']."',`BonusAllowance`='".$_POST['BonousAllowence']."',`Allowance`='".$_POST['Allowence']."',`Others`='".$_POST['Others']."' WHERE NIDNO = '".$_POST['NIDNO']."' AND Year = '".$_POST['Year']."'";

include_once('../../db/db.php');
if($con->query($sql) === TRUE){

    echo '<script language="javascript">';
  echo 'alert("Info updated Successfully"); location.href="../option.php"';
  echo '</script>';
      }
      
      else{
          echo $con->Error;
      }
?>