<?php
session_start();
if ($_SESSION["userrole"] == "user" AND $_SESSION["Flag"] =='Running'){

?>
<!DOCTYPE html>
<html lang="en">
<head>
   
    <title>Home</title>
    <script src="../jquery.js"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css">
    <script src="https://cdn.jsdeliver.net/npm/popper.js@1.16.1/dist/umb/popper.min.js"></script>
    <script src="../bootstrap/js/bootstrap.bundle.js"></script>
    <link rel="stylesheet" href="../bootstrap/css/bootstrap.css">

    <script src="https://kit.fontawesome.com/1e2c5a8858.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="../css/job.css">
</head>
<body style="width: 100vw">
  <div class="container">
    <div class="row">

        <div class="container">
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
    <li class="breadcrumb-item"><a href="choose.php">Basic Info</a></li>
    <li class="breadcrumb-item"><a href="option.php">Occupations</a></li>
    <li class="breadcrumb-item"><a href="business.php">Business</a></li>
  </ul>
                      <div class="row">
                        
                      </div>
                    </div>
                  <h2><i class="fa-sharp fa-solid fa-bag-shopping"></i> For Business Holders</h2>
<h4> Fill It With Accurate Information</h4>
   
<form action="server/business.php" method="post" enctype="multipart/form-data">
 


                  <div class="row text-center" style="font-size: 44px;">
            <div class="col-6">
                <div class="row">
                    <div class="col-6 mb-5">
                       <p> <i class="fa-solid fa-sack-dollar"></i> NIDNO:</p>
                       <p> <i class="fa-solid fa-sack-dollar"></i> Sale Value:</p>
                       <p><i class="fa-sharp fa-solid fa-money-bills"></i> Purchase Value   :</p>
                       <p><i class="fa-sharp fa-solid fa-pills"></i> Mise:</p>
                    </div>
                    <div class="col-6 mb-5">
                        <p> <input type="text" name=" NIDNO" class="form-control form-control-sm" readonly value="<?php echo $_SESSION['NIDNO'] ?>"></p>
                    <p> <input type="text" name="SaleValue" class="form-control form-control-sm"></p>
                        
                        <p> <input type="text" name="PurchaseValue" class="form-control form-control-sm" ></p>


                    <p>  <input type="text" name="Mise" class="form-control form-control-sm" ></p>
                        
                    </div>
                </div>
            </div>
            <div class="col-6">
                <div class="row">
                    <div class="col-6 mb-5">
                        
                    <p><i class="fas fa-money-check"></i> Year:</p>
                       <p><i class="fa-sharp fa-solid fa-person-dress-burst"></i> Billings :</p>
                       <p><i class="fa-sharp fa-solid fa-medal"></i> Furniture Value:</p>
                    </div>
                    <div class="col-6 mb-5">
                        
                        <select name="Year" class="form-control form-control-sm mb-3">
         
    <option value="2022">2022</option>
    <option value="2023">2023</option>
    <option value="2024">2024</option>
    <option value="2025">2025</option>
    <option value="2026">2026</option>
      </select>
                    <p><input type="text" name="Billings" class="form-control form-control-sm" ></p>


                    <p>  <input type="text" name="FurnitureValue" class="form-control form-control-sm"></p>
                    </div>
                </div>
            </div>
            
        </div>
                  


        <div class="buut">
           <button type="submit" value="submit">Submit</button>
           <!-- <button type="reset">Reset</button> -->
        </div>
        





</div>


            </div>
</form>
</div>
</div>
</div>
</div>


</body>
</html>
<?php
}
else{
header("Location: ../index.php");
}
?>