<html>
<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
    
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <meta charset="utf-8">
    <link rel="stylesheet" href="style.css">

</head>

<body>
    <form method="get" name="limit">
        <div class="topnav">
            <input type="text" id="search" name="search" placeholder="Search.."  value="<?php if (isset($_GET["search"]) && $_GET["search"] != "") {
                                                                                echo $_GET['search'];
                                                                            } else {
                                                                                echo "";
                                                                            } ?>">
            <button type="submit" class="btn btn-info" onclick="submit();">Search..</button>
        </div>
        <select autofocus class="active " name="limit" onclick="submit();">
            <option value="5" <?= $_GET['limit'] == 5 ? ' selected="selected" ' : '' ?>>5</option>
            <option value="10" <?= $_GET['limit'] == 10 ? ' selected="selected" ' : '' ?>>10</option>
            <option value="15" <?= $_GET['limit'] == 15 ? ' selected="selected" ' : '' ?>>15</option>
            <option value="20" <?= $_GET['limit'] == 20 ? ' selected="selected" ' : '' ?>>20</option>
            <option value="25" <?= $_GET['limit'] == 25 ? ' selected="selected" ' : '' ?>>25</option>
        </select><br /><br /><br />
    </form>
    <?php
    require_once "connection.php";
    //get column name for sorting and order
    $column = isset($_GET['column']) ? $_GET['column'] : 'id';
    $order = $_GET['order'] == 'ASC' ? 'DESC' : 'ASC';
    //Get Page Number 
    $pn = isset($_GET["page"]) ? $_GET["page"] : 1;
    //Get limit
    $limit = isset($_GET["limit"]) ? $_GET["limit"] : 5;
    //Get Search value
    $search = isset($_GET["search"]) ? $_GET["search"] : '';
    $start_from = ($pn - 1) * $limit;

    $sql="SELECT * FROM `MyGuests` WHERE CONCAT(`id`, `firstname`, `lastname`, `email`, `reg_date`) LIKE '%".$search. "%' ORDER BY $column $order LIMIT $start_from, $limit  "; 
    
    $result = mysqli_query($con, $sql);
    $count = mysqli_num_rows($result);
    $url_var = array("page" => $pn, "limit" => $limit,"column" => $column, "order" => $order);
   ?>

   
    <table class="table table-bordered table-hover">
        <thead class="thead-dark">
            <tr>
                <th onclick="change('id')">ID</th>
                <th onclick="change('firstname')">Name</th>
                <th onclick="change('email')">Email</th>
                <th onclick="change('reg_date')">Date / Time</th>
            </tr>
        </thead>
        <?php
            while ($row = mysqli_fetch_assoc($result)) { ?>
                <tr>
                    <td><?= $row['id']; ?></td>
                    <td><?= $row['firstname'] . $row['lastname']; ?></td>
                    <td><?= $row['email']; ?></td>
                    <td><?= $row['reg_date']; ?></td>
                </tr>
        <?php  } ?>
    </table>
    <ul class="pagination">
    
        <?php
        
        $sql="SELECT count(id) FROM `MyGuests` WHERE CONCAT(`id`, `firstname`, `lastname`, `email`, `reg_date`) LIKE '%".$search. "%' "; 
        $order1 = $_GET['order'];

        $result = mysqli_query($con, $sql);
        $row = mysqli_fetch_row($result);
        $total_records = $row[0];
        $total_pages = ceil($total_records / $limit);
        $pagLink = "";
        for ($i = 1; $i <= $total_pages; $i++) {
             $url = 'sort2.php?page='.$i.'&limit='.$limit.'&search='.$search.'&column='.$column.'&order='.$order1;
            if ($i == $pn) {  ?>

        <li class='active'><a href="<?= $url ?>"><?= $i ?></a></li>

        <?php }else { ?>
                
        <li ><a href="<?= $url ?>"><?= $i ?></a></li>
        <?php }  }echo $pagLink; ?>
    </ul>
</body>
</html>
<script>
  
  var array1 = <?php echo json_encode($url_var); ?>;
  var page = array1['page'];
  var limit = array1['limit'];
  var search = document.getElementById('search').value;
  var order= array1['order'];
  var column = array1['column'];
  
  function change(column){
      
      var url = 'sort2.php?php='+page+'&limit='+limit+'&search='+search+'&column='+column+'&order='+order;
      window.location.href = url;
      var neeurl = window.location;

  }
  
</script>