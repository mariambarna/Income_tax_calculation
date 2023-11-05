<?php
// echo $_SESSION['Id'];
session_start();
$sql = "SELECT * FROM user WHERE NIDNO = '".$_SESSION['NIDNO']."'";
include_once('../../db/dbconnect.php');
$result = getDataFromDB($sql);

foreach($result as $row){
    $dbpass = $row["Password"];
}

$oldpass = $_POST["oldpassword"];

if($oldpass != $dbpass){
    echo "Invalid Password";
}
elseif($_POST["newpassword"] != $_POST["confirmpassword"]){
    echo "Passwords are not matched";
}
else{
    include_once('../../db/db.php');
    $updatesql = "UPDATE user SET Password = '".$_POST["newpassword"]."' WHERE NIDNO = '".$_SESSION['NIDNO']."'";
    if($con->query($updatesql) === TRUE){
        echo '<script language="javascript">';
        echo 'alert("Password Changed Successfully"); location.href="../userlist.php"';
        echo '</script>';
    }
}
?>
