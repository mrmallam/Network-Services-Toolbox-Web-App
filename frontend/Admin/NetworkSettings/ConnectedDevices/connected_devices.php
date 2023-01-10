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
        <h1>Connected Devices</h1>
        <h2>Add Hardware for a Device</h2>
        <form action="addHardware.php" method="post">
            MAC Address: <input type="text" name="MAC"><br>
            Serial Number: <input type="text" name="SNO"><br>
            Version: <input type="text" name="V"><br>
            System Uptime: <input type="text" name="Uptime"><br>
            Vendor: <input type="text" name="Vendor"><br>
            Number of connected devices: <input type="text" name="NCO"><br>
            <input type="submit">
        </form>
        <h2>Add a Device</h2>
        <form action="addDevice.php" method="post">
            Hostname: <input type="text" name="H"><br>
            IPv4: <input type="text" name="IP4"><br>
            IPv6: <input type="text" name="IP6"><br>
            Connection Type: <input type="text" name="Type"><br>
            MAC Address: <input type="text" name="MAC"><br>
            Router SSID: <input type="text" name="R_SSID"><br>
            User ID: <input type="text" name="UID"><br>
            <input type="submit">
        </form>
        <h2>Add a Status to a Device</h2>
        <form action="addStatus.php" method="post">
            IPv4: <input type="text" name="IP4"><br>
            IPv6: <input type="text" name="IP6"><br>
            Uptime: <input type="text" name="Uptime"><br>
            Status: <input type="text" name="Status"><br>
            <input type="submit">
        </form>
        <h2>Delete a Connected Device</h2>
        <form action="deleteDevice.php" method="post">
            IPv4: <input type="text" name="IP4"><br>
            IPv6: <input type="text" name="IP6"><br>
            <input type="submit">
        </form>
        <h2>Get Connection Uptime for a Connected Device</h2>
        <form action="getConnectionUptime.php" method="post">
            IPv4: <input type="text" name="IP4"><br>
            IPv6: <input type="text" name="IP6"><br>
            <input type="submit">
        </form>
        <h2>Get Hostname for a Connected Device</h2>
        <form action="getHostname.php" method="post">
            IPv4: <input type="text" name="IP4"><br>
            IPv6: <input type="text" name="IP6"><br>
            <input type="submit">
        </form>
        <h2>Get a Connected Device's IP</h2>
        <form action="getIP.php" method="post">
            MAC Address: <input type="text" name="MAC"><br>
            <input type="submit">
        </form>
        <h2>Get MAC Address for a Connected Device</h2>
        <form action="getMAC.php" method="post">
            IPv4: <input type="text" name="IP4"><br>
            IPv6: <input type="text" name="IP6"><br>
            <input type="submit">
        </form>
        <h2>Get Status for a Connected Device</h2>
        <form action="getStatus.php" method="post">
            IPv4: <input type="text" name="IP4"><br>
            IPv6: <input type="text" name="IP6"><br>
            <input type="submit">
        </form>
    </body>
</html>