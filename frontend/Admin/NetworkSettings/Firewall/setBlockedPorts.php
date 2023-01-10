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

$stmt = $conn->prepare("DELETE FROM Blocked_ports WHERE FW_HW_MAC_address = ?;");
$stmt->bind_param("s", $MAC);
$MAC = $_POST["MAC"];
$success = $stmt->execute();
if($success == true){
    echo "Successfully cleared blocked ports<br>";
}
else{
    echo "Clearing failed<br>";
}

$stmt = $conn->prepare("INSERT INTO Blocked_ports VALUES (?, ?);");
$stmt->bind_param("ss", $MAC, $Port);

$MAC = $_POST["MAC"];

$temp =$_POST["Port"];
$temp = explode(",", $temp);
$temp = str_replace(" ", "", $temp);

$Ports = $temp;
foreach($Ports as $Port){
$success = $stmt->execute();
    if($success == true){
        echo "Successfully added port<br>";
    }
    else{
        echo "Addition failed<br>";
    }
}

$conn->close();

?>

</body>
</html>