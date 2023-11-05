<?php
 session_start();
 $_SESSION["userrole"] = "";
 $_SESSION["NIDNO"] = "";
 $_SESSION["Flag"] = '';
 header("Location: index.php");



?>