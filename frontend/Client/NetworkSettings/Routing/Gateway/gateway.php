

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
        <h1>Gateway</h1>
        <h2>Get IP</h2>
        <form action="getIP.php" method="post">
            Router SSID: <input type="text" name="SSID"><br>
            <input type="submit">
        </form>
    </body>
</html>