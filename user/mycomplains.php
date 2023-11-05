<?php
session_start();
if ($_SESSION["userrole"] == "user" AND $_SESSION["Flag"] =='Running'){

?>

<!DOCTYPE html>
<html lang="en">
<head>
   
    <title>home</title>
    <script src="../jquery.js"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css">
    <script src="https://cdn.jsdeliver.net/npm/popper.js@1.16.1/dist/umb/popper.min.js"></script>
    <script src="../bootstrap/js/bootstrap.bundle.js"></script>
    <link rel="stylesheet" href="../bootstrap/css/bootstrap.css">

    <script src="https://kit.fontawesome.com/1e2c5a8858.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="../css/complain.css">
</head>
<body>
  <div class="container-fluid barna">
    <div class="row">

        <div class="container-fluid">
            <div class="container bg-light ">
                <div class="header">
                  <div class="row">
                  <div class="col-2 ml-3 mt-1">
                      <img src="../image/laa.png" alt="">
                      
                      </div>
                      <div class="col-9 ">
                      <p>National Tax Calculation, Bangladesh</p>
                      <h5>জাতীয় রাজস্ব বোর্ড, বাংলাদেশ</h5>
                    </div>
                  </div>
                  
                  
                 
                  

                    </div>
                    <div class="head">
                    <ul class="breadcrumb">
    <li class="breadcrumb-item"><a href="home.php">Home</a></li>
    <li class="breadcrumb-item"><a href="complain.php">Complains</a></li>
    <li class="breadcrumb-item"><a href="mycomplains.php">My Complains</a></li>
  </ul>
                      <div class="row">
                     


                      </div>
                    </div>

                    <div class="row"></div>
                    <h2 class="mb-3"><i class="fa-sharp fa-solid fa-bag-shopping"></i>Your Complain</h2>
                    <?php 
                    $sql = "SELECT * FROM complain WHERE NIDNo =  '".$_SESSION["NIDNO"]."'";
                     include_once('../db/dbconnect.php');
                    $auth = getDataFromDB($sql);
                    foreach($auth as $row){
                        ?>
                        <div class="col-8 m-auto">
                        <div class="card mb-3">
                            <div class="card-header bg-info text-light"><h3><?php echo '<b>'.$row['Subject'].'</b> : '.$row['Yourcomplain'] ?></h3></div>
                            <div class="card-body"><p><i><?php  echo $row['Reply'] ?></i></p></div>
                            <div class="card-footer text-right"><small><?php echo $row['Status'] ?></small></div>
                        </div>
                    </div>
                        <?php

                    }
                    ?>

                
        </div>
        
</div>
                    </div>

              

            </div>

        </div>
        
    </div>
    
  </div>

<?php
include "../footer.php";

include "../footer2.php";

?>
</body>
</html>
<?php
}
else{
  header("Location: ../index.php");
}
 ?>