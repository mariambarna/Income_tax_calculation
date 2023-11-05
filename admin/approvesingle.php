<style>
    
    table{
        color: black;
        margin-top:25px;
        margin-left:25px;
    }
    h2{
        color: black;
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

   

</style>


<form action="approveserver.php" method="post">
    <label for="">NIDNO</label>
    <input type="text" class="form-control" readonly name="NIDNO" value="<?php echo $_GET['id']?>">
    
    <button type="submit"> Approve</button>
</form>
 
  