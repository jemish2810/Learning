<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
    <title>Document</title>
</head>
<style>

</style>

<body>

<form action="alldata.php" method="get">
    <div class="container ">
        <div class="row justify-content-md-center   ">
            <div class="col-sm-9">
                <h2>Form</h2>
                <form action="alldata.php" method="get">
                    <div class="form-group">
                        <label for="name">Name:</label>
                        <input type="text" name="name" class="form-control" id="name" placeholder="Enter name" name="name">
                    </div>
                    <div class="form-group">
                        <label for="url">Url:</label>
                        <input type="text" class="form-control" id="url" placeholder="Enter url" name="url">
                    </div>
                    <div class="form-group">
                        <label for="email">Email:</label>
                        <input type="email" class="form-control" id="email" placeholder="Enter email" name="email">
                    </div>
                    <div class="form-group">
                        <label for="pwd">Password:</label>
                        <input type="password" class="form-control" id="pwd" placeholder="Enter password" name="pswd">
                    </div>
                    <div class="form-group">
                        <label for="pwd">Password conformation:</label>
                        <input type="password" class="form-control" id="pwd1" placeholder="Re-Enter password" name="pswd">

                    </div>
                    <div class="form-group  " id="copy1">
                        <div class="form-group row" id="copy">
                        
                            <div class="col">
                                <label for="members"> Number of memebers:</label>
                                <input type="number" class="form-control " id="members" name="members">
                            </div>
                            
                            <div class="col">
                                <label for="percentage"> Percentage:</label>
                                <input type="number" class="form-control" id="percentage" name="percentage">

                            </div>
                            <div class="col">
                                <br />
                                <button type="button" class="btn btn-danger" onclick="this.parentNode.parentNode.remove()">-</button>
                                <button type="button" class="btn btn-success add" onclick="myFunction()">+</button>
                            </div>

                        </div>

                    </div>
                    <div id="newdiv" class="form-group row"></div>
                    <button type="submit" class="btn btn-info">Save</button>
                    <button id="cancel" name="cancel" class="btn btn-outline-secondary" value="1">Cancel</button>
                </form>
            </div>
        </div>
    </div>
</form>
</body>

</html>

<script>
    var i = 0;

    function next() {
        var original = document.getElementById('copy');
        var clone = original.cloneNode(true);
        var x = original.parentNode.appendChild(clone);
    }
    var counter = 1;
    function myFunction() {
        var h = document.getElementById("copy1").innerHTML;
       var hh = document.getElementById("copy");
        hh.insertAdjacentHTML("afterend",h);
    }

   
</script>
