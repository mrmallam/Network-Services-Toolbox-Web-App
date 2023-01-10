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

$stmt = $conn->prepare("UPDATE Modem SET IPv4 = ?, IPv6 = ? WHERE HW_MAC_Address = ?;");
$stmt->bind_param("sss", $IPv4, $IPv6, $MAC);

$IPv4 = $_POST["IPv4"];
$IPv6 = $_POST["IPv6"];
$MAC = $_POST["MAC"];

$success = $stmt->execute();
if($success == true){
    echo "Successfully set IP";
}
else{
    echo "Addition failed";
}

$conn->close();

?>

</body>
</html>