<!DOCTYPE html>
<!-- Data from Database Table -->
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Datatable</title>
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.20/css/jquery.dataTables.css">

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>


    <script>
        $(document).ready(function() {
            $('#example').DataTable({
                "processing": true,
                "serverside": true,
            });

        });
    </script>
</head>

<body>
    <?php
    require_once "connection.php";
    $sql = "SELECT * FROM `MyGuests`  ";
    $result = mysqli_query($con, $sql);
    ?>
    <table id="example" class="display" style="width:100%">
        <thead>
            <tr>
                <th>Id</th>
                <th>Name</th>
                <th>E-mail</th>
                <th>Reg_date</th>

            </tr>
        </thead>
        <tbody>
            <?php
            while ($row = mysqli_fetch_assoc($result)) { ?>
                <tr>
                    <td><?= $row['id']; ?></td>
                    <td><?= $row['firstname'] . $row['lastname']; ?></td>
                    <td><?= $row['email']; ?></td>
                    <td><?= $row['reg_date']; ?></td>
                </tr>
            <?php  } ?>
        </tbody>
    </table>


</body>

</html>