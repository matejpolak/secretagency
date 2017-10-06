<?php
require 'db.php';
$query = 'SELECT * FROM users';

$stmt = db::query($query);

// var_dump($stmt);

$data = $stmt->fetchAll();


if($_POST) {
    // $username = $_POST['username'];
    // $password = $_POST['password'];
    foreach ($data as $users) {
        if(($_POST['username'] == $users['username']) && ($_POST['password'] == $users['password'])) {
                header('Location: cbp.php');
        } 
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>DSA | LOGIN</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/css/bootstrap.min.css" integrity="sha384-/Y6pD6FV/Vv2HJnA6t+vslU6fwYXjCFtcEpHbNJ0lyAFsXTsjBbfaDjzALeQsN6M" crossorigin="anonymous">
</head>
<body class="bg-secondary">
    <nav class="navbar navbar-dark bg-dark d-flex justify-content-around">
        <a class="navbar-brand text-center" href="#">DSA - Deep Secret Agency</a>
    </nav>
    <div class="container">
        <div class="row d-flex justify-content-center">
            <div class="col-4 bg-dark mt-5  rounded">
                <h2 class="text-light mt-2">Sign Up</h2>
                <form class="pt-2 pb-1" method="post">
                    <div class="form-group">
                        <label class="text-light" for="username">Username:</label>
                        <input type="text" name="username" class="form-control" id="username" placeholder="Enter your username">
                    </div>
                    <div class="form-group">
                        <label class="text-light" for="password">Password:</label>
                        <input type="password" name="password" class="form-control" id="password" placeholder="Enter your password">
                    </div>
                    <button type="submit" class="btn btn-primary w-40">Sign In</button>
                    <button type="submit" class="btn btn-primary w-40">Sign Up</button>
                    <small id="emailHelp" class="form-text text-muted">Never share your login informations with anyone else.</small>
                </form>
            </div>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.11.0/umd/popper.min.js" integrity="sha384-b/U6ypiBEHpOf/4+1nzFpr53nxSS+GLCkfwBdFNTxtclqqenISfwAzpKaMNFNmj4" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/js/bootstrap.min.js" integrity="sha384-h0AbiXch4ZDo7tp9hKZ4TsHbi047NrKGLO3SEJAg45jXxnGIfYzk4Si90RDIqNm1" crossorigin="anonymous"></script>
</body>
</html>