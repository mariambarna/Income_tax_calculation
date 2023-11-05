<?php 
include('../db/db.php');

$sql = "UPDATE user SET paymentstatus = 'Paid' WHERE NIDNO = '".$_GET['id']."'";
if($con->query($sql) ===  TRUE){
    echo '<script language="javascript">';
  echo 'alert("Info updated Successfully"); location.href="user.php"';
  echo '</script>';
      }
      
      else{
          echo $con->Error;
      }
?>