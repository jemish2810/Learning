<html lang="en">

<head>
    <title>Jquery Select2 - Select Box with Search Option</title>
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/css/select2.min.css" rel="stylesheet" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/js/select2.min.js"></script>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">

</head>


<body>


    <div style="width:520px;margin:0px auto;margin-top:50px;height:150px;">
        <h4>Select Box with Search Option Jquery Select2.js</h4>
        
        <div>
        <button name="open" class="btn btn-primary" id="open">open</button>
        <button name="close" class="btn btn-secondary" id="close">close</button>
        <button name="init" class="btn btn-success" id="init">init</button>
        <button name="destroy" class="btn btn-danger" id="Destroy">Destroy</button>
        <button name="select" class="btn btn-dark" id="select">select "JULY"</button>
            
        </div><br>
        <select class="myselect" id="example1" style="width:500px;  ">
            <option value="JAN">January</option>
            <option value="FEB">February</option>
            <option value="MAR">March</option>
            <option value="APR">April</option>
            <option value="MAY">May</option>
            <option value="JUN">June</option>
            <option value="JUL">July</option>
            <option value="AUG">August</option>
            <option value="SEP">September</option>
            <option value="OCT">October</option>
            <option value="NOV">November</option>
            <option value="DEC">December</option>
        </select>

    </div>
    <div style="width:520px;margin:0px auto;margin-top:50px;height:200px;">
<div>
    <select id="example" multiple="multiple" style="width: 500px">
            <optgroup label="First 6 month">

                <option value="JAN">January</option>
                <option value="FEB">February</option>
                <option value="MAR">March</option>
                <option value="APR">April</option>
                <option value="MAY">May</option>
                <option value="JUN">June</option>
            </optgroup>
            <optgroup label="Second 6 month">
                <option value="JUL">July</option>
                <option value="AUG">August</option>
                <option value="SEP">September</option>
                <option value="OCT">October</option>
                <option value="NOV">November</option>
                <option value="DEC">December</option>
            </optgroup>
        </select>
        </div><br>
        <button name="set-multi-val" class="btn btn-info" id="set-multi-val">set-multi-val</button>
        <button name="clear-multi-val" class="btn btn-danger" id="clear-multi-val">clear-multi-val</button>
        

    </div>

    <script type="text/javascript">
        $("#example1").select2({
            placeholder: 'Select a month..'
        });
        $(document).ready(function(){
        $('#example').select2({
            placeholder: 'Select a month..',
            closeOnSelect: false,
            allowClear: true

        });
        var data = {
            id: 1,
            text: 'Barn owl'
        };
        //open select box 1
        $(document).on('click', '#open', function() {

            $('#example1 ').select2('open');
        })
        //close select box 1
        $(document).on('click', '#close', function() {

            $('#example1 ').select2('close');
        })
        //distroy
        $(document).on('click', '#destroy', function() {

            $('#example1').select2('destroy');
        })
        //init
        $(document).on('click', '#init', function() {
            $('#example1').select2();

        });
        //select
        $(document).on('click', '#select', function() {

            $('#example1').val('JUL');
            $('#example1').trigger('change');

        });
        //select multi-value
        $("#set-multi-val").on("click", function() {
            $('#example').val(["JUL", "NOV"]).trigger("change");

        });
        //clear multi-value
        $("#clear-multi-val").on("click", function() {
            $('#example').val(null).trigger("change");

        });
    </script>

</body>


</html>