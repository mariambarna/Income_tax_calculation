
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
<style>
    
    table{
        color: black;
        margin-top:25px;
        margin-left:2px;
    }
    h2{
        color: black;
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
td, th {
  border: 1px solid #dddddd;
  text-align: left;
  padding: 8px;
}

tr:nth-child(even) {
  background-color: #dddddd;
}

</style>

<?php

 
  $sql=" SELECT * FROM `complain`";
   
  require '../db/dbconnect.php';

  $container= getDataFromDB($sql);




  ?>
  <h2 align="center">Complain info</h2>
  <!-- <div class="col-12">
  <input type="text" id="myInput" onkeyup="myFunction()" placeholder="Search here...." title="Type in a name">
  </div> -->

  <table id= 'myTable' width="95%">
      <tr>
         
        
          <th>NIDNO</th>
          <th>Name</th>
          <th>Subject</th>
          <th>Their Complain</th>
          <th>Action</th>
         
         
         



      </tr>

      <?php 
          foreach($container as $row){
      ?>

              <tr>
                  <td><?php echo $row["NIDNO"] ?></td>
                  <td><?php echo $row["Name"] ?></td>
                  
                  <td><?php echo $row["Subject"] ?></td>
                  <td><?php echo $row["Yourcomplain"] ?></td>
                  <td>
                    <?php if($row['Status'] == 'Pending'){
?>
<a href="deleteuser.php?id=<?php echo $row['serialno'] ?>" class="btn btn-danger btn-sm">Delete</a>
                    <a  data-toggle="modal" data-target="#myModal<?php echo $row["serialno"] ?>" class="btn btn-warning btn-sm">Update</a>
                    
<?php
                    }
                    else{
                      echo $row['Status'];
                    } ?>
                    

                    <div class="modal fade" id="myModal<?php echo $row["serialno"] ?>" role="dialog">
                       <div class="modal-dialog">
    
                            <!-- Modal content-->
                            <div class="modal-content">
                              <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal">&times;</button>
                                <h4 class="modal-title"><?php echo $row["Yourcomplain"] ?></h4>
                              </div>
                              <div class="modal-body">
                                <form action="updatecom.php" method="POST">
                                  <label for="">Complain ID</label>
                                  <input type="text" class="form-control form-control-sm" name="id" value="<?php echo $row["serialno"] ?>" readonly>
                                  <label for="">Reply</label>
                                  <textarea name="Reply" class="form-control form-control-sm" id="" cols="30" rows="10"></textarea>
                                  <label for="">Status</label>
                                  <select name="Status" id="" class="form-control form-control-sm">
                                    <option value="Pending">Pending</option>
                                    
                                    <option value="Completed">Completed</option>
                                  </select>

                                  <button type="Submit" class="btn btn-success">Update</button>
                                </form>
                              </div>
                              <div class="modal-footer">
                                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                              </div>
                            </div>
      
                      </div>
                    </div>
                </td>
                  







              </tr>

          <?php


          }
          ?>
  </table>