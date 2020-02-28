<?php
require_once 'connection.php';
 ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
    <title>Document</title>
</head>
<body>
    <?php
if(isset($_POST['id'])){
     $id = trim($_POST['id']);
     
     $sql = "select * from insertdemo where autoid = $id";
     
     $result = mysqli_query($con,$sql);
     if(count($result)==1){
         $row = mysqli_fetch_array($result);
         $member = $row["member"];
        $per = $row["percentage"]; 
     }

 }?>
    <form method="post" action="update.php">
        <div class="container ">
            <div class="row justify-content-md-center   ">
                <div class="col-sm-9">
                    <h2>Form</h2>
                    <div class="form-group  " id="outerdiv_copy">
                    <a href="read.php" class="btn btn-info" >view Data</a>  
                        <div class="form-group row" id="copy">
                            <div class="col">
                                <label for="members"> Memebers:</label>
                                <input type="number" class="form-control "  name="id" value="<?php echo $id;?>" hidden>
                                <input type="text" class="form-control " id="members" name="members" value="<?php echo $member;?>">
                            </div>
                            <div class="col">
                                <label for="percentage"> Text </label>
                                <input type="text" class="form-control" id="percentage" name="percentage"value="<?php echo $per;?>">
                            </div>  
                        </div>
                    </div>
                    <input type="submit" value="update" name="update" class="btn btn-success">
                </div>
            </div>
        </div>
    </form>
    <?php

    if(isset($_POST['update'])){
        $id = $_POST['id'];
        $mem = $_POST['members'];
        $per = $_POST['percentage'];
        $sql= "UPDATE insertdemo SET member = '$mem', percentage = '$per'  WHERE autoid = $id";
        $result = mysqli_query($con,$sql);
        
        header( "Location: read.php" );
    }
?>
</body>
</html>
