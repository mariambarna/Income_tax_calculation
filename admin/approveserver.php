<?php 
include('../db/db.php');

$sql = "UPDATE user SET status = 'Approved' WHERE NIDNO = '".$_GET['id']."'";
if($con->query($sql) ===  TRUE){
    echo '<script language="javascript">';
  echo 'alert("Info updated Successfully"); location.href="approve.php"';
  echo '</script>';
      }
      
      else{
          echo $con->Error;
      }
?>