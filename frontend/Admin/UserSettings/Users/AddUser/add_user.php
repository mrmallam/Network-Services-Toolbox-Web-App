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
        <h1>Add User</h1>
        <h2>Add Client</h2>
        <form action="addClient.php" method="post">
            User ID: <input type="text" name="ID"><br>
            Name: <input type="text" name="Name"><br>
            Username: <input type="text" name="Username"><br>
            Password: <input type="text" name="Password"><br>
            <input type="submit">
        </form>
        <h2>Add Admin</h2>
        <form action="addAdmin.php" method="post">
            User ID: <input type="text" name="ID"><br>
            Username: <input type="text" name="UName"><br>
            Password: <input type="text" name="Pass"><br>
            <input type="submit">
        </form>
        <h2>Add User</h2>
        <form action="addUser.php" method="post">
            <input type="submit">
        </form>
    </body>
</html>