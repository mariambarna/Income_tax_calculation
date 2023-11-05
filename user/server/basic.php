<?php
session_start();
include_once('../../db/dbconnect.php');
$nid = $_SESSION["NIDNO"];
$year = $_POST['Year'];
$fetch = "SELECT * FROM basic WHERE NIDNO = '".$_SESSION["NIDNO"]."'";
$fauth = getDataFromDB($fetch);
$fcount = count($fauth);
// var_dump($fcount);
if ($fcount == 0) {
	

include_once('../../db/db.php');
$sql = "INSERT INTO `basic`( `NIDNO`, `Gender`, `Disable`, `FF`, `Age`) VALUES ('".$_SESSION["NIDNO"]."','".$_POST['Gender']."','".$_POST['Disabled']."','".$_POST['FF']."','".$_POST['Age']."')";
$csql = "INSERT INTO `calculation`(`NIDNO`, `Year`) VALUES ('$nid','$year')";
$esql = "INSERT INTO `earning`(`NIDNO`, `Year`) VALUES ('$nid','$year')";
$dsql = "INSERT INTO `deduction`(`NIDNO`, `Year`) VALUES ('$nid','$year')";
// var_dump($sql);
if($con->query($sql) === TRUE AND $con->query($esql) === TRUE AND $con->query($dsql) === TRUE AND $con->query($csql) === TRUE){

    echo '<script language="javascript">';
  echo 'alert("Info stored Successfully"); location.href="../option.php"';
  echo '</script>';
      }
      
      else{
          echo $con->Error;
      }

}

else{

  $fetchyear = "SELECT * FROM earning WHERE NIDNO = '".$nid."' AND Year = '".$year."'";
  $yearauth = getDataFromDB($fetchyear);
  $yearcount = count($yearauth);
  if($yearcount == 1){

	echo '<script language="javascript">';
  echo 'alert("Info already stored"); location.href="../option.php"';
  echo '</script>';

  }
  else{
    $csql = "INSERT INTO `calculation`(`NIDNO`, `Year`) VALUES ('$nid','$year')";
$esql = "INSERT INTO `earning`(`NIDNO`, `Year`) VALUES ('$nid','$year')";
$dsql = "INSERT INTO `deduction`(`NIDNO`, `Year`) VALUES ('$nid','$year')";

include_once('../../db/db.php');
if($con->query($esql) === TRUE AND $con->query($dsql) === TRUE AND $con->query($csql) === TRUE){

  echo '<script language="javascript">';
echo 'alert("New Year Added Successfully"); location.href="../option.php"';
echo '</script>';
    }
    
    else{
        echo $con->Error;
    }
  }
}
?>