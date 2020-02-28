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
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <meta charset="utf-8">
    <link rel="stylesheet" href="style.css">


</head>
<body>
    <form method="get" name="limit">
        <div class="topnav">
            <input type="text" name="search" placeholder="Search.." value="<?php if (isset($_GET["search"]) && $_GET["search"] != "") {
                                                                                echo $_GET['search'];
                                                                            } else {
                                                                                echo "";
                                                                            } ?>">
            <button type="submit" class="btn btn-info" onclick="submit();">Search..</button>
        </div>
        <select class="active " name="limit" onclick="submit();">
            <option value="5" <?= $_GET['limit'] == 5 ? ' selected="selected" ' : '' ?>>5</option>
            <option value="10" <?= $_GET['limit'] == 10 ? ' selected="selected" ' : '' ?>>10</option>
            <option value="15" <?= $_GET['limit'] == 15 ? ' selected="selected" ' : '' ?>>15</option>
            <option value="20" <?= $_GET['limit'] == 20 ? ' selected="selected" ' : '' ?>>20</option>
            <option value="25" <?= $_GET['limit'] == 25 ? ' selected="selected" ' : '' ?>>25</option>
        </select><br /><br /><br />
    </form>
    <?php
        require_once "connection.php";
        $column = isset($_GET['column']) ? $_GET['column'] : 'id';
        $order = $_GET['order'] == 'ASC' ? 'DESC' : 'ASC';
        //Get Page Number 
        $pn = isset($_GET["page"]) ? $_GET["page"] : 1;

        //Get limit
        $limit = isset($_GET["limit"]) ? $_GET["limit"] : 10;
    
        //Get Search value
        $search = isset($_GET["search"]) ? $_GET["search"] : '';

        $start_from = ($pn - 1) * $limit;
        $sql="SELECT * FROM `MyGuests` WHERE CONCAT(`id`, `firstname`, `lastname`, `email`, `reg_date`) LIKE '%".$search. "%' ORDER BY $column $order LIMIT $start_from, $limit  "; 
        
        $result = mysqli_query($con, $sql);
        
        $count = mysqli_num_rows($result);
    ?>
    <table class="table table-bordered table-hover">
        <thead class="thead-dark">
            <tr>
                <th><a href="sort.php?page=<?php echo $pn; ?>&limit=<?php echo $limit; ?>&search=<?php echo $search; ?>&column=<?php echo 'id' ?>&order=<?php echo $order; ?>">ID</a></th>
                <th><a href="sort.php?page=<?php echo $pn; ?>&limit=<?php echo $limit; ?>&search=<?php echo $search; ?>&column=<?php echo 'firstname' ?>&order=<?php echo $order; ?>">Name</a></th>
                <th><a href="sort.php?page=<?php echo $pn; ?>&limit=<?php echo $limit; ?>&search=<?php echo $search; ?>&column=<?php echo 'firstname' ?>&order=<?php echo $order; ?>">E-mail</a></th>
                <th><a href="sort.php?page=<?php echo $pn; ?>&limit=<?php echo $limit; ?>&search=<?php echo $search; ?>&column=<?php echo 'firstname' ?>&order=<?php echo $order; ?>">Date/Time</a></th>
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
        //COUNT items from search 
        $sql = "SELECT COUNT(id) FROM MyGuests where id  LIKE '%" . $search . "%' OR
                                                    firstname LIKE '%" . $search . "%' OR
                                                    lastname LIKE '%" . $search . "%' OR 
                                                    email LIKE '%" . $search . "%' OR
                                                    reg_date LIKE '%" . $search . "%' ";
        $order1= $_GET['order'];
        $result = mysqli_query($con, $sql);
        $row = mysqli_fetch_row($result);
        $total_records = $row[0];
        $total_pages = ceil($total_records / $limit);
        $pagLink = "";        
                
        for ($i = 1; $i <= $total_pages; $i++) {
            if ($i == $pn) {
                $pagLink .= "<li class='active'><a href='sort.php?page=" . $i . "&limit=" . $limit . "&search=" . $search ."&column=" . $column . "&order=".$order1."'>" . $i . "</a></li>";
            } else {
                $pagLink .= "<li><a href='sort.php?page=" . $i . "&limit=" . $limit . "&search=" . $search ."&column=" . $column . "&order=".$order1."'>" . $i . "</a></li>";
            }
        }
        echo $pagLink;
        ?>
    </ul>
</body>
</html>