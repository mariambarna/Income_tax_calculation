
<?php 
// var_dump($_POST);

$sql = " UPDATE `earning` SET `AgriSaleValue`='".$_POST['SaleValue']."' WHERE NIDNO = '".$_POST['NIDNO']."' AND Year = '".$_POST['Year']."'";
// var_dump($sql);
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