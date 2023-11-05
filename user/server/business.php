
<?php 
// var_dump($_POST);

$sql = "UPDATE `earning` SET `SaleValue`='".$_POST['SaleValue']."',`PurchaseValue`='".$_POST['PurchaseValue']."',`Misc`='".$_POST['Mise']."',`Bill`='".$_POST["Billings"]."',`Furniture`='".$_POST["FurnitureValue"]."' WHERE NIDNO = '".$_POST['NIDNO']."' AND Year = '".$_POST['Year']."'";

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