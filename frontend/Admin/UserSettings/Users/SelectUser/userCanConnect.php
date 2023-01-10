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

$stmt = $conn->prepare("INSERT INTO CAN_CONNECT VALUES (?, ?)");
$stmt->bind_param("is", $ID, $SSID);
$ID = intval($_POST["ID"]);
$SSID = $_POST["SSID"];
$success = $stmt->execute();
if($success == true){
    echo "Successfully added user to can connect table<br>";
}
else{
    echo "Addition failed<br>";
}

$conn->close();

?>

</body>
</html>