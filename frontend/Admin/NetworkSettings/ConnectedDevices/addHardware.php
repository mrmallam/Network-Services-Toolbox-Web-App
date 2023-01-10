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
$stmt->bind_param("sssisi", $MAC, $SNO, $V, $Uptime, $Vendor, $NCO);

$MAC = $_POST["MAC"];
$SNO = $_POST["SNO"];
$V = $_POST["V"];
$Uptime = intval($_POST["Uptime"]);
$Vendor = $_POST["Vendor"];
$NCO = intval($_POST["NCO"]);

$success = $stmt->execute();
if($success == true){
    echo "Successfully added hardware";
}
else{
    echo "Addition failed";
}

$conn->close();

?>

</body>
</html>