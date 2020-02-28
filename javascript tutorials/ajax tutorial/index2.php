<?php
require_once 'connection.php';

?>
<!DOCTYPE html>
<html lang="en">

<head>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
  <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/css/select2.min.css" rel="stylesheet" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/js/select2.min.js"></script>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Ajax Demmo</title>
</head>
<body>
  <form method="get" id="myForm" action="">

    <div class="container ">
      <div class="row justify-content-md-center   ">
        <div class="col-sm-6  ">
          <h2>Country state City</h2></br></br>

          <!-- country select option -->
          <div id="country">
            <label for="country">Country :</label>
            <select id="country-select" class="form-control" onchange="getstate()">
              <option value="select">Select Country</option>
              <?php
              $sql = "select id,name from countries";
              $result = mysqli_query($con, $sql);
              while ($row = mysqli_fetch_assoc($result)) {
              ?>
                <option value="<?php echo $row['id'] ?>"><?php echo $row['name'] ?></option>
              <?php } ?>
            </select><br>
          </div>
          <!-- state select option -->

          <div id="state1">
            <label for="state">State :</label>
            <select class="form-control" id="state_id" onchange="getcity()">
            <option ></option>
            </select><br>
          </div>

          <!-- city select option -->
          <div id="city1">
            <label for="city">City :</label>
            <select id="city_id" class="form-control">
              <option ></option>
            </select>
          </div>
        </div>
      </div>
    </div>
  </form>
  <script type="text/javascript">

    function getstate() {
      var state = document.getElementById('state_id');
      var cityid = document.getElementById('city_id');

      var xhr = new XMLHttpRequest();

      var countryselect = document.getElementById('country-select').value;
      xhr.onreadystatechange = function() {

        if (xhr.readyState == 4 && xhr.status == 200) {
          var json = JSON.parse(xhr.responseText);
         
          while (state.firstChild) {
            state.removeChild(state.firstChild);
          }
          while (cityid.firstChild) {
            cityid.removeChild(cityid.firstChild);
          }
          
          let option;
          for (let i = 0; i < json.length; i++) {
            option = document.createElement('option');
            option.text = json[i].name;
            option.value = json[i].id;
            state.add(option);
          }

        }
      }
      xhr.open("GET", "testjson.php?country_id=" + countryselect, false);
      xhr.send(null);
    }

    function getcity() {
      var stateid = document.getElementById('state_id').value;
      var cityid = document.getElementById('city_id');
      var xhr = new XMLHttpRequest();
      xhr.onreadystatechange = function() {
        if (xhr.readyState == 4 && xhr.status == 200) {
          var json = JSON.parse(xhr.responseText);
          let option;
          for (let i = 0; i < json.length; i++) {
            option = document.createElement('option');
            option.text = json[i].name;
            option.value = json[i].id;
            cityid.add(option);
          }
        }
      }
      xhr.open("GET", "testjson.php?state_id=" + stateid, false);
      xhr.send(null);

    }
  </script>
</body>

</html>