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
        <h1>Modem</h1>
        <h2>Add a Modem</h2>
        <form action="addModem.php" method="post">
            MAC Address: <input type="text" name="MAC"><br>
            Serial Number: <input type="text" name="SNO"><br>
            Version: <input type="text" name="V"><br>
            Uptime: <input type="text" name="Up"><br>
            Vendor: <input type="text" name="Vendor"><br>
            Number of connected users: <input type="text" name="Num"><br>
            IPv4: <input type="text" name="IP4"><br>
            IPv6: <input type="text" name="IP6"><br>
            <input type="submit">
        </form>
        <h2>Delete a Modem</h2>
        <form action="deleteModem.php" method="post">
            IPv4: <input type="text" name="IP4"><br>
            IPv6: <input type="text" name="IP6"><br>
            MAC Address: <input type="text" name="MAC"><br>
            <input type="submit">
        </form>
        <h2>Get IP</h2>
        <form action="getIP.php" method="post">
            MAC Address: <input type="text" name="MAC"><br>
            <input type="submit">
        </form>
        <h2>Set IP</h2>
        <form action="setIP.php" method="post">
            IPv4: <input type="text" name="IPv4"><br>
            IPv6: <input type="text" name="IPv6"><br>
            MAC Address: <input type="text" name="MAC"><br>
            <input type="submit">
        </form>
    </body>
</html>