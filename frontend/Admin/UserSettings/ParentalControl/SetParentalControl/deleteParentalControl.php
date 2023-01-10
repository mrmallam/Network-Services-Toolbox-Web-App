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

$stmt = $conn->prepare("DELETE FROM Parental_Control WHERE User_ID = ? AND R_WiFi_SSID = ?;");
$stmt->bind_param("is", $ID, $SSID);

$ID = intval($_POST["ID"]);
$SSID = $_POST["SSID"];

$success = $stmt->execute();
if($success == true){
    echo "Successfully Deleted Parental Control from User";
}
else{
    echo "Deletion failed";
}

$conn->close();

?>

</body>
</html>