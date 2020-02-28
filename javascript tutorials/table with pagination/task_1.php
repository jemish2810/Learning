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
        <style>
        .pagination{
            justify-content: center;
            font-size: 14px;
        }
        </style> 
   </head>
    <body>
    <?php
        require_once "connection.php";
        $limit = 10;  
        if (isset($_GET["page"])) {  
            $pn  = $_GET["page"];
        }
        else {  
            $pn=1;  
        }; 
        
       $start_from = ($pn-1)*$limit;
        $sql = "SELECT * FROM MyGuests LIMIT $start_from, $limit";
        $result = mysqli_query($con,$sql);     
    ?>
    <table class="table table-bordered table-hover">
    <thead class="thead-dark">
        <tr>
        <th>Id</th>
        <th>Name</th>
        <th>E-mail</th>
        <th>Date/Time</th>
        </tr>
    </thead>
        <?php 
        while($row = mysqli_fetch_assoc($result)){ ?>
            <tr>
            <td><?=$row['id']; ?></td>
            <td><?=$row['firstname'].$row['lastname'] ; ?></td>

            <td><?= $row['email']; ?></td>
            <td><?= $row['reg_date']; ?></td>
            </tr>
        <?php  }?>
    </table>
    <ul class="pagination"> 
      <?php   
       
        $sql = "SELECT COUNT(id) FROM MyGuests";
        $result = mysqli_query($con,$sql);
        $row = mysqli_fetch_row($result);  
    
        $total_records = $row[0];   
         
        $total_pages = ceil($total_records / $limit);   
        
        $pagLink = "";                         
        for ($i=1; $i<=$total_pages; $i++) { 
          if ($i==$pn) { 
              $limit= "sdf";
              $pagLink .= "<li class='active'><a href='task_1.php?page=".$i."&limit=".$limit."'>".$i."</a>
              
              </li>"; 
          }             
          else  { 
              $pagLink .= "<li><a href='task_1.php?page=".$i."&limit=".$limit."'>".$i."</a></li>";   
          } 
        }
        echo $pagLink;   
      ?> 
      </ul> 
    </body>
</html>