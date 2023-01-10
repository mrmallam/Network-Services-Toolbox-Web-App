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

$stmt = $conn->prepare("DELETE FROM FIREWALL WHERE HW_MAC_address = ?;");
$stmt->bind_param("s", $MAC);

$MAC = $_POST["MAC"];

$success = $stmt->execute();
if($success == true){
    echo "Successfully deleted firewall";
}
else{
    echo "Deletion failed";
}

$conn->close();

?>

</body>
</html>