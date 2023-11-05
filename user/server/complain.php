<?php
require "../../db/db.php";
$Name = $_POST["Name"];

$NIDNO = $_POST["NIDNO"];

$Subject = $_POST["Subject"];
$Yourcomplain = $_POST["Yourcomplain"];


$query = "INSERT INTO `complain`(`Name`, `NIDNO`, `Subject`, `Yourcomplain`, `Userrole`) VALUES ('$Name','$NIDNO','$Subject','$Yourcomplain','user')";
if($con->query($query) ===  TRUE){
    echo '<script language="javascript">';
    echo 'alert("Info Added Successfully"); location.href="../complain.php"';
    echo '</script>';
      }
      
      else{
          echo $con->Error;
      }
      ?>




