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

$stmt = $conn->prepare("UPDATE Router SET WiFi_password = ? WHERE WiFi_SSID = ?;");
$stmt->bind_param("ss", $Password, $SSID);

$Password = $_POST["Password"];
$SSID = $_POST["SSID"];

$success = $stmt->execute();
if($success == true){
    echo "Successfully set Password";
}
else{
    echo "setting failed";
}

$conn->close();

?>

</body>
</html>