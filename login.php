<?php
require 'db.php';
require 'db_connect.php';


if($_POST) {
    $errors = [];
    if(strlen($_POST['username']) == 0){
        $errors[] = 'You didn\'t filled in your username!';
    }
    if(strlen($_POST['password']) == 0){
        $errors[] = 'You didn\'t filled in your password!';
    }
    else {
        // $username = $_POST['username'];
        // $password = $_POST['password'];
            $db = db_connect();
            $stmt = $db->prepare('SELECT * FROM `users` WHERE `username` = ?');
            $stmt->execute([$_POST['username']]);
            $user = $stmt->fetch();
            if (password_verify($_POST['password'], $user['password'])) {
                header('Location: cbp.php');
                exit();
            }
        header('Location: ?status=notok');
    }
}
if(isset($_GET['status'])) {
    $not = [];
    if($_GET['status'] == 'notok') { 
        $not[] = 'You didn\'t filled in correct username or password';
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
                    <a type="button" href="registration.php" class="btn btn-primary w-40">Sign Up</a>
                    <small id="emailHelp" class="form-text text-muted">Never share your login informations with anyone else.</small>
                </form>
            </div>
        </div>
        <div class="row d-flex justify-content-center">
            <div class="col-4 mt-3 px-3">
                <div class="error">
                    <?php if(isset($errors)): ?>
                        <?php foreach($errors as $message): ?>
                            <div class="alert alert-danger w-100" role="alert">
                                <?=$message;?>
                            </div>
                        <?php endforeach; ?>
                    <?php endif; ?>

                    <?php if(isset($not)): ?>
                        <?php foreach($not as $value): ?>
                            <div class="alert alert-danger w-100" role="alert">
                                <?=$value;?>
                            </div>
                        <?php endforeach; ?>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.11.0/umd/popper.min.js" integrity="sha384-b/U6ypiBEHpOf/4+1nzFpr53nxSS+GLCkfwBdFNTxtclqqenISfwAzpKaMNFNmj4" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/js/bootstrap.min.js" integrity="sha384-h0AbiXch4ZDo7tp9hKZ4TsHbi047NrKGLO3SEJAg45jXxnGIfYzk4Si90RDIqNm1" crossorigin="anonymous"></script>
</body>
</html>