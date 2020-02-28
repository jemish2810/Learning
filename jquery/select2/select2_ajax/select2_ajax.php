<html lang="en">

<head>
    <title>Jquery Select2 - Select Box with Search Option</title>
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/css/select2.min.css" rel="stylesheet" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/js/select2.min.js"></script>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
    <style>

    </style>
</head>


<body>

    <div style="width:520px;margin:0px auto;margin-top:50px;height:150px; ">
        <h6>Select Country</h6>
        <select class="myselect" id="example1" style="width:500px;  ">
            <!-- Dynamic data  -->
        </select><br /><br />

        <h6>Select State</h6>
        <select class="myselect" id="example2" style="width:500px;  ">
            <!-- Dynamic data  -->
        </select><br /><br />

        <h6>Select City</h6>
        <select class="myselect" multiple="multiple" id="example3" style="width:500px;  ">
            <!-- Dynamic data  -->
        </select><br /><br />

    </div><br /><br />
    <div style="width:520px;margin:0px auto;margin-top:50px;height:200px;">
        <button name="clear-multi-val" class="btn btn-danger" id="clear-multi-val">clear-multi-val</button>
    </div>

    <script type="text/javascript">
        $(document).ready(function() {
            $("#example1").select2({
                ajax: {
                    url: "getdata.php",
                    type: "post",
                    dataType: 'json',
                    allowClear: true,
                    delay: 250,
                    data: function(params) {
                        return {
                            searchTerm: params.term, // search term

                        };
                    },
                    processResults: function(response) {
                        return {
                            results: response
                        };
                    },
                    pagination: {
                        "more": true
                    },
                    cache: true
                }
            });
            $("#example2").select2({
                placeholder: 'Select a Country First..'
            });
            $("#example3").select2({
                placeholder: 'Select a State First..'
            });
        })



        $("#example1").change(function() {
            var country_id = $(this).children("option:selected").val();
            $("#example2").select2({
                ajax: {
                    url: "getdata_state.php?country_id=" + country_id,
                    type: "post",
                    dataType: 'json',
                    allowClear: true,
                    delay: 250,
                    data: function(params) {
                        return {
                            searchTerm: params.term // search term
                        };
                    },
                    processResults: function(response) {
                        return {
                            results: response
                        };
                    },
                    cache: true
                }
            });
        });

        $("#example2").change(function() {
            var state_id = $(this).children("option:selected").val();
            $("#example3").select2({
                ajax: {
                    url: "getdata_city.php?state_id=" + state_id,
                    type: "post",
                    dataType: 'json',
                    allowClear: true,
                    delay: 250,
                    data: function(params) {
                        return {
                            searchTerm: params.term // search term
                        };
                    },
                    processResults: function(response) {
                        return {
                            results: response
                        };
                    },
                    cache: true
                }
            });
        });

        //clear multi-value
        $("#clear-multi-val").on("click", function() {
            $('#example3').val(null).trigger("change");

        });
    </script>

</body>


</html>