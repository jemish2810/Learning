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
        <!-- search items -->
        <div class="topnav">
            <input type="text" name="search" placeholder="Search.." value="<?php if (isset($_GET["search"]) && $_GET["search"] != "") {
                                                                                echo $_GET['search'];
                                                                            } else {
                                                                                echo "";
                                                                            } ?>">
            <button type="submit" class="btn btn-info" onclick="submit();">Search..</button>
        </div>
        <!-- end search  -->
        <!-- selsect limit -->
        <select class="active " name="limit" onclick="submit();">
            <option value="5" <?= $_GET['limit'] == 5 ? ' selected="selected" ' : '' ?>>5</option>
            <option value="10" <?= $_GET['limit'] == 10 ? ' selected="selected" ' : '' ?>>10</option>
            <option value="15" <?= $_GET['limit'] == 15 ? ' selected="selected" ' : '' ?>>15</option>
            <option value="20" <?= $_GET['limit'] == 20 ? ' selected="selected" ' : '' ?>>20</option>
            <option value="25" <?= $_GET['limit'] == 25 ? ' selected="selected" ' : '' ?>>25</option>
        </select><br /><br /><br />
        <!-- end select -->
    </form>
    <?php
    require_once "connection.php";
    $column = isset($_GET['column']) ? $_GET['column'] : 'id';
    $page = isset($_GET['page']) ? $_GET['page'] : 1;   
    $order = $_GET['order'] == 'ASC' ? 'DESC' : 'ASC';
    //Get Page Number limit Search value
    $pn = isset($_GET["page"]) ? $_GET["page"] : 1;
    $limit = isset($_GET["limit"]) ? $_GET["limit"] : 5;
    $search = isset($_GET["search"]) ? $_GET["search"] : '';
    // $search = isset($_GET["search"]) ? $_GET["search"] : '';

    $start_from = ($pn - 1) * $limit;
    if(  $column != '' ) { 
            $sql = "SELECT * FROM MyGuests where id  LIKE '%" . $search . "%' OR
                                                firstname LIKE '%" . $search . "%' OR
                                                lastname LIKE '%" . $search . "%' OR 
                                                email LIKE '%" . $search . "%' OR
                                                reg_date LIKE '%" . $search . "%' ORDER BY $column $order LIMIT $start_from, $limit  ";
    }
    else{
        $column = 'id';
        $order1= $_GET['order'];
        $sql = "SELECT * FROM MyGuests where id  LIKE '%" . $search . "%' OR
                                                firstname LIKE '%" . $search . "%' OR
                                                lastname LIKE '%" . $search . "%' OR 
                                                email LIKE '%" . $search . "%' OR
                                                reg_date LIKE '%" . $search . "%' ORDER BY $column $order1 LIMIT $start_from, $limit  ";
    }
    $result = mysqli_query($con, $sql);
    $count = mysqli_num_rows($result);  
    ?>
    <table class="table table-striped table-bordered table-hover table-sm">
        <thead class="thead-dark">
            <tr>
                <th><a href="sorting_pagination.php?page=<?php echo $pn; ?>&limit=<?php echo $limit; ?>&search=<?php echo $search; ?>&column=<?php echo 'id' ?>&order=<?php echo $order; ?>">ID</a></th>
                <th><a href="sorting_pagination.php?page=<?php echo $pn; ?>&limit=<?php echo $limit; ?>&search=<?php echo $search; ?>&column=<?php echo 'firstname' ?>&order=<?php echo $order; ?>">Firstname</a></th>
                <th><a href="sorting_pagination.php?page=<?php echo $pn; ?>&limit=<?php echo $limit; ?>&search=<?php echo $search; ?>&column=<?php echo 'firstname' ?>&order=<?php echo $order; ?>">Lastname</a></th>
                <th><a href="sorting_pagination.php?page=<?php echo $pn; ?>&limit=<?php echo $limit; ?>&search=<?php echo $search; ?>&column=<?php echo 'firstname' ?>&order=<?php echo $order; ?>">E-mail</a></th>
                <th><a href="sorting_pagination.php?page=<?php echo $pn; ?>&limit=<?php echo $limit; ?>&search=<?php echo $search; ?>&column=<?php echo 'firstname' ?>&order=<?php echo $order; ?>">Date/Time</a></th>
            </tr>
        </thead>
        <!-- fill data from table -->
        <?php
        while ($row = mysqli_fetch_assoc($result)) { ?>
            <tr>
                <td><?= $row['id']; ?></td>
                <td><?= $row['firstname']; ?></td>
                <td><?= $row['lastname']; ?></td>
                <td><?= $row['email']; ?></td>
                <td><?= $row['reg_date']; ?></td>
            </tr>
        <?php  } ?>

    </table>
    <ul class="pagination">
        <?php
        //COUNT items from search 
        $sql1 = "SELECT * FROM MyGuests where id  LIKE '%" . $search . "%' OR
                                                    firstname LIKE '%" . $search . "%' OR
                                                    lastname LIKE '%" . $search . "%' OR 
                                                    email LIKE '%" . $search . "%' OR
                                                    reg_date LIKE '%" . $search . "%'   ";       
        $result = mysqli_query($con, $sql1);
        $row1 = mysqli_num_rows($result);
        $order1= $_GET['order'];
        $total_pages = ceil($row1 / $limit);
        $pagLink = "";
        for ($i = 1; $i <= $total_pages; $i++) {
            if ($i == $pn) {
                $pagLink .= "<li class='active'><a href='sorting_pagination.php?page=" . $i . "&limit=" . $limit . "&search=" . $search . "&column=" . $column . "&order=".$order1."'>" . $i . "</a></li>";
            } else {
                $pagLink .= "<li><a href='sorting_pagination.php?page=" . $i . "&limit=" . $limit . "&search=" . $search . "&column=" . $column . "&order=".$order1. "'>" . $i . "</a></li>";
            }
        }
        echo $pagLink;
        ?>
    </ul>
</body>

</html>