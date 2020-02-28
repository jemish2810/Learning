<?php
include_once 'connection2.php';
//recive Data
if (isset($_POST['receive'])) {
    $index = $_POST['receive'];
    $iname = $_POST['iname'];
    // // drop row 
    $sql1 = "DELETE FROM `ins_category` WHERE `id` = $index ";
    echo $sql1;
    $res1 = mysqli_query($con, $sql1);

    // // insert recored

    $sql3 = "INSERT INTO `product`  (`p_id`, `p_name`, `position`) VALUES (NULL, '$iname', '0')";
    echo $sql3;
    $res = mysqli_query($con, $sql3);
    exit('successfully recived inserted and deleted..');
}
//remove Data
if (isset($_POST['remove'])) {
    $index = $_POST['remove'];
    $cat_id = $_POST['cat_id'];
    $iname = $_POST['iname'];
    // drop row 
    $sql1 = "DELETE FROM `product` WHERE `p_id` = $index ";

    $res1 = mysqli_query($con, $sql1);

    // insert recored

    $sql3 = "INSERT INTO `ins_category`  (`id`, `item`, `c_id`, `position`) VALUES (NULL, '$iname', $cat_id, '0')";
    echo $sql3;
    $res = mysqli_query($con, $sql3);

    exit('successfully inserted and deleted..');
}
//update Data
if (isset($_POST['update'])) {
    foreach ($_POST['positions'] as $position) {

        $index = $position[0];

        $newPosition = $position[1];

        $sql1 = "UPDATE product SET position = '$newPosition' WHERE p_id='$index'";
        $res1 = mysqli_query($con, $sql1);

        // $sql = "UPDATE ins_category SET position = '$newPosition' WHERE id='$index'";
        // echo $sql;
        // $res = mysqli_query($con, $sql);
    }
    exit('successfully updated...');
}
?>
<!doctype html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>jQuery Sortable</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <script src="http://code.jquery.com/jquery-3.3.1.min.js" integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8=" crossorigin="anonymous"></script>
    <script src="http://code.jquery.com/ui/1.12.1/jquery-ui.min.js" integrity="sha256-VazP97ZCwtekAsvgPBSUwPFKdrwD3unUfSGVYrahUqU=" crossorigin="anonymous"></script>
</head>

<body>
    <div class="container" style="margin-top: 100px;">
        <div class="row justify-content-center">
            <div class="col-md-8 col-md-offset-4">
                <form action="type.php" method="POST">
                    <?php
                    $query = "SELECT id,name,c_id FROM category ORDER BY ID ";
                    $result = mysqli_query($con, $query); ?>
                    <select name='category' id="category" class="browser-default custom-select" onchange="this.form.submit()">
                        <option value="0">Select category</option>
                        <?php while ($data = mysqli_fetch_array($result)) { ?>
                            <option value="<?php echo $data['id'] ?>" <?php echo (isset($_POST['category']) && $_POST['category'] == $data['id']) ? 'selected="selected"' : ''; ?>><?php echo $data['name'] ?></option>
                        <?php } ?>
                    </select>

                </form>
            </div>
        </div><br><br>
        <div class="row justify-content-center">
            <div class="col-md-4 col-md-offset-4">
                <table id='table1' class="table table-stripped table-hover table-bordered">
                    <thead>
                        <tr>
                            <td><b> Item - List </b></td>
                        </tr>
                    </thead>
                    <tbody>
                        <?php

                        $sql = "SELECT p_id, p_name, position FROM product ORDER BY position";
                        $res = mysqli_query($con, $sql);
                        while ($data = mysqli_fetch_array($res)) {
                        ?>
                            <tr data-index=<?php echo $data[0]; ?> data-position=<?php echo $data[4]; ?>>
                                <td><?php echo $data[1]; ?></td>
                            </tr>
                        <?php } ?>
                    </tbody>
                </table>
            </div>
            <div id="table22" class="col-md-4 col-md-offset-4">

                <?php
                if (isset($_POST['category'])) {
                    $cat_id = $_POST['category'];
                    echo "<input type='hidden' id='cat_id' value='$cat_id' >";
                    echo "<table id='table2' class='table table-stripped table-hover table-bordered'>
                            <thead>
                                <tr>
                                    <td><b>Item</b></td>
                                </tr>
                            </thead>
                            <tbody>";

                    $query = "SELECT id,item,c_id FROM `ins_category` WHERE c_id = $cat_id";

                    $result = mysqli_query($con, $query);
                    while ($data = mysqli_fetch_row($result)) {
                        echo "<tr data-index=$data[0] data-position= .$data[4].>";
                        echo "<td>$data[1]</td>";
                        echo "</tr>";
                    }
                    echo "</tbody>";
                    echo "</table>";
                }
                ?>
            </div>
        </div>
    </div>

    <script type="text/javascript">
        $(document).ready(function() {
            //table 1
            $('#table1 tbody').sortable({
                connectWith: "#table2 tbody",
                remove: function(event, ui) {
                    insert_id = ui.item.data().index;
                    cat_id = $('#cat_id').val();
                    var name = ui.item[0].innerText;
                    drop_row(name);

                },

                receive: function(event, ui) {
                    ui.item.css("color", "red");
                    ui.item.children(".child").show();
                    id = ui.item.data().index;
                    var name = ui.item[0].innerText;
                    recive_row(name);
                },

                update: function(event, ui) {
                    $(this).children().each(function(index) {
                        if ($(this).attr('data-position') != (index + 1)) {
                            $(this).attr('data-position', (index + 1)).addClass('updated');
                        }
                    });
                    saveNewPositions();
                }
            });
            //table 2
            $('#table2 tbody').sortable({
                connectWith: "#table1 tbody",

                update: function(event, ui) {
                    $(this).children().each(function(index) {
                        if ($(this).attr('data-position') != (index + 1)) {
                            $(this).attr('data-position', (index + 1)).addClass('updated');
                        }
                    });
                    saveNewPositions();
                }
            });
        });


        function saveNewPositions() {
            var positions = [];
            $('.updated').each(function() {
                positions.push([$(this).attr('data-index'), $(this).attr('data-position')]);
            });
            $.ajax({
                url: 'type.php',
                method: 'POST',
                dataType: 'text',
                data: {
                    update: 1,
                    positions: positions
                },
                success: function(response) {
                    console.log(response);
                }
            });
        }
        // delete row and insert it into another table 
        function drop_row(name) {
            var new_index = $("#table2 tr").length;
            var positions = [];
            console.log(name);
            $('.updated').each(function() {
                positions.push([$(this).attr('data-position')]);

            });
            $.ajax({
                url: 'type.php',
                method: 'post',
                dataType: 'text',
                data: {
                    remove: insert_id,
                    index: new_index - 1,
                    cat_id: cat_id,
                    iname: name
                },
                success: function(response) {
                    // console.log(response);
                }
            });
        }
        // receive row and insert it into table and delete from another table 
        function recive_row(name) {

            $.ajax({
                url: 'type.php',
                method: 'post',
                dataType: 'text',
                data: {
                    receive: id,
                    iname: name
                },
                success: function(response) {
                    console.log(response);
                }
            });
        }
    </script>
</body>

</html>