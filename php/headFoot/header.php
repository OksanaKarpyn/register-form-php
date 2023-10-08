<?php 
session_start();
$isLogged = isset($_SESSION['user_id']);

 ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <title>Document</title>
</head>

<body>
    <!-- <header>
        <ul>
            <?php 
            if(!$isLogged){?>
            <li><a href="register.php">Register</a></li>
            <li><a href="login.php">Login</a></li>
            <?php } else{?>
            <li><a href="profile.php">Profile</a></li>
            <li><a href="actions/logout.php">Logout</a></li>
            <?php }
            ?>
        </ul>
    </header> -->