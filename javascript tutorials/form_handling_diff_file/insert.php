<?php
require_once 'connection.php';

?>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
 
    <title>Document</title>
</head>

<body>

<form method="post" id="myForm" action="insert.php">
        <div class="container ">
            <div class="row justify-content-md-center   ">
                <div class="col-sm-9">
                    <h2>Form</h2>
                    <div class="form-group  " id="outerdiv_copy">
                    
                    <a href="read.php" class="btn btn-info" >view Data</a>
                        
                        <div class="form-group row" id="copy">
                            
                            <div class="col">
                                <label for="members"> Memebers:</label>

                                <input type="text" class="form-control " id="members" name="members[]">
                            </div>
                            <div class="col">
                                <label for="percentage"> Text </label>
                                <input type="text" class="form-control" id="percentage" name="percentage[]">
                            </div>
                            <div class="col">
                                <br />
                                <button type="button" class="btn btn-danger" onclick="this.parentNode.parentNode.remove()">-</button>
                                <button type="button" class="btn btn-success add" onclick="add()">Add more</button>
                            </div>
                        </div>
                    </div>
                    <input type="submit" value="submit" name="submit" class="btn btn-info">
                    <button id="cancel" name="cancel" class="btn btn-outline-secondary" value="1">Cancel</button>
                </div>
            </div>
        </div>
    </form>
</body>
<?php

if (isset($_POST['submit'])) {
    // echo "<pre>"; print_r($_POST); 
    $marray = $_POST['members'];
    $percentage = $_POST['percentage'];
    for ($data = 0; $data < count($marray); $data++) {
        $sql = "INSERT INTO `insertdemo` (`member`, `percentage`) VALUES ('$marray[$data]', '$percentage[$data]')";
        $result = mysqli_query($con, $sql);
    }
    header( "Location: read.php" );
}
?>

</html>
<script>
    var i = 0;
        var demo=document.getElementById('myForm');

        
    function add() {
        copy = document.getElementById('copy');
        // copy.querySelector('button')[0].style.display = 'block';
        // copy.querySelector('button')[1].style.display = 'none';
        var outerdiv = document.getElementById('outerdiv_copy');
        var copydiv = document.getElementById('copy');
        // copydiv.querySelectorAll("button")[0].style.display = 'block';
        // copydiv.querySelectorAll("button")[1].style.display = 'none';
        var clone = copydiv.cloneNode(true);
        clone.id = 'copy' + ++i;
        clone.value = '';
        outerdiv.appendChild(clone);
    }
</script>