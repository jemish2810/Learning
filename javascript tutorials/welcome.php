<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
    <title>Document</title>
</head>
<body>
<div class="container">
    <div class="row  justify-content-md-center ">
        <div class="col-sm-6 border rounded">
                <h2>Form</h2>
                <form action="alldata.php" method="get" >
                    <div class="form-group">
                        <label for="name">Name:</label>
                        <input type="text" name="name" class="form-control" id="name" placeholder="Enter name" value="<?=$_POST['name']?>" name="name" readonly>
                    </div>
                    <div class="form-group">
                        <label for="url">Url:</label>
                        <input type="text" class="form-control" id="url" value="<?=$_POST['url']?>" placeholder="Enter url" name="url"readonly >
                    </div>
                    <div class="form-group">
                        <label for="email">Email:</label>
                        <input type="email" class="form-control" id="email" value="<?=$_POST['email']?>" placeholder="Enter email" name="email" readonly>
                    </div>
                    <div class="form-group">
                        <label for="pwd">Password:</label>
                        <input type="password" class="form-control" id="pwd" value="<?=$_POST['pswd']?>" placeholder="Enter password" name="pswd" readonly>
                    </div>
                    <div class="form-group  " id="copy1">
                        <div class="form-group row" id="copy">
                        <?php 
                            $member = $_POST['members[]'];
                            while($members != 0){ ?>
                            <div class="col">
                                <label for="members"> Number of memebers:</label>
                                <input type="number" class="form-control " id="members" value="<?=print_r($_POST['members'])?>" name="members[]" readonly>
                            </div>
                            <?php  }?>
                            <div class="col">
                                <label for="percentage"> Percentage:</label>
                                <input type="number" class="form-control" id="percentage" value="<?=print_r($_POST['percentage'])?>" name="percentage[]"readonly>
                            </div>
                        </div>
                    </div>

        </div>
    </div>
</div>


</div>

</body>
</html>