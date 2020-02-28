<!DOCTYPE html>

<head>
    <html lang="en">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">

    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.20/css/dataTables.bootstrap4.min.css">

    <script charset="utf8" src="https://code.jquery.com/jquery-3.3.1.js"></script>

    <script charset="utf8" src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script charset="utf8" src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js"></script>
    <script charset="utf8" src="https://cdn.datatables.net/1.10.20/js/dataTables.bootstrap4.min.js"></script>
    <script charset="utf8" src="https://cdn.datatables.net/colreorder/1.5.2/js/dataTables.colReorder.min.js"></script>
    <title>Document</title>
</head>

<body>
    <h2 class="text-center">15. Datatables</h2>
    <div class="container-fluid">
        <div class="form-inline" class="float-right">

            <input type="text" id="column3_search" class="form-control col-md-3" placeholder="search ...">
            <select name="searchData" id="searchData" class="form-control">
                <!-- <option value="">all</option> -->

                <option value="id">ID</option>
                <option value="user">User</option>
                <option value="email">Email</option>
                <option value="city">City</option>
                <option value="country">Country</option>
                <option value="phone">Phone</option>
            </select>
        </div>
        <table id="example" class="table table-striped" style="width:100%">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>User</th>
                    <th>Email</th>
                    <th>City</th>
                    <th>Country</th>
                    <th>Phone</th>
                    <th></th>
                    <th></th>
                </tr>
            </thead>

        </table>
    </div>
</body>

</html>
<script>
    $(document).ready(function() {
        var table = $('example').DataTable();
        $('#example').DataTable({
            "processing": true,
            "serverSide": true,

            "ajax": {
                "url": "scripts/post.php",
                "type": "POST",
                "data": function(d) {
                    d.where = $('#searchData').val()
                    d.equals = $('#column3_search').val();
                }
            },
            "columns": [
                {
                    "data": "id"

                },
                {
                    "data": "user"
                },
                {
                    "data": "email"
                },
                {
                    "data": "city"
                },
                {
                    "data": "country"
                },
                {
                    "data": "phone"
                },
            
                {
                    "data": null,
                    render: function(dataField) {
                        console.log(dataField);
                        return '<a class="btn btn-info" href="edit.php?id=' + dataField + '">Edit</a>';
                    }
                },
                {
                    "data": null,
                    render: function(dataField) {
                        console.log(dataField);
                        return '<a class="btn btn-danger" id="delete" delete-id=' + dataField.id + '>Delete</a>';
                    }
                },
            ]
        });

        $(document).on('change', '#searchData', function(dn) {
            $('#example').DataTable().ajax.reload();
        });

        $(document).on('keyup', '#column3_search', function(dn) {
            $('#example').DataTable().ajax.reload();
        });



        $(document).on('click', '#delete', function(dn) {
            var del_id = $(this).attr('delete-id');
            $.ajax({
                type: 'POST',
                url: 'delete.php',
                data: {
                    del_id: del_id
                },
                success: function(data) {
                    $('#example').DataTable().ajax.reload();
                }

            })
        });
    });
</script>