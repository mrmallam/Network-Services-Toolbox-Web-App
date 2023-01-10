<?php

session_start();

if(!isset($_SESSION["login"]) || $_SESSION["login"] !== true){
    heaer("Location: login.php");
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
            <a href="./NetworkSettings/network_settings.php">Network Settings</a><br/>
            <a href="./UserSettings/user_settings.php">User Settings</a><br/>
            <a href="./NetworkReport/network_report.php">Network Report</a><br/>
        </nav>
        
    </body>
</html>