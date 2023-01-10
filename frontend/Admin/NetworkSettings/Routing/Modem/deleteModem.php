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

$stmt = $conn->prepare("DELETE FROM Modem WHERE (IPv4 = ? AND IPv6 = ?);");
$stmt->bind_param("ss", $IP4, $IP6);

$IP4 = $_POST["IP4"];
$IP6 = $_POST["IP6"];

$stmt->execute();

$stmt = $conn->prepare("DELETE FROM HARDWARE WHERE MAC_address = ?;");
$stmt->bind_param("s", $MAC);

$MAC = $_POST["MAC"];

$success = $stmt->execute();
if($success == true){
    echo "Successfully deleted modem";
}
else{
    echo "Deletion failed";
}

$conn->close();

?>

</body>
</html>