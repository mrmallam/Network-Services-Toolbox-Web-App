<html>
<body>

<?php
 
 ini_set('display_errors', 1);
 ini_set('display_startup_errors', 1);
 
 error_reporting(E_ALL);

$conn = new mysqli("localhost", "ensf", "480", "network");

if($conn->connect_error){
    die("connection failed: " . $conn->connect_error);
}

$stmt = $conn->prepare("INSERT INTO Admin VALUES (?, ?, ?);");
$stmt->bind_param("iss", $ID, $UName, $Pass);

$ID = intval($_POST["ID"]);
$UName = $_POST["UName"];
$Pass = $_POST["Pass"];

$success = $stmt->execute();
if($success == true){
    echo "Successfully Added Admin";
}
else{
    echo "Could not add Admin";
}

$conn->close();

?>