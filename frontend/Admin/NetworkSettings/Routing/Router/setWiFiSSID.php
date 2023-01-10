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

$stmt = $conn->prepare("UPDATE Router SET WiFi_SSID = ? WHERE (IPv4 = ? OR IPv6 = ?);");
$stmt->bind_param("sss", $SSID, $IP4, $IP6);

$SSID = $_POST["SSID"];
$IP4 = $_POST["IP4"];
$IP6 = $_POST["IP6"];

$success = $stmt->execute();
if($success == true){
    echo "Successfully set SSID";
}
else{
    echo "Setting failed";
}

$conn->close();

?>

</body>
</html>