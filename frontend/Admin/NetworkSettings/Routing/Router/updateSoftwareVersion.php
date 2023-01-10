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

$stmt = $conn->prepare("UPDATE HARDWARE SET Version = ? WHERE MAC_address = ?;");
$stmt->bind_param("is", $Version, $MAC);

$Version = $_POST["Version"];
$MAC = $_POST["MAC"];

$success = $stmt->execute();
if($success == true){
    echo "Successfully updated version";
}
else{
    echo "Update failed";
}

$conn->close();

?>

</body>
</html>