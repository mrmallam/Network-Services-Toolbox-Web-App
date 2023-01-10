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

$stmt = $conn->prepare("DELETE FROM Can_Connect WHERE ID = ?");

$stmt->bind_param("i", $ID);

$ID = $_POST["ID"];

$success = $stmt->execute();
if($success == true){
    echo "Successfully Banned User";
}
else{
    echo "Delete failed";
}

$conn->close();

?>

</body>
</html>