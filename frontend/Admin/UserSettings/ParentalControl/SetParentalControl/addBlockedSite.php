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

$stmt = $conn->prepare("INSERT INTO BLOCKED_SITES VALUES (?, ?, DATE(?));");
$stmt->bind_param("iss", $ID, $URL, $DT);

$ID = intval($_POST["ID"]);
$URL = $_POST["URL"];
$DT = date("Y-m-d", strtotime($_POST["DT"]));

$success = $stmt->execute();
if($success == true){
    echo "Successfully added blocked site";
}
else{
    echo "Addition failed";
}

$conn->close();

?>

</body>
</html>