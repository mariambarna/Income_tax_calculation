
<?php 
// var_dump($_POST);

// $sql = " UPDATE `earning` SET `AgriSaleValue`='".$_POST['SaleValue']."' ";
// var_dump($sql);
$sql = "UPDATE `earning` SET `HomeCount`='".$_POST['homecount']."',`Rent`='".$_POST['rent']."',`OwnUse`='".$_POST['ownunit']."',`HomeTax`='".$_POST['housetax']."',`LandTax`='".$_POST['landtax']."',`HomeLoan`='".$_POST['homeloan']."' WHERE NIDNO = '".$_POST['NIDNO']."' AND Year = '".$_POST['Year']."'";
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