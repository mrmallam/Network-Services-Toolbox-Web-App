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

$stmt = $conn->prepare("INSERT INTO FIREWALL VALUES (?, ?);");
$stmt->bind_param("si", $MAC, $Level);

$MAC = $_POST["MAC"];
$Level = intval($_POST["Level"]);

$success = $stmt->execute();
if($success == true){
    echo "Successfully added firewall";
}
else{
    echo "Addition failed";
}

$conn->close();

?>

</body>
</html>