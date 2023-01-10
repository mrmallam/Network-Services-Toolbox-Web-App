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

$stmt = $conn->prepare("UPDATE Router SET IPv4 = ?, IPv6 = ? WHERE WiFi_SSID = ?;");
$stmt->bind_param("sss", $IPv4, $IPv6, $SSID);

$IPv4 = $_POST["IPv4"];
$IPv6 = $_POST["IPv6"];
$SSID = $_POST["SSID"];

$success = $stmt->execute();
if($success == true){
    echo "Successfully set IP";
}
else{
    echo "setting failed";
}

$conn->close();

?>

</body>
</html>