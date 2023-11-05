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
    <link rel="stylesheet" href="../css/choose.css">
</head>
<body>
  <div class="container-fluid">
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
    <li class="breadcrumb-item"><a href="choose.php">Basic Info</a></li>
  </ul>
                      <div class="row">
                        
                      </div>
                    </div>


              
<div class="col-6 mt-5 mb-5 pt-3 ml-5 mr-5 m-auto">

  <?php 
  // echo $_SESSION["NIDNO"];
$sql = "SELECT * FROM user WHERE NIDNO = '".$_SESSION["NIDNO"]."'";
include_once('../db/dbconnect.php');
if (getDataFromDB($sql)) {
  $auth = getDataFromDB($sql);
  foreach($auth as $row){
    $date1 = $row['DateofBirth'];

$date2 = date("Y-m-d");

$diff = abs(strtotime($date2) - strtotime($date1));

$years = floor($diff / (365*60*60*24));

if ($years < 18) {
  echo "Not eligible to pay tax";
}
else{

  
}
}
  ?>
    <form method="post" action="server/basic.php">
      <label>Gender</label><br>
      <input type="radio" name="Gender" value="Male"> Male 
      <input type="radio" name="Gender" value="Female"> Female 
      <input type="radio" name="Gender" value="Third"> Third 
      <br>
      <label>Disabled?</label>
      <select name="Disabled" class="form-control">
        <option value="No">No</option>
        <option value="Yes">Yes</option>
      </select> 
      <label>Freedom Fighter?</label>
      <select name="FF" class="form-control">
        <option value="No">No</option>
        <option value="Yes">Yes</option>
      </select>
      <label>Age</label>
      <input type="text" class="form-control" readonly value="<?php echo $years ?>" name="Age">
      <label>Year</label>
      <select name="Year" class="form-control">
<!--          
    <option value="2021">2021</option> -->
    <option value="2022">2022</option>
    <option value="2023">2023</option>
    <option value="2024">2024</option>
    <option value="2025">2025</option>
    <option value="2026">2026</option>
      </select>
      <button class="btn mt-5 mb-3 btn-sm btn-block btn-success" type="submit">Submit</button>
    </form>
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


</body>
</html>
<?php
}
else{
  header("Location: ../index.php");
}
 ?>