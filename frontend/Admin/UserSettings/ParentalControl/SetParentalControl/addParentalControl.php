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

$stmt = $conn->prepare("INSERT INTO Parental_Control VALUES (?, ?, ?, ?);");
$stmt->bind_param("isis", $ID, $SSID, $EN, $Time);

$ID = intval($_POST["ID"]);
$SSID = $_POST["SSID"];
$EN = intval($_POST["EN"]);
$Time = date("Y-m-d", strtotime($_POST["Time"]));

$success = $stmt->execute();
if($success == true){
    echo "Successfully Added Parental Control";
}
else{
    echo "Addition failed";
}

$conn->close();

?>

</body>
</html>