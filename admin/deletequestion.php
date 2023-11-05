<?php
$sql="DELETE FROM question WHERE serialno='".$_GET["id"]."'";
include_once("../db/db.php");

if($con->query($sql) === TRUE){
    echo '<script language="javascript">';
    echo 'alert("Question  Removed Successfully");
    location.href="aquestion.php"';
    echo '</script>';
}
else{
    echo $con->Error;
}

?>