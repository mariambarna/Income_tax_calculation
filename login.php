<?php
$NIDNO = $_POST['NIDNO'];
$Password = $_POST['Password'];

$usersql = "SELECT * FROM user Where NIDNO= '".$NIDNO."' AND Status != 'pending'";
include_once 'db/dbconnect.php';
$res = getDataFromDB($usersql);
$count = count($res);

if ($count != 0){ 
    session_start();
    foreach ($res as $row) {
        if($row['NIDNO']== $NIDNO and $row["Password"] == $Password){
if ($row["userrole"]=="admin")
         {
         $_SESSION["userrole"] = 'admin';
            $_SESSION["NIDNO"] = $row["NIDNO"];
            $_SESSION["Flag"] = 'Running';
             header("Location: admin/ahome.php");
         }
        else {
            $_SESSION["userrole"] = 'user';
            $_SESSION["NIDNO"] = $row["NIDNO"];
            $_SESSION["Name"] = $row["Name"];
            $_SESSION["LName"] = $row["FathersName"];
            $_SESSION["MName"] = $row["MothersName"];
            
            $_SESSION["Flag"] = 'Running';
            header ("Location: user/home.php") ;
          }
       }
   else{
 echo '<script language="javascript">';
  echo 'alert("Invalied Usermail OR PASSWORD"); location.href="index.php"';
  echo '</script>';
        }
 }
}
else{
    echo '<script language="javascript">';
    echo 'alert("NO USER FOUND"); location.href="index.php"';
    echo '</script>';
  }
?>