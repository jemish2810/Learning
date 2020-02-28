<?php
require_once 'connection.php';
//select
$sql = "SELECT * FROM `insertdemo`";
$result = mysqli_query($con, $sql);
$count = mysqli_num_rows($result);

if (isset($_POST['submit'])) {
    $id = $_POST['autoid'];
    $marray = $_POST['members'];

    $percentage = $_POST['percentage'];
    foreach ($id as $key => $val) {
        if ($val == 0 || $val == 00) {
            //insert
            $sql = "INSERT INTO `insertdemo` (`member`, `percentage`) VALUES ('$marray[$key]', '$percentage[$key]')";
            $result = mysqli_query($con, $sql);
            header('location:crudfinal.php');
        } else {
            //update
            $sql = "UPDATE insertdemo SET member='" . $marray[$key] . "',percentage='" . $percentage[$key] . "' WHERE autoid=" . $id[$key];
            $result = mysqli_query($con, $sql);
        }
    }
    //delete
    $removeid = $_POST['removeid'];
    if (!empty($removeid)) {
        $sql = "DELETE FROM `insertdemo` WHERE `insertdemo`.`autoid` IN (" . implode(',', $removeid) . ")";
        $result = mysqli_query($con, $sql);
        header('location:crudfinal.php');
    }
}

?>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">

    <title>Form Data</title>
</head>

<body>
    <?php
    if ($count > 0) {
    ?>
        <form method="post" id="myForm" action="">
            <input type="hidden" name="removeid[]" id="del" value=" ">
            <div class="container ">
                <div class="row justify-content-md-center   ">
                    <div class="col-sm-9">
                        <h2>Form</h2>


                        <?php while ($row = mysqli_fetch_assoc($result)) { ?>
                            <div class="form-group  " id="outerdiv_copy">
                                <div class="form-group row" id="copy">
                                    <div class="col">
                                        <label for="members"> Memebers:</label>
                                        <input type="hidden" name="autoid[]" value="<?php echo $row['autoid'] ?>">
                                        <input type="text" class="form-control " id="members" value="<?php echo $row['member']; ?>" name="members[]">
                                    </div>
                                    <div class="col">
                                        <label for="percentage"> Text </label>
                                        <input type="text" class="form-control" id="percentage" value="<?php echo $row['percentage']; ?>" name="percentage[]">
                                    </div>
                                    <div class="col">
                                        <br />
                                        <button type="button" class="btn btn-danger" name='del_rec' id="del_rec" onclick="remove(this)" value="<?php echo $row['autoid'] ?>">-- </button>

                                        <button type="button" style="display:none" class="btn btn-success add" onclick="add()">Add more</button>

                                    </div>
                                </div>
                            </div>

                        <?php } ?>
                        <div id="clonecopy">
                            <!-- clone data  -->
                        </div>
                        <input type="submit" value="submit" name="submit" class="btn btn-info">
                        <button id="cancel" name="cancel" class="btn btn-outline-secondary" value="1">Cancel</button>
                    </div>
                </div>
            </div>
        </form>
    <?php } else {
    ?>
        <form method="post" id="myForm" action="">
            <div class="container ">
                <div class="row justify-content-md-center   ">
                    <div class="col-sm-9">
                        <h2>Form</h2>
                        <div class="form-group  " id="outerdiv_copy">
                            <div class="form-group row" id="copy">

                                <div class="col">
                                    <label for="members"> Memebers:</label>
                                    <input type="hidden" name="autoid[]" value="00" readonly>
                                    <input type="text" class="form-control " id="members" name="members[]">
                                </div>
                                <div class="col">
                                    <label for="percentage"> Text </label>
                                    <input type="text" class="form-control" id="percentage" name="percentage[]">
                                </div>
                                <div class="col">
                                    <br />

                                    <button type="button" class="btn btn-danger" name='del_rec'>-</button>
                                    <button type="button" class="btn btn-success add" onclick="add()">Add more</button>
                                </div>
                            </div>
                        </div>
                        <div id="clonecopy">
                        </div>
                        <input type="submit" value="submit" name="submit" class="btn btn-info">
                        <button id="cancel" name="cancel" class="btn btn-outline-secondary" value="1">Cancel</button>
                    </div>
                </div>
            </div>

        </form>

    <?php } ?>
</body>

</html>
<script>
    var i = 0;
    var outerdiv_copy = document.getElementById('outerdiv_copy').firstElementChild;
    outerdiv_copy.querySelectorAll('button')[0].style.display = 'none';
    outerdiv_copy.querySelectorAll('button')[1].style.display = 'block';
    //clone node    
    function add() {
        var clonecopy = document.getElementById('clonecopy');
        var clone = outerdiv_copy.cloneNode(true);
        clone.querySelectorAll('input')[0].setAttribute('value', "0 ");
        clone.querySelectorAll('input')[1].setAttribute('value', " ");
        clone.querySelectorAll('input')[2].setAttribute('value', " ");
        clone.querySelectorAll('button')[0].style.display = 'block';
        clone.querySelectorAll('button')[1].style.display = 'none';
        clonecopy.appendChild(clone);
    }
    var arr = new Array();

    function remove(aid) {
        aid.parentNode.parentNode.remove();
        var deleteId = aid.value;
        var ids = arr.push(deleteId);
        document.getElementById('del').value = arr;

    }
</script>