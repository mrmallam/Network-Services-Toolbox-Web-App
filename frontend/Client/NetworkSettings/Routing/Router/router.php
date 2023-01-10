
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
        <h2>Get IP</h2>
        <form action="getIP.php" method="post">
            Router SSID: <input type="text" name="SSID"><br>
            <input type="submit">
        </form>
        <h2>Get MAC Address</h2>
        <form action="getMAC.php" method="post">
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