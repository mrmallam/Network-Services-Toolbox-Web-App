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

$stmt = $conn->prepare("INSERT INTO HARDWARE VALUES (?, ?, ?, ?, ?, ?);");
$stmt->bind_param("sssisi", $MAC, $SNO, $V, $Up, $Vendor, $Num);

$MAC = $_POST["MAC"];
$SNO = $_POST["SNO"];
$V = $_POST["V"];
$Up = $_POST["Up"];
$Vendor = $_POST["Vendor"];
$Num = $_POST["Num"];

$stmt->execute();

$stmt = $conn->prepare("INSERT INTO Modem VALUES (?, ?, ?);");
$stmt->bind_param("sss", $IPv4, $IPv6, $MAC);

$IPv4 = $_POST["IP4"];
$IPv6 = $_POST["IP6"];
$MAC = $_POST["MAC"];

$success = $stmt->execute();
if($success == true){
    echo "Successfully added modem";
}
else{
    echo "Addition failed";
}

$conn->close();

?>

</body>
</html>