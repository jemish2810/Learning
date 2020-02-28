    <!-- Datatable serverside data edit and delete row-->
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
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
        <script type="text/javascript" src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>


        <script>
            var editor;

            $(document).ready(function() {
                var table1 = $('#example').DataTable({
                    "processing": true,
                    "serverSide": true,
                    "responsive": true,
                    "ajax": "getdata.php",
                    "columns": [
                        null,
                        null,
                        null,
                        null,
                        null,
                        {
                            "mRender": function(data, type, row) {
                                return ' <button type="button" class="btn btn-info " id= "ed"  data-toggle="modal" data-target="#myModal">Edit</button>';
                            }
                        },
                        {
                            "mRender": function(data, type, row) {
                                return '<button id="del"  class= "btn btn-danger" >Delete</button>';
                        }
                        }],
                });
                //delete
                $('#example ').on('click', '#del', function() {

                    var DELETE = "yes";
                    var data = table1.row($(this).parents('tr')).data();

                    var dataString = 'delete=' + DELETE + '&id=' + data[0];
                    $.ajax({
                        type: "GET",
                        url: "deletedata.php?" + dataString,
                        data: dataString,
                        cache: false,
                        success: function(html) {
                            table1.ajax.reload();

                        }
                    });
                });

                //edit
                    $('#example ').on('click', '#ed', function() {
                        var EDIT = "yes";
                        var data = table1.row($(this).parents('tr')).data();
                        var dataString = 'edit=' + EDIT + '&id=' + data[0];
                        $.ajax({
                            modal: true,
                            type: "GET",
                            url: "fetch_single_data.php?" + dataString,
                            data: dataString,
                            cache: false,
                            success: function(response) {
                                $('.modal-body').html(response);
                                $('#myModal').modal('show');
                            }
                        });
                    })
                    $("#update").click(function(){
                        var EDIT = "yes";
                        var x =   ($("form").serializeArray());
                        var id = x[0].value;
                        var fname = x[1].value;
                        var lname = x[2].value;
                        var email = x[3].value;
                        var date = x[4].value;
                        $.ajax({
                            modal: true,
                            type: "GET",
                            url: "edit.php?edit="+EDIT+"&id="+id +"&fname="+fname+"&lname="+lname+"&email="+email+"&date="+date, 
                            cache: false,
                            success: function(response) {
                                table1.ajax.reload();

                            }
                        });
                    })

            })
        </script>

    </head>

    <body>
    
        <div class="container table-responsive ">
            <!-- Modal -->
        <form action="">
            <div class="modal fade" id="myModal" style="border-radius: 15px" role="dialog">
                <div class="modal-dialog" > 
        
                    <!-- Modal content-->
                    <div class="modal-content">
                        <div class="modal-header" style='padding:35px 25px;'>
                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                            <h4 class="modal-title" style="font-size: 24px;font-weight: 600; ">Update Record</h4>
                        </div>
                        <div class="modal-body" style="padding:40px 20px; ">
        
                        </div>
                        <div class="modal-footer">
                            <button type="submit" class="btn btn-success"  id="update" data-dismiss="modal">Update</button>
                            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                        </div>
                    </div>
        
                </div>
            </div>
        </form>
   

            <table id="example" class="table table-bordered" style="width:100%">
                <thead class="thead-dark">
                    <tr>
                        <th>Id</th>
                        <th>F_Name</th>
                        <th>L_Name</th>
                        <th>E-mail</th>
                        <th>Reg_date</th>
                        <th>Edit</th>
                        <th>Delete</th>
                    </tr>
                </thead>

            </table>
        </div>

    </body>

    </html>