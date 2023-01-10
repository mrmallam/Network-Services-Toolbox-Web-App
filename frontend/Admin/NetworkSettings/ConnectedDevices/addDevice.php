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

$stmt = $conn->prepare("INSERT INTO Connected_Devices VALUES (?, ?, ?, ?, ?, ?, ?);");
$stmt->bind_param("ssssssi", $H, $IP4, $IP6, $Type, $MAC, $R_SSID, $UID);

$H = $_POST["H"];
$IP4 = $_POST["IP4"];
$IP6 = $_POST["IP6"];
$Type = $_POST["Type"];
$MAC = $_POST["MAC"];
$R_SSID = $_POST["R_SSID"];
$UID = intval($_POST["UID"]);

$success = $stmt->execute();
if($success == true){
    echo "Successfully added a device to user<br>";
}
else{
    echo "Addition failed<br>";
}

$conn->close();

?>

</body>
</html>