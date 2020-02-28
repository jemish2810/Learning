
<?php 
    require_once 'connection.php';
    $country_id = $_GET['country_id'];
    $state_id = $_GET['state_id'];

    if($country_id != ""){   
        $sql = "select id,name from states where country_id = $country_id";
        $res = mysqli_query($con, $sql);
        echo "<label for='state'>State :</label>";
        echo "<select id= 'state_id' onchange='change_state()' class='form-control'>";
        echo "  <option  selected>";echo"Please Select Country";echo"</option>";
        while($row = mysqli_fetch_assoc($res)){
         
            echo "<option value = '$row[id]'>";echo $row['name'];echo "</option>";
        }
        echo "</select><br>";
        echo json_encode($jarray);
    }
    if($state_id != ""){  

        $sql = "select id,name from cities where state_id = $state_id";
        $res = mysqli_query($con, $sql);
        echo "<label for='city'>City :</label>";
        echo "<select class='form-control'>";
        echo "  <option  selected>";echo"Please Select state";echo"</option>";
        while($row = mysqli_fetch_assoc($res)){

            echo "<option value = '$row[id]'>";echo $row['name'];echo "</option>";
        }
        echo "</select><br>";
    }
?>