<?php
require "../db/db.php";
$Name = $_POST["Name"];
$FathersName = $_POST["FathersName"];

$MothersName = $_POST["MothersName"];

$DateofBirth = $_POST["DateofBirth"];
$NIDNO = $_POST["NIDNO"];
$Address = $_POST["Address"];
$PhoneNumber = $_POST["PhoneNumber"];
$BloodGroup = $_POST["BloodGroup"];
$PlaceofBirth = $_POST["PlaceofBirth"];


$filename = $_FILES["Image"]["name"];
$tmpname = $_FILES["Image"]["tmp_name"];


$filetype= strtolower(pathinfo($filename,PATHINFO_EXTENSION));
$movefile = '../image/' .$Name.'.' .$filetype;
$dbfile = 'image/' .$Name.'.' .$filetype;
  move_uploaded_file($tmpname, $movefile);


$Password = $_POST["Password"];


$query = "INSERT INTO `user`(`serialno`, `Name`, `FathersName`, `MothersName`, `DateofBirth`, `NIDNO`, `Address`, `PhoneNumber`, `BloodGroup`, `PlaceofBirth`, `Image`, `Password`,`userrole`) VALUES ('NULL','$Name','$FathersName','$MothersName','$DateofBirth','$NIDNO','$Address','$PhoneNumber','$BloodGroup','$PlaceofBirth','$dbfile','$Password','user')";



if($con->query($query) ===  TRUE){
    echo '<script language="javascript">';
  echo 'alert("Info Added Successfully"); location.href="../index.php"';
  echo '</script>';
      }
      
      else{
          echo $con->Error;
      }
      ?>