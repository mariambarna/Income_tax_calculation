<?php
$sql="DELETE FROM user WHERE NIDNO='".$_GET["id"]."'";
include_once("../db/db.php");

if($con->query($sql) === TRUE){
    echo '<script language="javascript">';
    echo 'alert("Canceled Registration Successfully");
    location.href="approve.php"';
    echo '</script>';
}
else{
    echo $con->Error;
}

?>