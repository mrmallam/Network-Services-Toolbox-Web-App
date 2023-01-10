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
        <h2>Add a Blocked Port</h2>
        <form action="addBlockedPort.php" method="post">
            MAC Address: <input type="text" name="MAC"><br>
            Port: <input type="text" name="PORT"><br>
            <input type="submit">
        </form>
        <h2>Add Firewall to a Device</h2>
        <form action="addFirewall.php" method="post">
            MAC Address: <input type="text" name="MAC"><br>
            Security Level: <input type="text" name="Level"><br>
            <input type="submit">
        </form>
        <h2>Get Blacklist</h2>
        <form action="getBlacklist.php" method="post">
            MAC Address: <input type="text" name="MAC"><br>
            <input type="submit">
        </form>
        <h2>Add to Blacklist</h2>
        <form action="addToBlacklist.php" method="post">
            MAC Address: <input type="text" name="MAC"><br>
            Site URL: <input type="text" name="Site"><br>
            <input type="submit">
        </form>
        <h2>Get Blocked Ports</h2>
        <form action="getBlockedPorts.php" method="post">
            MAC Address: <input type="text" name="MAC"><br>
            <input type="submit">
        </form>
        <h2>Add to Whitelist</h2>
        <form action="addToWhitelist.php" method="post">
            MAC Address: <input type="text" name="MAC"><br>
            Site URL: <input type="text" name="Site"><br>
            <input type="submit">
        </form>
        <h2>Get Security Level</h2>
        <form action="getSecurityLevel.php" method="post">
            MAC Address: <input type="text" name="MAC"><br>
            <input type="submit">
        </form>
        <h2>Delete Firewall</h2>
        <form action="deleteFirewall.php" method="post">
            MAC Address: <input type="text" name="MAC"><br>
            <input type="submit">
        </form>
        <h2>Get Whitelist</h2>
        <form action="getWhitelist.php" method="post">
            MAC Address: <input type="text" name="MAC"><br>
            <input type="submit">
        </form>
        <!-- No idea how to send an array of strings in HTML -->
        <h2>Set Whitelist</h2>
        <form action="setWhitelist.php" method="post">
            MAC Address: <input type="text" name="MAC"><br>
            Sites (Comma seperated): <input type="text" name="Site"><br>
            <input type="submit">
        </form>
        <h2>Set Blacklist</h2>
        <form action="setBlacklist.php" method="post">
            MAC Address: <input type="text" name="MAC"><br>
            Sites (Comma seperated): <input type="text" name="Site"><br>
            <input type="submit">
        </form>
        <h2>Set Blocked Ports</h2>
        <form action="setBlockedPorts.php" method="post">
            MAC Address: <input type="text" name="MAC"><br>
            Ports (Comma seperated): <input type="text" name="Port"><br>
            <input type="submit">
        </form>
        <h2>Set Security Level</h2>
        <form action="setSecurityLevel.php" method="post">
            MAC Address: <input type="text" name="MAC"><br>
            Security Level: <input type="text" name="Level"><br>
            <input type="submit">
        </form>
    </body>
</html>