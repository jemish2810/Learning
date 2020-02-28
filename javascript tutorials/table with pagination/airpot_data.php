<html>
<head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
        <meta charset="utf-8">  
</head>
<body>
    <?php
       require_once "connection.php";
       $limit = 5;       
       if(isset($_GET["page"])){
        $pg = $_GET["page"]; 
       }
       else{
           $pg = 1;
       }
       $start = ($pg-1)*$limit;
       $sql = "SELECT * FROM TBL_NAME LIMIT $start,$limit ";
       $result = mysqli_query($con,$sql);
    ?>
    <div class="table-responsive">
        <table class="table table-bordered">
        <thead class="thead-dark">

        <tr>
        <th>COL 1</th>
        <th>COL 2</th>
        <th>COL 3</th>
        <th>COL 4</th>
        <th>COL 5</th>
        <th>COL 6</th>
        <th>COL 7</th>
        <th>COL 8</th>
        <th>COL 9</th>
        <th>COL 10</th>
        <th>COL 11</th>
        <th>COL 12</th>
        <th>COL 13</th>
        <th>COL 14</th>
        <th>COL 15</th>
        <th>COL 16</th>

        </tr>
    </thead>
        <?php 
        while($row = mysqli_fetch_assoc($result)){ ?>
            <tr>
                <td><?php echo $row['COL 1']; ?></td>
                <td><?php echo $row['COL 2']; ?></td>
                <td><?php echo $row['COL 3']; ?></td>
                <td><?php echo $row['COL 4']; ?></td>
                <td><?php echo $row['COL 5']; ?></td>
                <td><?php echo $row['COL 6']; ?></td>
                <td><?php echo $row['COL 7']; ?></td>
                <td><?php echo $row['COL 8']; ?></td>
                <td><?php echo $row['COL 9']; ?></td>
                <td><?php echo $row['COL 10']; ?></td>
                <td><?php echo $row['COL 11']; ?></td>
                
                <td><?php echo $row['COL 13']; ?></td>
                <td><?php echo $row['COL 14']; ?></td>
                <td><?php echo $row['COL 15']; ?></td>
                <td><?php echo $row['COL 16']; ?></td>
                <td><?php echo $row['COL 17']; ?></td>
            </tr>
        <?php  }?>
    </table>
    
    <ul class="pagination"> 
      <?php   
        require_once "connection.php";
        $sql = "SELECT COUNT(*) FROM TBL_NAME";
        $result = mysqli_query($con,$sql);
        $row = mysqli_fetch_row($result);  
        $total_records = $row[0];     
        $total_pages = ceil($total_records / $limit);   
        $pagLink = "";                         
        for ($i=1; $i<=$total_pages; $i++) { 
          if ($i==$pn) { 
              $pagLink .= "<li class='active'><a href='airpot_data.php?page=".$i."'>".$i."</a></li>"; 
          }             
          else  { 
              $pagLink .= "<li><a href='airpot_data.php?page=".$i."'>".$i."</a></li>";   
          } 
        };   
        echo $pagLink;   
      ?> 
      </ul>
    </div>
    </body>
</html>