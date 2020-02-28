<html>

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <meta charset="utf-8">
    <link rel="stylesheet" href="style.css">

</head>

<body>

    <div class="topnav">
        <input type="text" id="search" name="search" onchange="search_fun(this.value)" placeholder="Search.." value="<?= $search?>">
    </div>
    <select autofocus class="active " name="limit" onclick="pglimit(this.value);">
        <option value="10" <?= $_GET['limit'] == 10 ? ' selected="selected" ' : '' ?>>10</option>
        <option value="15" <?= $_GET['limit'] == 15 ? ' selected="selected" ' : '' ?>>15</option>
        <option value="20" <?= $_GET['limit'] == 20 ? ' selected="selected" ' : '' ?>>20</option>
        <option value="25" <?= $_GET['limit'] == 25 ? ' selected="selected" ' : '' ?>>25</option>
    </select><br /><br /><br />

    <?php
    require_once "connection.php";

    $column = isset($_GET['column']) ? $_GET['column'] : 'id';
    $order = $_GET['order'];

    $pn = isset($_GET["page"]) ? $_GET["page"] : 1;

    $limit = isset($_GET["limit"]) ? $_GET["limit"] : 10;

    $search = isset($_GET["search"]) ? $_GET["search"] : '';
    $start_from = ($pn - 1) * $limit;

    $sql = "SELECT * FROM `MyGuests` WHERE CONCAT(`id`, `firstname`, `lastname`, `email`, `reg_date`) LIKE '%" . $search . "%' ORDER BY $column $order LIMIT $start_from, $limit  ";

    $result = mysqli_query($con, $sql);
    $count = mysqli_num_rows($result);

    ?>

    <script>
        var page = <?= $pn ?>;
        var limit = <?= $limit ?>;
        var column = '<?= $column ?>';
        var order = '<?= $order ?>';
        var search = '<?= $search ?>';

        function columnfun(column_name) {
            column = column_name;
            order = order == 'ASC' ? 'DESC' : 'ASC';
            commonurl();
        }

        function pglimit(limit1) {
            limit = limit1;
            commonurl();
        }

        function search_fun(search_rec) {
            search = search_rec;
            commonurl();
        }

        function commonurl() {

            var url = "tablepagination.php?";
            url = url + "page=" + page;
            url = url + "&limit=" + limit;
            url = url + "&search=" + search;
            url = url + "&column=" + column;
            url = url + "&order=" + order;
            window.location = url;
        }
    </script>

    <table class="table table-bordered table-hover">
        <thead class="thead-dark">
            <tr>
                <th onclick="columnfun('id')">ID</th>
                <th onclick="columnfun('firstname')">Firstname</th>
                <th onclick="columnfun('lastname')">Lastname</th>
                <th onclick="columnfun('email')">Email</th>
                <th onclick="columnfun('reg_date')">Date / Time</th>
            </tr>
        </thead>

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

        $sql = "SELECT count(id) FROM `MyGuests` WHERE CONCAT(`id`, `firstname`, `lastname`, `email`, `reg_date`) LIKE '%" . $search . "%' ";
        $order1 = $_GET['order'];

        $result = mysqli_query($con, $sql);
        $row = mysqli_fetch_row($result);
        $total_records = $row[0];
        $total_pages = ceil($total_records / $limit);
        $pagLink = "";
        for ($i = 1; $i <= $total_pages; $i++) {
            $url = 'tablepagination.php?page=' . $i . '&limit=' . $limit . '&search=' . $search . '&column=' . $column . '&order=' . $order1;
            if ($i == $pn) {  ?>

                <li class='active'><a href="<?= $url ?>"><?= $i ?></a></li>

            <?php } else { ?>

                <li><a href="<?= $url ?>"><?= $i ?></a></li>
        <?php }
        }
        echo $pagLink; ?>
    </ul>
</body>

</html>