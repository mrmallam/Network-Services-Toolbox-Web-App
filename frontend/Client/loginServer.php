<?php

session_start();

 ini_set('display_errors', 1);
 ini_set('display_startup_errors', 1);
 
 error_reporting(E_ALL);

$conn = new mysqli("localhost", "ensf", "480", "network");

$username = trim($_POST["Username"]);
$password = trim($_POST["Password"]);

$stmt = $conn->prepare("SELECT * FROM Client WHERE Username = ? AND Password = ?");
$stmt->bind_param('ss', $username, $password);
$stmt->execute();
$row = $stmt->fetch();
if($row){
    $_SESSION["login"] = true;

    header("Location: index.php");
}
else{
    $_SESSION["login"] = false;
    header("Location: ../login.php");
}

$conn->close();

?>