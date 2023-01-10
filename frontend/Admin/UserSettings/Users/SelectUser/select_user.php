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
        <h1>Select User</h1>
        <h2>Delete Admin</h2>
        <form action="deleteAdmin.php" method="post">
            User ID: <input type="text" name="ID"><br>
            <input type="submit">
        </form>
        <h2>Delete Client</h2>
        <form action="deleteClient.php" method="post">
            User ID: <input type="text" name="ID"><br>
            <input type="submit">
        </form>
        <h2>Ban User</h2>
        <form action="deleteUser.php" method="post">
            User ID: <input type="text" name="ID"><br>
            <input type="submit">
        </form>
        <h2>Router Ban a User</h2>
        <form action="routerBanUser.php" method="post">
            User ID: <input type="text" name="ID"><br>
            Router SSID: <input type="text" name="SSID"><br>
            <input type="submit">
        </form>
        <h2>See All Connected Devices for a user</h2>
        <form action="seeAllConnectedDevices.php" method="post">
            User ID: <input type="text" name="ID"><br>
            <input type="submit">
        </form>
        <h2>Select Client</h2>
        <form action="selectClient.php" method="post">
            User ID: <input type="text" name="ID"><br>
            <input type="submit">
        </form>
        <h2>Select Admin</h2>
        <form action="selectAdmin.php" method="post">
            User ID: <input type="text" name="ID"><br>
            <input type="submit">
        </form>
        <h2>Add to can connect</h2>
        <form action="userCanConnect.php" method="post">
            User ID: <input type="text" name="ID"><br>
            Router SSID: <input type="text" name="SSID"><br>
            <input type="submit">
        </form>
    </body>
</html>