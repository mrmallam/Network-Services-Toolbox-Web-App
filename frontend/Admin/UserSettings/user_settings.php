<?php

session_start();

if(!isset($_SESSION["login"]) || $_SESSION["login"] !== true){
    header("Location: ../../login.php");
    exit;
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/water.css@2/out/water.css">
</head>
<body>
    <nav>
        <a href="./Users/user.php">Users</a><br/>
        <a href="./ParentalControl/parentalControl.php">Parental Controls</a><br/>
    </nav>
    
</body>
</html>