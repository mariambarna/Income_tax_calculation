<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Register</title>
    <script src="jquery.js"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css">
    <script src="https://cdn.jsdeliver.net/npm/popper.js@1.16.1/dist/umb/popper.min.js"></script>
    <script src="bootstrap/js/bootstrap.bundle.js"></script>
    <link rel="stylesheet" href="bootstrap/css/bootstrap.css">

    <script src="https://kit.fontawesome.com/1e2c5a8858.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="css/reg.css">

    
</head>
<body>
    
<form action="server/regis.php" method="post" enctype="multipart/form-data">
   <div class="container-fluid">
    <div class="row">
        <div class="container-fluid">
        <div class="containerr bg-light mb-5">
        <h1 class="text-center pt-3 pb-1">Registration</h1>
  
        <div class="reg mt-4 ml-5 mb-5">
                                        <label for="">Name</label>
                                        <input type="text" id="" name="Name" class="form-control p-4 mb-3" placeholder=" Name">

                                        <label for="">Fathers Name</label>
                                        <input type="text" id="" name="FathersName" class="form-control form-control-sm p-4 mb-3" placeholder="Fathers Name">

                                        <label for="">Mothers Name</label>
                                        <input type="text" id="" name="MothersName" class="form-control form-control-sm p-4 mb-3" placeholder="Mothers Name">

                                        <label for="">Date of Birth</label>
                                        <input type="Date" id="" name="DateofBirth" class="form-control form-control-sm p-4 mb-3">

                                        <label for="">NID NO</label>
                                        <input type="number" id="" name="NIDNO" class="form-control form-control-sm p-4 mb-3" placeholder="NID NO">

                                        <label for="">Address</label>
                                        <input type="text" id="" name="Address" class="form-control form-control-sm p-4 mb-3" placeholder="Address">
                                        <label for="">Phone Number</label>
                                        <input type="number" id="" name="PhoneNumber" class="form-control form-control-sm p-4 mb-3" placeholder="Phone Number">

                                        <label for="">Blood Group</label>
                                        <input type="text" id="" name="BloodGroup" class="form-control form-control-sm p-4 mb-3" placeholder=" Blood Group">

                                        <label for="">Place of Birth</label>
                                        <input type="text" id="" name="PlaceofBirth" class="form-control form-control-sm p-4 mb-3" placeholder=" Place of Birth">

                                        <label for="">Image</label>
    <input type="file" class="form-control-file p-2 mb-3" name="Image"id=""  class="clearfix" checked style="display: inline;">

                                        <label for="">Password</label>
                                        <input type="Password" id="" name="Password" class="form-control form-control-sm p-4 mb-3" placeholder=" Password">
       
                                        <button class="btn mt-4 mb-5 p-2 ml-1 btn-block btn-success"  style="background:#5F8575;"><a title="register" href="#"></a>Register</button>
  
</div>                        
<!--         
<button class="btn mt-2 mb-5 p-2 ml-2 btn-block btn-success"  style="background:#5F8575;"><a title="register" href="#"></a>Register</button>
                                         -->
    </div>


    </div>
    </div>
    </div>
    </form>
</body>
</html>