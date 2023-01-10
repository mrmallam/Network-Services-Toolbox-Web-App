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
        <h1>Router</h1>
        <h2>Add a Router</h2>
        <form action="addRouter.php" method="post">
            MAC Address: <input type="text" name="MAC"><br>
            Serial Number: <input type="text" name="SNO"><br>
            Version: <input type="text" name="V"><br>
            Uptime: <input type="text" name="Up"><br>
            Vendor: <input type="text" name="Vendor"><br>
            Number of connected users: <input type="text" name="Num"><br>
            IPv4: <input type="text" name="IP4"><br>
            IPv6: <input type="text" name="IP6"><br>
            Router SSID: <input type="text" name="SSID"><br>
            Router Password: <input type="text" name="PASS"><br>
            <input type="submit">
        </form>
        <h2>Delete a Router</h2>
        <form action="deleteRouter.php" method="post">
            Router SSID: <input type="text" name="SSID"><br>
            MAC Address: <input type="text" name="MAC"><br>
            <input type="submit">
        </form>
        <h2>Get IP</h2>
        <form action="getIP.php" method="post">
            Router SSID: <input type="text" name="SSID"><br>
            <input type="submit">
        </form>
        <h2>Set IP</h2>
        <form action="setIP.php" method="post">
            IPv4: <input type="text" name="IPv4"><br>
            IPv6: <input type="text" name="IPv6"><br>
            Router SSID: <input type="text" name="SSID"><br>
            <input type="submit">
        </form>
        <h2>Get all Connected Devices</h2>
        <form action="getAllConnectedDevices.php" method="post">
            Router SSID: <input type="text" name="SSID"><br>
            <input type="submit">
        </form>
        <h2>Set WiFi Password</h2>
        <form action="setWiFiPassword.php" method="post">
            Router SSID: <input type="text" name="SSID"><br>
            Password: <input type="text" name="Password"><br>
            <input type="submit">
        </form>
        <h2>Get Firewall Settings</h2>
        <form action="getFirewallSettings.php" method="post">
            Router SSID: <input type="text" name="SSID"><br>
            <input type="submit">
        </form>
        <h2>Set WiFi SSID</h2>
        <form action="setWiFiSSID.php" method="post">
            Router SSID: <input type="text" name="SSID"><br>
            IPv4: <input type="text" name="IP4"><br>
            IPv6: <input type="text" name="IP6"><br>
            <input type="submit">
        </form>
        <h2>Update Software Version</h2>
        <form action="updateSoftwareVersion.php" method="post">
            Version: <input type="text" name="Version"><br>
            NAC Address: <input type="text" name="MAC"><br>
            <input type="submit">
        </form>
        <h2>Get MAC Address</h2>
        <form action="getMAC.php" method="post">
            Router SSID: <input type="text" name="SSID"><br>
            <input type="submit">
        </form>
        <h2>Get Serial Number</h2>
        <form action="getSerialNo.php" method="post">
            Router SSID: <input type="text" name="SSID"><br>
            <input type="submit">
        </form>
        <h2>Get Software Version</h2>
        <form action="getSoftwareVersion.php" method="post">
            Router SSID: <input type="text" name="SSID"><br>
            <input type="submit">
        </form>
        <h2>Get Uptime</h2>
        <form action="getUptime.php" method="post">
            Router SSID: <input type="text" name="SSID"><br>
            <input type="submit">
        </form>
        <h2>Get WiFi Password</h2>
        <form action="getWiFiPassword.php" method="post">
            Router SSID: <input type="text" name="SSID"><br>
            <input type="submit">
        </form>
        <h2>Get WiFi SSID</h2>
        <form action="getWiFiSSID.php" method="post">
            IPv4: <input type="text" name="IP4"><br>
            IPv6: <input type="text" name="IP6"><br>
            <input type="submit">
        </form>
    </body>
</html>