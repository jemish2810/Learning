<?php
include('connection.php');

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">

    <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>

    <style>
        #sortable1, #sortable2 {
            height: 500px;
            /* background:pink; */
            border: 1px solid black;

            border-radius:10px;
        }

        #sortable1 li, 
        #sortable2 li {
            margin-left: 5px;

        }
    </style>
</head>

<body>
    <?php
    $sql = "select * from product";
    $result = $connection->query($sql);
    ?>
    <div class="row">

        <select class="form-control col-md-5 mt-5 offset-md-3" id="selectBox" name="sellist1">
            <option value="">select product</option>
            <?php
            while ($row = $result->fetch_assoc()) {
                ?>
            <option value="<?= $row['p_id'] ?>"><?= $row['p_name'] ?></option>
            <?php 
        } ?>
        </select>
        <!-- <span id="message" class='alert  alert-danger col-md-5 offset-md-3 mt-3'>Please select product</span> -->
    </div>

    <div class="container mt-5">
        <div class="row">
            <div class="col-md-4">
                <ul id="sortable1" class="list-group col-md-12 connectedSortable">
                    
                </ul>
            </div>
            <div class="col-md-4">
                <ul id="sortable2" class="list-group col-md-12 connectedSortable">
                </ul>
            </div>
        </div>
    </div>
</body>

</html>
<script>
    $(document).ready(function () {

        if ($('#selectBox').val() == '') {
            $('#sortable1').children('li').css("display", "none");
            $('#message').css("display", "block");
        }

        $("#selectBox").on('change', function () {
            
            if ($('#selectBox').val() == '') {
                $('#sortable1').children('li').css("display", "none");
                $('#message').css("display", "block");
            } else {
                $('#sortable1').children('li').css("display", "block");
                $('#message').css("display", "none");
            }


            product_id = $(this).val();
            
            var sel1 = $('#sortable1');
            var sel2 = $('#sortable2');

            $.ajax({
                url: "fetch.php",
                method: "POST",
                data: {
                    'product_id': product_id
                },
                dataType: "json",

                success: function (data) {
                    if (sel1.children('li').length > 0 || sel2.children('li').length > 0) {
                        sel1.children('li').remove();
                        sel2.children('li').remove();
                    };

                    var rows1 = data['rows'];
                    var rows2 = data['rows2'];

                    for (x in rows1) {
                        sel2.append($("<li></li>").val(rows1[x].sub_id).text(rows1[x]
                                .cat_name)
                            .addClass('list-group-item').attr('cat_id', rows1[x].cat_id)
                        );
                    }
                    for (y in rows2) {
                        sel1.append($("<li></li>").text(rows2[y].cat_name)
                            .addClass('list-group-item').attr('cat_id', rows2[y].cat_id)
                        );
                    }

                }
            });

        });

        $("#sortable2").sortable({
            connectWith: '.connectedSortable',
            placeholder: "widget-highlight",

            receive: function (event, ui) {
                var cat_id = ui.item.attr('cat_id');
                var product_id = $("#selectBox").val();

                $.ajax({
                    url: "insert.php",
                    method: "POST",
                    data: {
                        'cat_id': cat_id,
                        'product_id': product_id,
                        'insert': 1
                    },
                    success: function (data) {

                    }
                });
            }
        });
        $("#sortable1").sortable({
            connectWith: '.connectedSortable',
            placeholder: "widget-highlight",
            receive: function (event, ui) {
                var cat_id = ui.item.attr('cat_id');
                var sub_id = ui.item.val();

                $.ajax({
                    url: "insert.php",
                    method: "POST",
                    data: {
                        'cat_id': cat_id,
                        'sub_id': sub_id,
                        'delete': 1
                    },
                    success: function (data) {

                    }
                });
            }
        });
    });
</script>