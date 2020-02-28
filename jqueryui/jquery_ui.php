<?php
include_once 'connection.php';
//recive Data
if (isset($_POST['receive'])) {
        $index = $_POST['receive'];
        // // drop row 
        $sql1 = "DELETE FROM `jquery_ui_sortable2` WHERE `id` = $index ";
        $res1 = mysqli_query($con, $sql1);
        
    
        // // insert recored
        $sql3 = "INSERT INTO `jquery_ui_sortable` VALUES ( NULL, 'item', 0   );";
        $res = mysqli_query($con, $sql3);
        exit('successfully recived inserted and deleted..');
    }
//remove Data
if (isset($_POST['remove'])) {
    $index = $_POST['remove'];

    // drop row 
    $sql1 = "DELETE FROM `jquery_ui_sortable` WHERE `id` = $index ";
    $res1 = mysqli_query($con, $sql1);

    // insert recored
    $sql3 = "INSERT INTO `jquery_ui_sortable2` VALUES ( NULL, 'item', 0   );";
    $res = mysqli_query($con, $sql3);
    exit('successfully inserted and deleted..');
}
//update Data
if (isset($_POST['update'])) {
    foreach ($_POST['positions'] as $position) {
        $index = $position[0];
        $newPosition = $position[1];
        $sql1 = "UPDATE jquery_ui_sortable SET position = '$newPosition' WHERE id='$index'";
        $res1 = mysqli_query($con, $sql1);

        $sql = "UPDATE jquery_ui_sortable2 SET position = '$newPosition' WHERE id='$index'";
        $res = mysqli_query($con, $sql);
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
            <div class="col-md-4 col-md-offset-4">
                <table id='table1' class="table table-stripped table-hover table-bordered">
                    <thead>
                        <tr>
                            <td><b> Item - List </b></td>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $sql = "SELECT id, name, position FROM jquery_ui_sortable ORDER BY position";
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
            <div class="col-md-4 col-md-offset-4">
                <table id='table2' class="table table-stripped table-hover table-bordered">
                    <thead>
                        <tr>
                            <td><b> Item - List </b></td>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $sql = "SELECT id, item, position FROM jquery_ui_sortable2 ORDER BY position";
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
        </div>
    </div>

    <script type="text/javascript">
        $(document).ready(function() {
            //table 1
            $('#table1 tbody').sortable({
                connectWith: "#table2 tbody",
                remove: function(event, ui) {
                    insert_id = ui.item.data().index;

                    drop_row();
                },
                receive: function(event, ui) {
                    ui.item.css("color", "red");      
                    ui.item.children(".child").show();
                    id = ui.item.data().index;
                    recive_row();
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
                url: 'jquery_ui.php',
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

        function drop_row() {
            var new_index = $("#table2 tr").length;
            var positions = [];
            $('.updated').each(function() {
                positions.push([$(this).attr('data-position')]);

            });
            $.ajax({
                url: 'jquery_ui.php',
                method: 'post',
                dataType: 'text',
                data: {
                    remove: insert_id,
                    index: new_index - 1,
                },
                success: function(response) {
                    console.log(response);
                }
            });
        }
        function recive_row(){
console.log(id);
            $.ajax({
                url: 'jquery_ui.php',
                method: 'post',
                dataType: 'text',
                data: {
                    receive: id
                },
                success: function(response) {
                    console.log(response);
                }
            });
        }
    </script>
</body>

</html>