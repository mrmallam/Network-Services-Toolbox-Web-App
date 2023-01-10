<?php

session_start();

if(!isset($_SESSION["login"]) || $_SESSION["login"] !== true){
    header("Location: ../../../../login.php");
    exit;
}

?>

<html>
    <body>
        <head>
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/water.css@2/out/water.css">
        </head>
        <h1>Set Parental Controls</h1>
        <h2>Add Blocked Keyword</h2>
        <form action="addBlockedKeyword.php" method="post">
            User ID: <input type="text" name="ID"><br>
            Keyword: <input type="text" name="Keyword"><br>
            Date (YYYY-MM-DD): <input type="text" name="DT"><br>
            <input type="submit">
        </form>
        <h2>Add Blocked Site</h2>
        <form action="addBlockedSite.php" method="post">
            User ID: <input type="text" name="ID"><br>
            URL: <input type="text" name="URL"><br>
            Date(YYYY-MM-DD): <input type="text" name="DT"><br>
            <input type="submit">
        </form>
        <h2>Add Parental Control to User</h2>
        <form action="addParentalControl.php" method="post">
            User ID: <input type="text" name="ID"><br>
            Router SSID: <input type="text" name="SSID"><br>
            Enabled?: <input type="text" name="EN"><br>
            Date(YYYY-MM-DD): <input type="text" name="Time"><br>
            <input type="submit">
        </form>
        <h2>Delete Parental Control from User</h2>
        <form action="deleteParentalControl.php" method="post">
            User ID: <input type="text" name="ID"><br>
            Router SSID: <input type="text" name="SSID"><br>
            <input type="submit">
        </form>
        <h2>Set Blocked Keywords</h2>
        <form action="setBlockedKeywords.php" method="post">
            User ID: <input type="text" name="ID"><br>
            Keyword (Comma separated): <input type="text" name="Keyword"><br>
            Date(YYYY-MM-DD): <input type="text" name="DT"><br>
            <input type="submit">
        </form>
        <h2>Set Blocked Sites</h2>
        <form action="setBlockedSites.php" method="post">
            User ID: <input type="text" name="ID"><br>
            URL (Comma separated): <input type="text" name="URL"><br>
            Date(YYYY-MM-DD): <input type="text" name="DT"><br>
            <input type="submit">
        </form>
    </body>
</html>