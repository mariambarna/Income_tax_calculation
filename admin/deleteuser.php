<?php
$sql="DELETE FROM complain WHERE serialno='".$_GET["id"]."'";
include_once("../db/db.php");

if($con->query($sql) === TRUE){
    echo '<script language="javascript">';
    echo 'alert("Contact Removed Successfully");
    location.href="acomplainlist.php"';
    echo '</script>';
}
else{
    echo $con->Error;
}

?>