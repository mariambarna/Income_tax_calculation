<?php

if ($_SESSION["userrole"] == "user" AND $_SESSION["Flag"] =='Running'){

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
  
  <!-- <div class="col-12">
  <input type="text" id="myInput" onkeyup="myFunction()" placeholder="Search here...." title="Type in a name">
  </div> -->

  <table class="table table-sm mt-5 mb-5"  width="95%">  <?php 
          foreach($container as $row){
      ?>
        </table>
      <h2 pt-5 mt-5 align="center">Password Change</h2>
<div class="container p-5 "> 
      
      <form action="server/passchange.php" method="post">
               
      <label for="">old password</label>
                                              <input type="password" id="" name="oldpassword" class="form-control form-control-sm p-4 mb-3" placeholder=" old password">
                                             
                                         
                                              <label for="">new password</label>
                                              <input type="password" id="" name="newpassword" class="form-control form-control-sm p-4 mb-3" placeholder="new password">
      
      
                                              <label for="">confirm password</label>
                                              <input type="password" id="" name="confirmpassword" class="form-control form-control-sm p-4 mb-3" placeholder="confirm password">
      
                                              <button class="btn mt-3 mb-3 btn-block btn-info p-2"><a title="submit" href="#"></a>Submit</button>
                        
      
      
      
      
      
      
      
      
      
      </div>
          
          
  </div>

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