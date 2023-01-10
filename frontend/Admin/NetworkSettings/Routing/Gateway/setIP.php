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

$stmt = $conn->prepare("UPDATE Gateway SET IPv4 = ?, IPv6 = ? WHERE IPv4 = ? AND IPv6 = ?;");
$stmt->bind_param("ssss", $NIPv4, $NIPv6, $IPv4, $IPv6);

$NIPv4 = $_POST["NIPv4"];
$NIPv6 = $_POST["NIPv6"];
$IPv4 = $_POST["IPv4"];
$IPv6 = $_POST["IPv6"];

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