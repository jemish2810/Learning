<?php
require_once 'connection.php';

?>
<!DOCTYPE html>
<html lang="en">

<head>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Ajax Demmo</title>
</head>
<script>
  // function getstatelist() {
  //   var country_select = document.getElementById('country-select');
  //   var country_id = country_select.options[country_select.selectedIndex].value;
  //   console.log('CountryId : ' + country_id);
  //   var country_select = document.getElementById("country-select");
  //   country_select.addEventListener("change", getStatesSelectList);
  // }
</script>

<body>
  <form method="get" id="myForm" action="">

    <div class="container ">
      <div class="row justify-content-md-center   ">
        <div class="col-sm-6  ">
          <h2>Country state City</h2></br></br>

          <!-- country select option -->
          <div id="country">
            <label for="country">Country :</label>
            <select id="country-select" class="form-control" onchange="country()">
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
            <select class="form-control" id="state_id">
              <option selected>Please Select Country</option>
            </select><br>
          </div>

          <!-- city select option -->
          <div id="city1">
            <label for="city">City :</label>
            <select id="city-state" class="form-control">
              <option selected>Please Select state</option>
            </select>
          </div>
        </div>
      </div>
    </div>
  </form>
  <script type="text/javascript">
    function country() {
      var xhr = new XMLHttpRequest();
      var countryselect = document.getElementById('country-select').value;
      xhr.open("GET", "ajax.php?country_id=" + countryselect, false);
      xhr.send(null);
      document.getElementById('state1').innerHTML = xhr.responseText;
      
      if (countryselect == 'select') {
        console.log(countryselect);
        var c = document.getElementById("city1").innerHTML = " <label for='city'>City :</label><select class = 'form-control'><option selected>Please Select state</option></select>";
      }
    }

    function change_state() {
      var stateid = document.getElementById('state_id').value;
      var xhr = new XMLHttpRequest();
      xhr.open("GET", "ajax.php?state_id=" + stateid, false);
      xhr.send(null);
      document.getElementById('city1').innerHTML = xhr.responseText;
    }
  </script>
</body>

</html>