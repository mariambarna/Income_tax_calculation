<?php

if ($_SESSION["userrole"] == "admin" AND $_SESSION["Flag"] =='Running'){

?>
<style>
    td, th {
  border: 1px solid #dddddd;
  text-align: left;
  padding: 8px;
}

tr:nth-child(even) {
  background-color: #dddddd;
}
    table{
        color: black;
        margin-top:25px;
        margin-left:15px;
    }
    h2{
        text-transform: capitalize;
    font-size: 45px;
    color:rgb(165, 70, 63);
margin-left: 480px;

margin-top:20px;
    }
    /* .pic{
        height:200px ;
        width: 200px;

    } */
    td img{
        height: 60px;
        width: 60px;

    }
.col-12{
  
padding-left: 2%;
  width: 100%;
}

    #myInput {
  background-image: url('/css/searchicon.png');
  background-position: 10px 10px;
  background-repeat: no-repeat;
  width: 100%;
  font-size: 16px;
  padding: 12px 20px 12px 40px;
  border: 1px solid #ddd;
  margin-bottom: 12px;}
#myTable {
  border-collapse: collapse;
  width: 100%;
  border: 1px solid #ddd;
  font-size: 18px;
}

#myTable th, #myTable td {
  text-align: left;
  padding: 12px;
}

#myTable tr {
  border-bottom: 1px solid #ddd;
}

#myTable tr.header, #myTable tr:hover {
  background-color: #f1f1f1;
}
  

</style>
<?php

 
  $sql=" SELECT * FROM `user` WHERE NIDNO ='".$_SESSION["NIDNO"]."'";
   
  require '../db/dbconnect.php';

  $container= getDataFromDB($sql);




  ?>
  <h2 align="center">Your Info</h2>
  <!-- <div class="col-12">
  <input type="text" id="myInput" onkeyup="myFunction()" placeholder="Search here...." title="Type in a name">
  </div> -->

  <table class="table table-sm mt-5 mb-5"  width="95%">  <?php 
          foreach($container as $row){
      ?>
      <tr>
          <td>Image</td>
          <td> <img src="../<?php echo $row["Image"] ?>" alt=""></td>
              
            
          </tr>
          
      <tr>
          <td>Name</td>
          <td><?php echo $row["Name"] ?></td>
              
            
          </tr>
          <tr>
          <td>Fathers Name</td>
          <td><?php echo $row["FathersName"] ?></td>
              
            
          </tr>
          <tr>
          <td>Mother's Name</td>
          <td><?php echo $row["MothersName"] ?></td>
              
            
          </tr>
          <tr>
          <td>Date of Birth</td>
          <td><?php echo $row["DateofBirth"] ?></td>
              
            
          </tr>
          <tr>
          <td>NID NO</td>
          <td><?php echo $row["NIDNO"] ?></td>
              
            
          </tr>
          <tr>
          <td>Address</td>
          <td><?php echo $row["Address"] ?></td>
              
            
          </tr>
           <tr>
          <td>PhoneNumber</td>
          <td><?php echo $row["PhoneNumber"] ?></td>
              
            
          </tr>
          <tr>
          <td>Blood Group</td>
          <td><?php echo $row["BloodGroup"] ?></td>
              
            
          </tr>
          <tr>
          <td>Place of Birth</td>
          <td><?php echo $row["PlaceofBirth"] ?></td>
              
            
          </tr>
          

    
           
<!--              
                  <td><?php echo $row["firstName"].' '.$row["LastName"] ?></td>
                  <td><?php echo $row["Email"] ?></td>
                  <td><?php echo $row["PhoneNumber"] ?></td>
                  <td><?php echo $row["NIDNO"] ?></td>
                  <td><?php echo $row["Address"] ?></td> -->

          <?php
          }
          ?>
           </tr>
      







   
</body>
</html> 
  
<?php
}
else{
  header("Location: ../index.php");
}
 ?>