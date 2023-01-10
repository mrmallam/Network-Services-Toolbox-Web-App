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

$stmt = $conn->prepare("INSERT INTO BLOCKED_PORTS VALUES (?, ?);");
$stmt->bind_param("ss", $MAC, $PORT);

$MAC = $_POST["MAC"];
$PORT = $_POST["PORT"];

$success = $stmt->execute();
if($success == true){
    echo "Successfully added blocked port";
}
else{
    echo "Addition failed";
}

$conn->close();

?>

</body>
</html>