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

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
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
    <li class="breadcrumb-item"><a href="taxinfo.php">FAQ</a></li>
  </ul>
                      <div class="row">
                     


                      </div>
                    </div>

                    <h2 class="mb-3"><i class="fa-sharp fa-solid fa-bag-shopping"></i>Frequently Asked Question</h2>
                    <?php 
                    $sql = "SELECT * FROM question WHERE Reply != ''";
                     include_once('../db/dbconnect.php');
                    $auth = getDataFromDB($sql);
                    foreach($auth as $row){
                        ?>
                        <div class="col-8  m-auto">
                        <div class="card pl-5 pt-3 mb-3">
                            <p><b><?php echo $row['Question'] ?></b></p>
                            <p><i><?php  echo $row['Reply'] ?></i></p>
                        </div>
                    </div>
                        <?php

                    }
                    ?>

                    <button style="width: 40%; margin: auto;" data-toggle="modal" data-target="#myModal" class="btn btn-warning btn-sm btn-block fixed-bottom">Add your Question
             </button>
                    <div class="modal fade" id="myModal" role="dialog">
                       <div class="modal-dialog">
    
                            <!-- Modal content-->
                            <div class="modal-content">
                              <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal">&times;</button>
                                <h4 class="modal-title">Your Question</h4>
                              </div>
                              <div class="modal-body">
                                <form action="question.php" method="POST">
                                  <label for="">NID</label>
                                  <input type="text" class="form-control form-control-sm" name="id" value="<?php echo $_SESSION['NIDNO'] ?>" readonly>
                                  <label for="">Name</label>
                                  <input type="text" class="form-control form-control-sm" name="name" value="<?php echo $_SESSION['Name'] ?>" readonly>
                                  
                                  <label for="">Question</label>
                                  <textarea name="Question" class="form-control form-control-sm" id="" cols="30" rows="10"></textarea>
                                  

                                  <button type="Submit" class="btn btn-success">Submit</button>
                                </form>
                              </div>
                              <div class="modal-footer">
                                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
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