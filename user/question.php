<?php
require "../db/db.php";
$Name =  $_POST["name"];

$NIDNO =  $_POST["id"];

$Yourcomplain = $_POST["Question"];


$sql = "INSERT INTO `question`( `Name`, `NIDNO`, `Question`) VALUES ('".$Name."', '".$NIDNO."', '".$Yourcomplain."')";
if($con->query($sql) ===  TRUE){
    echo '<script language="javascript">';
    echo 'alert("Info Added Successfully"); location.href="taxinfo.php"';
    echo '</script>';
      }
      
      else{
          echo $con->Error;
      }
      ?>






