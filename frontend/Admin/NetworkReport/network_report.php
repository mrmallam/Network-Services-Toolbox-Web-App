<?php

session_start();

if(!isset($_SESSION["login"]) || $_SESSION["login"] !== true){
    header("Location: ../../login.php");
    exit;
}

?>
<html>
    <head><link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/water.css@2/out/water.css"></head>
    <body>
        <h1>Network Report</h1>
        <h2>Generate a Report</h2>
        <form action="generateReport.php" method="post">
            Report Date & Time: <input type="text" name="DT"><br>
            Total Data Used: <input type="text" name="TD"><br>
            Total Connected Users: <input type="text" name="TU"><br>
            Average Speed: <input type="text" name="AS"><br>
            Average Connection Quality: <input type="text" name="ACQ"><br>
            Router SSID: <input type="text" name="SSID"><br>
            <input type="submit">
        </form>
        <h2>Get a Report</h2>
        <form action="getReport.php" method="post">
            Router SSID: <input type="text" name="SSID"><br>
            Report Date & Time: <input type="text" name="DT"><br>
            <input type="submit">
        </form>
    </body>
</html>