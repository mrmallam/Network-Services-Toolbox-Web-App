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

$stmt = $conn->prepare("DELETE FROM Connected_Devices WHERE (IPv4 = ? AND IPv6 = ?);");
$stmt->bind_param("ss", $IP4, $IP6);

$IP4 = $_POST["IP4"];
$IP6 = $_POST["IP6"];

$success = $stmt->execute();
if($success == true){
    echo "Successfully deleted device";
}
else{
    echo "Deletion failed";
}

$conn->close();

?>

</body>
</html>