<?php

session_start();

if(!isset($_SESSION["login"]) || $_SESSION["login"] !== true){
    header("Location: ../../../login.php");
    exit;
}

?>
<html>
    <head>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/water.css@2/out/water.css">
    </head>
    <body>
        <h1>Firewall</h1>
        <h2>Get Blacklist</h2>
        <form action="getBlacklist.php" method="post">
            MAC Address: <input type="text" name="MAC"><br>
            <input type="submit">
        </form>
        <h2>Get Blocked Ports</h2>
        <form action="getBlockedPorts.php" method="post">
            MAC Address: <input type="text" name="MAC"><br>
            <input type="submit">
        </form>
        <h2>Get Security Level</h2>
        <form action="getSecurityLevel.php" method="post">
            MAC Address: <input type="text" name="MAC"><br>
            <input type="submit">
        </form>
        <h2>Get Whitelist</h2>
        <form action="getWhitelist.php" method="post">
            MAC Address: <input type="text" name="MAC"><br>
            <input type="submit">
        </form>
    </body>
</html>