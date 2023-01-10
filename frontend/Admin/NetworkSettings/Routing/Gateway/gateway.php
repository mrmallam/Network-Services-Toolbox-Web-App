
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
        <h2>Add a Gateway</h2>
        <form action="addGateway.php" method="post">
            IPv4: <input type="text" name="IP4"><br>
            IPv6: <input type="text" name="IP6"><br>
            <input type="submit">
        </form>
        <h2>Delete a Gateway</h2>
        <form action="deleteGateway.php" method="post">
            IPv4: <input type="text" name="IP4"><br>
            IPv6: <input type="text" name="IP6"><br>
            <input type="submit">
        </form>
        <h2>Get IP</h2>
        <form action="getIP.php" method="post">
            Router SSID: <input type="text" name="SSID"><br>
            <input type="submit">
        </form>
        <h2>Set IP</h2>
        <form action="setIP.php" method="post">
            New IPv4: <input type="text" name="NIPv4"><br>
            New IPv6: <input type="text" name="NIPv6"><br>
            Old IPv4: <input type="text" name="IPv4"><br>
            Old IPv6: <input type="text" name="IPv6"><br>
            <input type="submit">
        </form>
    </body>
</html>