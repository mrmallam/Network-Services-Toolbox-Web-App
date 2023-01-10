
<?php

session_start();

if(!isset($_SESSION["login"]) || $_SESSION["login"] !== true){
    header("Location: ../../../../login.php");
    exit;
}

?>

<html>
    <head>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/water.css@2/out/water.css">
    </head>
    <body>
        <h1>Get Parental Controls</h1>
        <h2>Get Blocked Keywords</h2>
        <form action="getBlockedKeywords.php" method="post">
            User ID: <input type="text" name="ID"><br>
            <input type="submit">
        </form>
        <h2>Get Blocked Sites</h2>
        <form action="getBlockedSites.php" method="post">
            User ID: <input type="text" name="ID"><br>
            <input type="submit">
        </form>
    </body>
</html>