<!DOCTYPE html>
<html lang="en">
<head>
<script src="https://cdnjs.cloudflare.com/ajax/libs/json2/20160511/json2.min.js"></script>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>


</head>
<body>
country:
    <select name="country" id="country">
        <option value=""></option>
    </select>
state:
    <select name="state" id="state">
        <option value=""></option>
    </select>
City:
    <select name="city" id="city">
        <option value=""></option>
    </select>
<script>
  $(document).ready(function(){
    function load_json_data(id,name){
        var htmlcode = '';
        $.getJSON('country.json',function(data){
            htmlcode += '<option value="">select' +id+'</option>';
            $.each(data,function)

        });
    }



  });


</script>
</body>
</html>