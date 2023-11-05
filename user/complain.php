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
  </ul>
                      <div class="row">
                     


                      </div>
                    </div>

                    <div class="row"></div>
                    <form action="server/complain.php" method="post">
                    <h2><i class="fa-sharp fa-solid fa-bag-shopping"></i> Write Your Complain</h2>
                   
                    <div class="reg mt-4 ml-5 mb-5">
                    <label for="">Name</label>
                                        <input type="text" id="" name="Name" class="form-control form-control-sm p-4 mb-3" placeholder=" Name">
                                       
                                   
                                        <label for="">NIDNO</label>
                                        <input type="text" name=" NIDNO" class="form-control form-control-sm" readonly value="<?php echo $_SESSION['NIDNO'] ?>">
                                        <label for="">Subject</label>
                                        <input type="text" id="" name="Subject" class="form-control form-control-sm p-4 mb-3" placeholder="Subject">

                                        <label for="">Your complain</label>
                                        <input type="text" id="" name="Yourcomplain" class="form-control form-control-sm p-4 mb-3" placeholder=" Write down your Complain">
                                        <div class="buutt">
           <button type="submit" value="submit">Submit</button>
           <br>
           <a href="mycomplains.php" class="btn btn-sm btn-info mt-3 mb-5">My Complains</a>
           <!-- <button type="reset">Reset</button> -->
        </div>
        
</div>
                    </div>

              

            </div>

        </div>
        
    </div>
    
  </div>

</form>
<br>
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