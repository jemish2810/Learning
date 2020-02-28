<!-- Datatable serverside data -->
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Datatable</title>
    <!-- <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css"> -->
    <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.20/css/jquery.dataTables.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>
    <script>
        var editor;
        $(document).ready(function() {
            var table = $('#example').DataTable({
                "processing": true,
                "serverSide": true,
                "responsive": true,
                "ajax": "getdata.php",
            });
        });
    </script>
</head>
<body>
    <div class="container table-responsive "style="margin-top: 50px">
        <table id="example" class="table table-bordered" style="width:100%">
            <thead class="thead-dark">
                <tr>
                    <th>Id</th>
                    <th>F_Name</th>
                    <th>L_Name</th>
                    <th>E-mail</th>
                    <th>Reg_date</th>
                </tr>
            </thead>

        </table>
    </div>

</body>

</html>