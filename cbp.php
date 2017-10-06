<?php
require 'db2.php';
$query = 'SELECT * FROM messages';

$stmt = db::query($query);

// var_dump($stmt);

$data = $stmt->fetchAll();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>DSA</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/css/bootstrap.min.css" integrity="sha384-/Y6pD6FV/Vv2HJnA6t+vslU6fwYXjCFtcEpHbNJ0lyAFsXTsjBbfaDjzALeQsN6M" crossorigin="anonymous">
</head>
<body class="bg-secondary">
    <nav class="navbar navbar-dark bg-dark d-flex justify-content-around">
        <a class="navbar-brand text-center" href="#">DSA - Deep Secret Agency</a>
    </nav>
    <div class="container">
        <div class="row d-flex justify-content-center">
            <?php foreach($data as $id => $value) : ?>
            <div class="col-10 mt-3">

                <div class="card bg-dark text-light">
                    <div class="card-header">
                        <b><?= $value['user'];?></b> <small>(level :<?= $value['level'];?>)</small>
                    </div>
                    <div class="card-body d-flex justify-content-center">
                    <a class="btn btn-primary" data-toggle="collapse" href="#collapse<?= $value['id'];?>" aria-expanded="false" aria-controls="collapse<?= $value['id'];?>">
                        See the message content
                    </a>
                    </div>
                    <div class="collapse" id="collapse<?= $value['id'];?>">
                        <div class="card-body">
                            <blockquote class="blockquote mb-0">
                            <p><small><?= $value['text']; ?></small></p>
                            </blockquote>
                        </div>
                    </div>
                </div>
            </div>

            <?php endforeach; ?>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.11.0/umd/popper.min.js" integrity="sha384-b/U6ypiBEHpOf/4+1nzFpr53nxSS+GLCkfwBdFNTxtclqqenISfwAzpKaMNFNmj4" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/js/bootstrap.min.js" integrity="sha384-h0AbiXch4ZDo7tp9hKZ4TsHbi047NrKGLO3SEJAg45jXxnGIfYzk4Si90RDIqNm1" crossorigin="anonymous"></script>
</body>
</html>