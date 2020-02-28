<?php

include_once 'connection2.php';

if (isset($_POST['update'])) {
    foreach ($_POST['positions'] as $position) {
        
        $index = $position[0];
        $newPosition = $position[1];
        
        $sql = "UPDATE countries SET position = '$newPosition' WHERE id='$index'";
        echo $sql;
        $res = mysqli_query($con, $sql);
    }
    exit('success');
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
                <table class="table table-stripped table-hover table-bordered">
                    <thead>
                        <tr>
                            <td><b> Id </b></td>
                            <td><b> Country - List </b></td>
                            <td><b> Positon </b></td>
                            
                        </tr>
                    </thead>
                    <tbody>
                        <?php

                        $sql = "SELECT id, name, position FROM countries ORDER BY position";
                        $res = mysqli_query($con, $sql);

                        while($row=mysqli_fetch_array($res)){
                            ?>
                            <tr data-index=<?php echo $row[0]; ?>  data-position=<?php echo $row[4]; ?>>
                                <td><?php echo $row[0]; ?></td>
                                <td><?php echo $row[1]; ?></td>
                                <td><?php echo $row[2]; ?></td>
                                
                            </tr>
                            <?php } ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>



    <script type="text/javascript">
        $(document).ready(function() {
            $('table tbody').sortable({
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
                $(this).removeClass('updated');
            });

            $.ajax({
                url: 'new_demo.php',
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
    </script>





</body>

</html>